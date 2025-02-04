<?php get_header(); ?>
<div class="container result_search">
    
    <?php 
    if(!have_posts()){
    ?>
    <h2>عذرا,لا يوجد عروض بهذا الاسم</h2>
    <?php }else{?>
        <h2>نتائج بحثك عن <?php echo $_GET["s"]?></h2>
        <?php }?>
</div>
<div class="container show_items">

    <?php
    while (have_posts()) {
       the_post();
    ?>
        <div class="item" style="background: url(<?php echo str_replace("localhost/wordpress3", "musalsali.com", get_the_post_thumbnail_url()); ?>);">
            <a class="url_item" href="<?php the_permalink(); ?>"></a>
            <div class="info_item">
                <span class="year"><?php echo get_the_terms($post->ID, 'release_years')[0]->name; ?> <i class="fas fa-projector"></i></span>
                <?php $title_episode = get_the_title();
                    if (get_post_type(get_the_ID()) == 'episodes') {
                ?>
                
                    <?php
                    $name_ep="";
                        if (strpos($title_episode, 'الاخيرة') !== false || strpos($title_episode, 'الأخيرة') !== false) {
                    ?> <span class="final_eps">الأخيرة</span> <?php
                                } else {
                                    ?>
                                <span class="episode"><em>حلقة</em>
                                <?php
                                    $name_ep = substr('' . $title_episode, '' . strpos($title_episode . '', 'حلقة') + 8);
                                    $words = array("مترجمة", "مدبلجة", "الاولي", "الاولى", "مترجم", "مدبلج");
                                    foreach ($words as $word) {
                                        $name_ep = str_replace($word, ' ', $name_ep);
                                    }
                                }
                                
                                echo $name_ep;
                            }
                             ?>
                </span>
                <?php if (get_post_type(get_the_ID()) == 'episodes') $rate= get_post_meta(get_post_meta(get_The_ID(), 'id_name_series', 'true'), 'imdb', 'true');
                    else $rate= get_post_meta($post->ID, 'imdb', 'true'); 
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
                $terms = get_the_terms($post->ID, 'genres');
                foreach ($terms as $term) {
                    echo '<span>' . $term->name . '</span>';
                } ?>

            </div>
            <div class="title">
                <h4><?php echo $title_episode; ?></h4>
            </div>
        </div>
    <?php
    }
    ?>

</div>
<div class="container pagination">
<?php
      create_pagination();
?>
</div>

<?php get_footer( )?>