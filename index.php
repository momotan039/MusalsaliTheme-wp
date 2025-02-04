<?php get_header(); ?>

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
                foreach($cats as $cat){
                    echo "<li data-term=".$cat->term_id.">".$cat->name."</li>";
                }
                
                ?>
            </ul>
            <input type="hidden" name="cats">
        </div>
        <div class="genres_show">
            <span>نوع العرض</span>
            <ul>
                <?php 
                $genres=get_terms(array(
                    "taxonomy"=>"genres"
                ));
                foreach($genres as $genre){
                    echo "<li data-term=".$genre->term_id.">".$genre->name."</li>";
                }
                
                ?>
            </ul>
            <input type="hidden" name="genres">
        </div>
        <div class="years_show">
            <span>سنة اصدار العرض</span>
            <ul>
                <?php 
                $years=get_terms(array(
                    "taxonomy"=>"release_years"
                ));
                foreach($years as $year){
                    echo "<li data-term=".$year->term_id.">".$year->name."</li>";
                }
                
                ?>
            </ul>
            <input required type="hidden" name="years">
        </div>
                <button>بحث</button>
    </form>
</div>
<div class="show_items container">
            <?php

       while(have_posts(  )){
           the_post(  );
           call_posts();
       }
            ?>
</div>
<div class="container pagination">
<?php
      create_pagination();
?>
</div>

<?php get_footer( )?>