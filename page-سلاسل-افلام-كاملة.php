<?php get_header(); ?>
<div class="show_items container">
 <?php 
  $current_page = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
  $offset = ( $current_page-1 )*42;

    $terms = get_terms( array(
    'taxonomy' => 'all_seriess',
    "offset"=>$offset,
    "number"=>42
) );

foreach($terms as $movie) {

     $loop=new WP_Query(array("posts_per_page"=>1,"post_type"=>array("movies","seriess"),'tax_query' => array(
        array (
            'taxonomy' => 'all_seriess',
            'field' => 'slug',
            'terms' =>"$movie->name",
        )
    )));
if($loop->have_posts()){
    while($loop->have_posts()){
       $loop->the_post(); 
        ?>
<div class="item" style="background: url(<?php echo get_the_post_thumbnail_url();?>);">
                        <a class="url_item" href="<?php echo get_term_link($movie); ?>"></a>
                        <div class="info_item">
                            <span class="year"><?php echo get_the_terms(get_the_ID(), 'release_years')[0]->name; ?> <i class="fas fa-projector"></i></span>
                            <?php if (get_post_type(get_the_ID()) == 'episodes') 
                                $rate=get_post_meta($post->ID,"imdb","true");
                                if($rate!=""){
                                ?>
                                <span class="rate">
                                <?php echo $rate;?><i class="fad fa-star"></i></span>
                                <?php }?>
                                <span class="cat"><i class="far fa-tasks"></i>
                                <?php
                                echo get_the_category()[0]->name;
                                ?>
                            </span>
                        </div>
                        <div class="taxs">
                            <?php
                            $terms = get_the_terms(get_the_ID(), 'genres');
                            foreach ($terms as $term) {
                                echo '<span>' . $term->name . '</span>';
                            } ?>

                        </div>
                        <div class="title">
                            <h4>سلسلة افلام <?php echo $movie->name;?></h4>
                        </div>
                    </div>

    <?php
    
       }}
?>
   
    
    <?php
}
?>
</div>

<div class="container pagination">
        <?php
       $total_terms = wp_count_terms( array(
        'taxonomy' => 'all_seriess',
        'hide_empty' => true,
    ) );

        if($total_terms!=0){
           $pages = ceil($total_terms/42);
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

<?php get_footer(); ?>
