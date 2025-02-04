<?php get_header(); setPostViews();?>
<div class="container main_single">
   <div class="crumb">
   <ul>
         <li><a title="مسلسلي" href="<?php echo get_home_url(); ?>"><i class="fad fa-home"></i> الرئيسية</a></li>
         <i class="fad fa-arrow-alt-left"></i>
         <li><?php the_category(" "); ?></li>
         <i class="fad fa-arrow-alt-left"></i>
         <li><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
      </ul>
   </div>

   <div class="poster_info_poster">
      <div class="poster" style="background: url(<?php echo str_replace("localhost/wordpress3", "musalsali.com", get_the_post_thumbnail_url()); ?>);">
      </div>
      <div class="info_poster">
         <div class="title"><?php the_title("<h1>", "</h1>"); ?></div>
         <div class="cat"><span><i class="fas fa-popcorn"></i> الفئة</span><?php the_category(" "); ?></div>
         <div class="genre"><span><i class="fas fa-tags"></i> النوع</span><?php $terms = get_the_terms($post->id, "genres");
                                                foreach ($terms as $term) {
                                                   $term_id = get_term_link($term->term_id);
                                                   echo "<a href=" . $term_id . "> " . $term->name . " </a>";
                                                }
                                                ?></div>
         <div class="year"><span><i class="fas fa-calendar-day"></i> السنة</span><?php $terms = get_the_terms($post->id, "release_years");
                                             foreach ($terms as $term) {
                                                $term_id = get_term_link($term->term_id);
                                                echo "<a href=" . $term_id . "> " . $term->name . " </a>";
                                             }
                                             ?></div>
         <?php if (get_post_type(get_the_ID()) == 'episodes')
            $rate = get_post_meta(get_post_meta(get_The_ID(), 'id_name_series', 'true'), 'imdb', 'true');
         else $rate = get_post_meta($post->ID, 'imdb', 'true');
         if ($rate != "") {
         ?>
            <div class="rate">
               <span><i class="fad fa-star"></i> تقييم</span><a href=""><?php echo $rate; ?></a>
            </div>
         <?php } ?>
      </div>
      <div class="story">
         <h2>قصة العرض</h2>
         <p><?php echo  get_the_content();?></p>
      </div>
   </div>
   <div class="container eps_container">
        <h1 class="title_block">حلقات المسلسل</h1>
        <div class="all_episodes">
            <?php 
            global $wp;
            $current_page= home_url(add_query_arg(array(), $wp->request))."/";
            $query_episodes = new WP_Query(array("orderby"=>"asc","meta_value"=>get_the_ID(),"meta_key"=>"id_name_series","post_type"=>"episodes",'posts_per_page' => -1));
            $array_numbers=array();
                  $array_data=array();
               while ($query_episodes->have_posts()) {
                  $query_episodes->the_post();
                  
                     $name_ep=substr("".get_the_title(),"".strpos(get_the_title().""," حلقة")+8);
                     $name_ep = preg_replace('/[^.-9-+]/', '', $name_ep); 
                  array_push($array_numbers,$name_ep);
                  array_push($array_data,$name_ep,get_the_ID());
                  }
                  //1,123,2,1234,3,123456
                  //1,2,3
                  sort($array_numbers); 
                  $arrlength = count($array_numbers);
                  $arrlength2 = count($array_data);
               for($x = $arrlength-1; $x >= 0; $x--) {
                  $id_episode="";
                  for($c = 0; $c <$arrlength2; $c=$c+2){
                     if($array_data[$c]==$array_numbers[$x]){
                           $id_episode=$array_data[$c+1];
                     }}
            ?>
             <span <?php if(get_the_permalink($id_episode)==$current_page)echo "class='active'";?>><a href="<?php the_permalink($id_episode);?>"></a><em>الحلقة</em><?php echo $array_numbers[$x];?></span>
            <?php
            }
            ?>
           
        </div>
    </div>
   <?php if(has_term("","actors")){
      ?>
         <h1 class="container title_block">قائمة الممثلين</h1>
      <div class="container show_items actors_container">
         <?php 
         $terms = get_the_terms($post->ID, 'actors' );
         foreach($terms as $term){
            $bg_ground_url=get_term_meta($term->term_id  ,"actor_image",true);
         ?>
      <div class="actors">
         <div class="<?php if($bg_ground_url=='') echo 'static_photo';?>" style="background-image: url('<?php echo $bg_ground_url;?>');">
            <h3 class="name_actor"><?php echo $term->name;?></h3>
            <a class="url_actor" href="<?php echo get_term_link($term->term_id);?>"></a>
         </div>
      </div>
         <?php }?>
      </div>
     
      <?php }


        $terms = get_the_terms($post->id, 'season_seriess' );
        $counter_seriess=0;
        $season_seriess="";
        if(!empty($terms)){
        foreach($terms as $term) {
         $season_seriess=$term->name;
         $counter_seriess++;
      }}
      if($season_seriess!="" && $counter_seriess>1)  {
      ?>
      
            <div class="container all_seriess">
            <h1 class="title_block">باقي مواسم <?php echo $season_seriess;?></h1>
            <div class="show_items">
               <?php 
               $query=new WP_Query(array("post_type"=>array("movies","seriess"),'post__not_in' => array(get_the_ID()),'tax_query' => array(
                  array (
                      'taxonomy' => 'season_seriess',
                      'field' => 'slug',
                      'terms' =>"$season_seriess",
                  )
              )));
              if($query->have_posts()){
               while ($query->have_posts()) {
                 $query->the_post(); call_posts();
               }}
               ?>
             
             
               
            </div>
            </div>
            <?php }?>
            <div class="relative_posts container">
               <h1 class="title_block">عروض اخرى قد تنال اعجابك</h1>
               <div class="show_items">
                  <?php
                    $terms= get_the_terms($post->id,"genres");
                    $all_genres=array();
                    foreach($terms as $term){
                       array_push($all_genres,$term->term_id);
                    }
                   $query=new WP_Query(array('tax_query' => array(
                     array(
                         'taxonomy' => 'genres',
                         'field'    => 'term_id',
                         'terms'    =>  $all_genres,
                        ))
                         ,"post__not_in"=>array(get_the_ID()),"post_type"=>get_post_type( ),"cat"=>get_the_category()[0]->term_id,"posts_per_page"=>17));
                        if($query->have_posts(  )){
                           while($query->have_posts(  )){
                              $query->the_post();
                              call_posts();
                           }
                        }
                
                  ?>
                  
               </div>
            </div>
      <?php get_footer(); ?>