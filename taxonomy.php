<?php get_header( );
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
?>
<div class="container">
    <?php if(get_query_var("taxonomy")!="all_seriess"){?>
    <h1 class="title_block">جميع العروض الخاصة بِ <?php echo $term->name;?></h1>
    <?php}?>
    <div class="show_items">
        <?php 
        while(have_posts(  )){
            the_post();
            call_posts();
        }
        
        ?>
    </div>
    <div class="pagination">
<?php
      create_pagination();
?>
</div>
</div>
<?php get_footer( );?>