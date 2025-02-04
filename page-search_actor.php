<?php get_header();?>

<div class="container search_actor">
    <span>ابحث عن ممثل <i class="fal fa-theater-masks"></i></span>
    <form method="GET" action="/wordpress3/search_actor">
    <input placeholder="ابحث عن بطلك او بطلتك في مسلسلي...." type="text" name="name_actor" required>
    <button >بحث</button>
    </form>
</div>
<h1 class="title_block container">قائمة الممثلين</h1>
<div class="container show_items actors_container"> 
   <?php
   if(isset($_GET["name_actor"])){
    $page = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
    $offset = ( $page-1 )*42;
    $terms=get_terms('actors', array( "offset"=>$offset,'number' => 42,'name__like' => $_GET["name_actor"],'orderby'=>"meta_value_num",
    'meta_key' => 'term_views_count', "order" => 'DESC' ));
    foreach($terms as $term){
        ?>
        <div class="actors">
             <?php 
            
                $bg_ground_url=get_term_meta($term->term_id  ,"actor_image",true);
             ?>
             <div class="<?php if($bg_ground_url=='') echo 'static_photo';?>" style="background-image: url('<?php echo $bg_ground_url;?>');">
                <h3 class="name_actor"><?php echo $term->name;?></h3>
                <a class="url_actor" href="<?php echo get_term_link($term->term_id);?>"></a>
             </div>
            
          </div>
        <?php
    }  
   }
   ?>
</div>

<div class="container pagination">

        <?php
            $total_terms= wp_count_terms(array("taxonomy"=>"actors","name__like"=>$_GET["name_actor"]));
        if($total_terms!=0){
           $pages = ceil($total_terms/42);
          $current_page=get_query_var("paged")==0?1:get_query_var("paged");
           
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
<?php get_footer();?>