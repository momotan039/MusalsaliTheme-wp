<?php get_header(); setPostViews();?>
<div class="container main_single">
   <div class="video_iframe">
      <h1 class="title_block">سيرفرات المشاهدة</h1>
      <div class="container servers">
      <span class="main_server"><i class="fas fa-tachometer-alt"></i> <em>MUSALSALI</em></span>
      <?php 
            if(get_post_meta($post->ID,"server1_moveis",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server1_moveis",true)."'><i class='fad fa-play-circle'></i><em>VIDHD</em></span>";
            }
            if(get_post_meta($post->ID,"server2",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server2",true)."'><i class='fad fa-play-circle'></i><em>VIDBOM</em></span>";
            }
            if(get_post_meta($post->ID,"server3",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server3",true)."'><i class='fad fa-play-circle'></i><em>OK</em></span>";
            }
            if(get_post_meta($post->ID,"server4",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server4",true)."'><i class='fad fa-play-circle'></i>  <em>DoodStream</em></span>";
            }
            if(get_post_meta($post->ID,"server5",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server5",true)."'><i class='fad fa-play-circle'></i><em>Mixdrop</em></span>";
            }
            if(get_post_meta($post->ID,"server6",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server6",true)."'><i class='fad fa-play-circle'></i>  <em>VidFast</em></span>";
            }
         
            if(get_post_meta($post->ID,"server7",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server7",true)."'><i class='fad fa-play-circle'></i><em>Uqload</em></span>";
            }
            if(get_post_meta($post->ID,"server8",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server8",true)."'><i class='fad fa-play-circle'></i><em>Uptobox</em></span>";
            }
            if(get_post_meta($post->ID,"server9",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server9",true)."'><i class='fad fa-play-circle'></i><em>Mystream</em></span>";
            }
            if(get_post_meta($post->ID,"server10",true)!=""){
               echo "<span data-url='".get_post_meta($post->ID,"server10",true)."'><i class='fad fa-play-circle'></i><em>4shared</em></span>";
            }
      
      ?>
      </div>
         <div class="iframe_continer">
         <h1>الرجاء الانتظار ....</h1>
      <iframe allowfullscreen allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" src=""></iframe>
      <video id="myvid" class=" video-js vjs-big-play-centered" controls=""  poster="<?php echo get_the_post_thumbnail_url(); ?>" preload="auto" playsinline>
      <source class="src_myvid" src="<?php 
    
    if(get_post_meta(get_the_ID(),"serv240",true)!="")
    {
      echo get_post_meta(get_the_ID(),"serv240",true);
    }
    else{
        if(get_post_meta(get_the_ID(),"serv360",true)!="")
           echo get_post_meta(get_the_ID(),"serv360",true);
        else{
            if(get_post_meta(get_the_ID(),"serv480",true)!="")
           echo get_post_meta(get_the_ID(),"serv480",true);
            else{
                if(get_post_meta(get_the_ID(),"serv720",true)!="")
           echo get_post_meta(get_the_ID(),"serv720",true);
                else{
                    if(get_post_meta(get_the_ID(),"serv1080",true)!="")
           echo get_post_meta(get_the_ID(),"serv1080",true);
                }
            }
        }
    }
    
   
              ?>" type="video/mp4">
    </video>
<script src="<?php echo get_template_directory_uri().'/js/video.js';?>"></script>
<script>
   // hide video if no has src
    if(document.querySelector(".src_myvid").src=="")
    {
      document.querySelector("span.main_server").remove();
    document.querySelector(".video-js").style.display="none";
    document.querySelector(".main_single .video_iframe .iframe_continer iframe").style.display="block";
      }
   //add speed settings to video
var ctrvid=videojs('myvid',{
   playbackRates:[0.25,1,1.5,2,2.5,3],
   preload:'none',
});

//add option quality to video
let option_quality=document.createElement("div");
document.querySelector(".video-js .vjs-fullscreen-control").before(option_quality);
option_quality.outerHTML='<div title="Quality" class="btn_qual vjs-playback-rate vjs-menu-button vjs-menu-button-popup vjs-control vjs-button vjs-hover"> <div class="vjs-playback-rate-value current_qual"> <i class="far fa-cog"></i> </div> <button class="" type="button" title="ضبط الجودة"></button> <div class="vjs-menu menu_qual"> <ul class="vjs-menu-content menu_qual_ul"></ul> </div> </div>';
document.querySelector(".btn_qual").addEventListener("click",()=>{
   document.querySelector(".menu_qual_ul").classList.toggle("show");
})

    
//add item to menu quality\\
      let li_elm=document.createElement("li");
      <?php $name_server=array("serv1080","serv720","serv480","serv360","serv240");
         for($i=0;$i<4;$i++){
            if(get_post_meta(get_the_ID(),$name_server[$i],true)!=""){
               ?>
               document.querySelector(".menu_qual_ul").append(li_elm);
               li_elm.outerHTML='<li data-src="<?php echo get_post_meta(get_the_ID(),$name_server[$i],true)?>" class="vjs-menu-item item_qual"><span class="vjs-menu-item-text text_qual">'+"<?php echo $name_server[$i];?>".substr(4)+'</span></li>';
               <?php
            }
         }
            
      ?>
    
        
    //add class to background current li in menu quality\\
         let li_quality=document.querySelectorAll(".menu_qual_ul li");
         li_quality[li_quality.length-1].classList.add("vjs-selected");

         //show the erorr imedeatlly when click on video
         let video=document.querySelector(".video-js");
         function clicked_video(){
            li_quality[li_quality.length-1].click();
               document.querySelector(".menu_qual_ul").classList.remove("show");
               video.removeEventListener("click",clicked_video);
            }
            video.addEventListener("click",clicked_video);
    
//add event when click on item in menu quality
li_quality.forEach((li_elm)=>{
li_elm.addEventListener("click",()=>{
   li_quality.forEach((elm)=>{
      elm.classList.remove("vjs-selected");
   })
   
   let currentime=ctrvid.currentTime();
   li_elm.classList.add('vjs-selected');
    let temp=document.querySelector("#myvid_html5_api").src=li_elm.getAttribute("data-src");
    ctrvid.load();
    ctrvid.play();
    ctrvid.currentTime(currentime);
})
})
</script>
   </div>   
   </div>
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
      <div class="poster"
         style="background: url(<?php echo get_the_post_thumbnail_url(); ?>);">
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
         <p><?php echo  get_the_content(); ?></p>
      </div>
   </div>
   <?php if (has_term("", "actors")) {
   ?>
      <h1 class="container title_block">قائمة الممثلين</h1>
   <div class="container show_items actors_container">
         <?php
            $terms = get_the_terms($post->ID, 'actors');
            foreach ($terms as $term) {
               $bg_ground_url = get_term_meta($term->term_id, "actor_image", true);
            ?>
      <div class="actors">

         <div class="<?php if ($bg_ground_url == '') echo 'static_photo'; ?>"
            style="background-image: url('<?php echo $bg_ground_url; ?>');">
            <h3 class="name_actor"><?php echo $term->name; ?></h3>
            <a class="url_actor" href="<?php echo get_term_link($term->term_id); ?>"></a>
         </div>
      </div>
         <?php
            } ?>
   </div>

   <?php }

$all_seriess="";
   $terms = get_the_terms($post->id, 'all_seriess');
   if(!empty($terms)){
   foreach ($terms as $term) {
      $all_seriess = $term->name;
   }}
   if ($all_seriess != "") {
   ?>

   <div class="container all_seriess">
      <h1 class="title_block">باقي سلسلة <?php echo $all_seriess; ?></h1>
      <div class="show_items">
         <?php
            $query = new WP_Query(array("post_type" => array("movies", "seriess"), 'post__not_in' => array(get_the_ID()), 'tax_query' => array(
               array(
                  'taxonomy' => 'all_seriess',
                  'field' => 'slug',
                  'terms' => "$all_seriess",
               )
            )));
            if ($query->have_posts()) {
               while ($query->have_posts()) {
                  $query->the_post();
                  call_posts();
               }
            }
            ?>



      </div>
   </div>
   <?php } ?>
   <div class="relative_posts container">
      <h1 class="title_block">عروض اخرى قد تنال اعجابك</h1>
      <div class="show_items">
         <?php
         $terms = get_the_terms($post->id, "genres");
         $all_genres = array();
         foreach ($terms as $term) {
            array_push($all_genres, $term->term_id);
         }
         $query = new WP_Query(array(
            'tax_query' => array(
               array(
                  'taxonomy' => 'genres',
                  'field'    => 'term_id',
                  'terms'    =>  $all_genres,
               )
            ), "post__not_in" => array(get_the_ID()), "post_type" => get_post_type(), "cat" => get_the_category()[0]->term_id, "posts_per_page" => 17
         ));
         if ($query->have_posts()) {
            while ($query->have_posts()) {
               $query->the_post();
               call_posts();
            }
         }

         ?>

      </div>
   </div>
   <?php get_footer(); ?>