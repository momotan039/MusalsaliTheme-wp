<?php get_header(); ?>


<div class="container search_actor">
    <span>ابحث عن ممثل <i class="fal fa-theater-masks"></i></span>
    <form method="GET" action="/wordpress3/search_actor">
    <input placeholder="ابحث عن بطلك او بطلتك في مسلسلي...." type="text" name="name_actor" required>
    <button >بحث</button>
    </form>
</div>
<h1 class="title_block container">قائمة الممثلين</h1>
<div class="container show_items" style="text-align:center"> 
 <?php

 $page = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
 $taxonomy = 'actors';
 $offset = ( $page-1 )*40;
 $args = array( 'number' => 40, 'offset' => $offset,"order" => 'DESC','meta_key' => 'term_views_count','orderby'=>"meta_value_num" );
 $terms = get_terms( $taxonomy, $args );
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



?>
</div>
<div class="container pagination">

        <?php
            get_next_posts_link();
            $per_page = 40;
            $taxonomy = 'actors';

                $total_terms = wp_count_terms( array(
                    'taxonomy' => 'actors',
                    'hide_empty' => true,
                ) );
                $pages = ceil($total_terms/40);
                if($pages>=1){
                 {
                  echo '<a class="next page-numbers" href="'.get_pagenum_link($page-1).'">«</a>';
                 }
                 //first page
                 if($page!=1)
                 echo '<a class="next page-numbers" href="'.get_pagenum_link(1).'">1</a>';
                 
                 //span
                 if(floor($page/2)>1)
                 echo "<span>...</span>";
      
                 //before current page
                 for($i=$page-2;$i<$page;$i++){
                  if($i>1)
                  echo '<a class="next page-numbers" href="'.get_pagenum_link($i).'">'.$i.'</a>';
                 }
                 //current page
                 for($i=$page;$i<=$page+1;$i++){
                  if($i<$pages)
                  echo '<a class="next page-numbers" href="'.get_pagenum_link($i).'">'.$i.'</a>';
                 }
      
                   //after current page
      
                 //span
                 if($page*2<$pages){
                  echo "<span>...</span>";
                 }
                  //last page
                 echo '<a class="next page-numbers" href="'.get_pagenum_link($pages).'">'.$pages.'</a>';
              
      
                 if($page<$pages)
                 {
                   echo '<a class="next page-numbers" href="'.get_pagenum_link($page+1).'">»</a>';
                 }
            }

        ?>
</div>
<?php get_footer();?>