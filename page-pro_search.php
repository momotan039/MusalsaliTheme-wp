<?php get_header( );?>
<div class="container Pro_Serach">
    <div class="filter">
        <form action="/pro_search"><span>تصفية سريعة <i class="fas fa-telescope"></i></span></div>
        <div class="cats_show">
            <span>فئة العرض</span>
            <ul>
        <?php 
                $cats=get_terms(array(
                    "taxonomy"=>"category"
                ));
                
                $found_all=false;
                $cats_url_arr=explode(",",$_GET["cats"]);
                $count_found=0;
                foreach($cats as $cat){
                    if(isset($_GET["cats"]) && !$found_all)
                    {
                        $found=false;
                        foreach( $cats_url_arr as $cat_url){
                            
                            if($cat_url==$cat->name)
                           {
                            echo "<li class='checked'>".$cat->name."</li>";
                            $count_found++;
                            $found=true;
                            if($count_found==count($cats_url_arr))
                            $found_all=true; 
                            break;
                           }

                        }
                        if(!$found)
                        echo "<li>".$cat->name."</li>";    
                        
                    }
                    else
                    echo "<li>".$cat->name."</li>";
                }
        ?>
            </ul>
            <input  value="<?php echo isset($_GET["cats"])?$_GET["cats"]:"";?>" type="hidden" name="cats">
        </div>
        <div class="genres_show">
            <span>نوع العرض</span>
            <ul>
            <?php 
                $genres=get_terms(array(
                    "taxonomy"=>"genres"
                ));
                
                $found_all=false;
                $genres_url_arr=explode(",",$_GET["genres"]);
                $count_found=0;
                foreach($genres as $genre){
                    if(isset($_GET["genres"]) && !$found_all)
                    {
                        $found=false;
                        foreach( $genres_url_arr as $genre_url){
                            
                            if($genre_url==$genre->name)
                           {
                            echo "<li class='checked'>".$genre->name."</li>";
                            $count_found++;
                            $found=true;
                            if($count_found==count($genres_url_arr))
                            $found_all=true; 
                            break;
                           }

                        }
                        if(!$found)
                        echo "<li>".$genre->name."</li>";    
                        
                    }
                    else
                    echo "<li>".$genre->name."</li>";
                }
        ?>
            </ul>
            <input  value="<?php echo isset($_GET["genres"])?$_GET["genres"]:"";?>" type="hidden" name="genres">
        </div>
        <div class="years_show">
            <span>سنة اصدار العرض</span>
            <ul>
            <?php 
                $years=get_terms(array(
                    "taxonomy"=>"release_years"
                ));
                
                $found_all=false;
                $years_url_arr=explode(",",$_GET["years"]);
                $count_found=0;
                foreach($years as $year){
                    if(isset($_GET["years"]) && !$found_all)
                    {
                        $found=false;
                        foreach( $years_url_arr as $year_url){
                            
                            if($year_url==$year->name)
                           {
                            echo "<li class='checked'>".$year->name."</li>";
                            $count_found++;
                            $found=true;
                            if($count_found==count($years_url_arr))
                            $found_all=true; 
                            break;
                           }

                        }
                        if(!$found)
                        echo "<li>".$year->name."</li>";    
                        
                    }
                    else
                    echo "<li>".$year->name."</li>";
                }
        ?>   
            </ul>
            <input type="hidden" name="years"  value="<?php echo isset($_GET["years"])?$_GET["years"]:"";?>">
        </div>
                <button>بحث</button>
    </form>
</div>
<div class="show_items container">
            <?php

        $array_taxs=array("relation"=>"AND");
        if(isset($_GET["cats"]))
        array_push($array_taxs,array(
            "taxonomy"=>"category",
            "field"=>"name",
            "terms"=>explode(",",$_GET["cats"]),  
        ));
        if(isset($_GET["genres"]))
        array_push($array_taxs,array(
            "taxonomy"=>"genres",
            "field"=>"name",
            "terms"=>explode(",",$_GET["genres"]),
        ));
        if(isset($_GET["years"]))
        array_push($array_taxs,array(
            "taxonomy"=>"release_years",
            "field"=>"name",
            "terms"=>explode(",",$_GET["years"]),  
        ));
        $current_page=get_query_var("paged")==0?1:get_query_var("paged");
        $offset = ( $current_page-1 )*42;

        $query=new WP_Query(array("offset"=>$offset,"post_type"=>array("seriess","movies"),"tax_query"=>$array_taxs));
            if($query->have_posts(  )){
            while($query->have_posts(  )){
                $query->the_post();
                call_posts();
            }}
            else{
                ?>
                <h1><i class="fas fa-frown-open"></i> لا يوجد عروض بهذه المواصفات <i class="fas fa-frown-open"></i></h1>
                <?php
            }
            ?>
</div>

<div class="container pagination">

        <?php
            $total_posts=$query->found_posts;
        if($total_posts!=0){
           $pages = ceil($total_posts/42);           
          if($pages>1 && $current_page!=1)
           {
            echo '<a class="next page-numbers" href="'.get_pagenum_link($current_page-1).'">«</a>';
           }
           //first page
           if($current_page!=1)
           echo '<a class="next page-numbers" href="'.get_pagenum_link(1).'">1</a>';
           
           //span
           if(floor($current_page/2)>1)
           echo "<span>...</span>";

           //before current page
           for($i=$current_page-2;$i<$current_page;$i++){
            if($i>1)
            echo '<a class="next page-numbers" href="'.get_pagenum_link($i).'">'.$i.'</a>';
           }
           //current page
           for($i=$current_page;$i<=$current_page+1;$i++){
            if($i<$pages)
            echo '<a class="next page-numbers" href="'.get_pagenum_link($i).'">'.$i.'</a>';
           }

             //after current page

           //span
           if($current_page*2<$pages){
            echo "<span>...</span>";
           }
            //last page
           echo '<a class="next page-numbers" href="'.get_pagenum_link($pages).'">'.$pages.'</a>';
        

           if($current_page<$pages)
           {
             echo '<a class="next page-numbers" href="'.get_pagenum_link($current_page+1).'">»</a>';
           }
        }
        ?>
</div>

<?php get_footer( );?>