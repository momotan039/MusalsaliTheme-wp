<?php
global $post;

add_theme_support( 'post-thumbnails' );

add_action( 'wp_ajax_nopriv_get_data', 'get_data' );
add_action( 'wp_ajax_get_data', 'get_data' );
    
            // add movies post type
            function movie_project()
            {
                $labels = array(
                    "name" => "movies",
                    "menu_name" => "movies",
                    'singular_name' => "movie",
                    'add_new' => "add new movie",
                    'add_new_item' => "add new movie",
                    'edit_item' => "edit movie",
                    'new_item' => "new movie",
                    'view_item' => "view movie",
                    'search_items' => "search_movies",
                    'not_found' => "no movie is found",
                    'not_found_in_trash' => "no movie is found in trash",
                );
                $labels2 = array(
                    "labels" => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'query_var'          => true,
                    'rewrite'            => array('slug' => 'movies'),
                    'capability_type'    => 'post',
                    'has_archive'        => true,
                    'hierarchical'       => true,
                    'menu_position'      => 5,
                    "menu_icon"          => "dashicons-format-video",
                    'supports'           => array('title', "editor", 'thumbnail'),
                    'taxonomies'         => array('category'),
                );
                register_post_type("movies", $labels2);
            }
            add_action("init", "movie_project");

            //add episodes post type
            function episode_project()
            {
                $labels = array(
                    "name" => "episodes",
                    "menu_name" => "episodes",
                    'singular_name' => "episode",
                    'add_new' => "add new episode",
                    'add_new_item' => "add new episode",
                    'edit_item' => "edit episode",
                    'new_item' => "new episode",
                    'view_item' => "view episode",
                    'search_items' => "search_episodes",
                    'not_found' => "no episode is found",
                    'not_found_in_trash' => "no episode is found in trash",
                );
                $labels2 = array(
                    "labels" => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'query_var'          => true,
                    'rewrite'            => array('slug' => 'episodes'),
                    'capability_type'    => 'post',
                    'has_archive'        => true,
                    'hierarchical'       => true,
                    'menu_position'      => 5,
                    "menu_icon"          => "dashicons-format-video",
                    'supports'           => array("editor", 'title', 'thumbnail'),
                    'taxonomies'         => array('category'),
                );
                register_post_type("episodes", $labels2);
            }
            add_action("init", "episode_project");

            //add seriess post type
            function series_project()
            {
                $labels = array(
                    "name" => "seriess",
                    "menu_name" => "seriess",
                    'singular_name' => "series",
                    'add_new' => "add new series",
                    'add_new_item' => "add new series",
                    'edit_item' => "edit series",
                    'new_item' => "new series",
                    'view_item' => "view series",
                    'search_items' => "search_seriess",
                    'not_found' => "no series is found",
                    'not_found_in_trash' => "no series is found in trash",
                );
                $labels2 = array(
                    "labels" => $labels,
                    'public' => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'query_var'          => true,
                    'rewrite'            => array('slug' => 'seriess'),
                    'capability_type'    => 'post',
                    'has_archive'        => true,
                    'hierarchical'       => true,
                    'menu_position'      => 5,
                    "menu_icon"          => "dashicons-format-video",
                    'supports'           => array("editor", 'title', 'thumbnail'),
                    'taxonomies'         => array('category'),
                );
                register_post_type("seriess", $labels2);
            }
            add_action("init", "series_project");

            // Register Menu
            function add_menu()
            {
                register_nav_menus(array());
            }
            add_action('init', 'add_menu');



            //create a custom taxonomy name all_seriess
            add_action('init', 'create_all_seriess_taxonomy', 0);
            function create_all_seriess_taxonomy()
            {
                $labels1 = array(
                    'name' => _x('all_seriess', 'taxonomy general name'),
                    'singular_name' => _x('all_series', 'taxonomy singular name'),
                    'search_items' => __('Search all_seriess'),
                    'all_items' => __('All all_seriess'),
                    'parent_item' => __('Parent all_series'),
                    'parent_item_colon' => __('Parent all_series:'),
                    'edit_item' => __('Edit all_series'),
                    'update_item' => __('Update all_series'),
                    'add_new_item' => __('Add New all_series'),
                    'new_item_name' => __('New all_series Name'),
                    'menu_name' => __('all_seriess'),
                );

                // taxonomy register
                register_taxonomy('all_seriess', array("movies"), array(
                    'hierarchical' => true,
                    'labels' => $labels1,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array('slug' => 'all_series'),
                ));
            }



            //create a custom taxonomy name season_seriess
            add_action('init', 'create_season_seriess_taxonomy', 0);
            function create_season_seriess_taxonomy()
            {
                $labels1 = array(
                    'name' => _x('season_seriess', 'taxonomy general name'),
                    'singular_name' => _x('season_series', 'taxonomy singular name'),
                    'search_items' => __('Search season_seriess'),
                    'all_items' => __('All season_seriess'),
                    'parent_item' => __('Parent season_series'),
                    'parent_item_colon' => __('Parent season_series:'),
                    'edit_item' => __('Edit season_series'),
                    'update_item' => __('Update season_series'),
                    'add_new_item' => __('Add New season_series'),
                    'new_item_name' => __('New season_series Name'),
                    'menu_name' => __('season_seriess'),
                );

                // taxonomy register
                register_taxonomy('season_seriess', array("seriess"), array(
                    'hierarchical' => true,
                    'labels' => $labels1,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array('slug' => 'season_series'),
                ));
            }

            //create a custom taxonomy name genres
            add_action('init', 'create_genres_taxonomy', 0);

            function create_genres_taxonomy()
            {
                $labels1 = array(
                    'name' => _x('genres', 'taxonomy general name'),
                    'singular_name' => _x('genre', 'taxonomy singular name'),
                    'search_items' => __('Search genres'),
                    'all_items' => __('All genres'),
                    'parent_item' => __('Parent genre'),
                    'parent_item_colon' => __('Parent genre:'),
                    'edit_item' => __('Edit genre'),
                    'update_item' => __('Update genre'),
                    'add_new_item' => __('Add New genre'),
                    'new_item_name' => __('New genre Name'),
                    'menu_name' => __('genres'),
                );

                // taxonomy register
                register_taxonomy('genres', array('post', "movies", "seriess", "episodes"), array(
                    'hierarchical' => true,
                    'labels' => $labels1,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array('slug' => 'genre'),
                ));
            }


            //create a custom taxonomy name years
            add_action('init', 'create_years_taxonomy', 0);
            function create_years_taxonomy()
            {
                $labels2 = array(
                    'name' => _x('release_years', 'taxonomy general name'),
                    'singular_name' => _x('release_year', 'taxonomy singular name'),
                    'search_items' => __('Search release_years'),
                    'all_items' => __('All release_years'),
                    'parent_item' => __('Parent release_year'),
                    'parent_item_colon' => __('Parent release_year:'),
                    'edit_item' => __('Edit release_year'),
                    'update_item' => __('Update release_year'),
                    'add_new_item' => __('Add New release_year'),
                    'new_item_name' => __('New release_year Name'),
                    'menu_name' => __('release_years'),
                );
                // taxonomy register
                register_taxonomy('release_years', array('post', "movies", "seriess", "episodes"), array(
                    'hierarchical' => true,
                    'labels' => $labels2,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array('slug' => 'release_year'),
                ));
            }

            //create a custom taxonomy name actors
            add_action('init', 'create_actors_taxonomy', 0);

            function create_actors_taxonomy()
            {
                $labels3 = array(
                    'name' => _x('actors', 'taxonomy general name'),
                    'singular_name' => _x('actor', 'taxonomy singular name'),
                    'search_items' => __('Search actors'),
                    'all_items' => __('All actors'),
                    'parent_item' => __('Parent actor'),
                    'parent_item_colon' => __('Parent actor:'),
                    'edit_item' => __('Edit actor'),
                    'update_item' => __('Update actor'),
                    'add_new_item' => __('Add New actor'),
                    'new_item_name' => __('New actor Name'),
                    'menu_name' => __('actors'),
                );
                // taxonomy register
                register_taxonomy('actors', array("movies", "seriess"), array(
                    'hierarchical' => true,
                    'labels' => $labels3,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'query_var' => true,
                    'rewrite' => array('slug' => 'actor'),
                    'supports' => 'thumbnail',
                ));
            }
            

            function create_pagination()
            {
                $current_page = get_query_var('paged') ? get_query_var('paged') : 1;
                echo paginate_links(array(
                    "base" => get_pagenum_link() . "%_%",
                    "format" => "/page/%#%",
                    "current" => $current_page,
                    "next_text" => "»",
                    "prev_text" => "«",
                ));
            }
            function call_posts(){
                global $post;
                ?>
                    <div class="item" style="background: url(<?php echo get_the_post_thumbnail_url();?>);">
                        <a class="url_item" href="<?php the_permalink(); ?>"></a>
                        <div class="info_item">
                            <span class="year"><?php echo get_the_terms(get_the_ID(), 'release_years')[0]->name; ?> <i class="fas fa-projector"></i></span>
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
                                else $rate= get_post_meta(get_the_ID(), 'imdb', 'true'); 
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
                            <h4><?php echo $title_episode; ?></h4>
                        </div>
                    </div>
                <?php
            }

            //creat meta box for ifram server
function my_fist_meta_box(){
    //parameter 1>id  2>title 3>type of post 4>call function
    add_meta_box("metaboxid","first meta box_movies","metabox_movies_function","movies","normal","high");
    add_meta_box("metaboxss","first meta box_seriess","metabox_seriess_function","seriess","normal","high");
add_meta_box("metaboxidx","select seriess box","meta_box_select_function","episodes","normal","high");
add_meta_box("metaboxid","server box","metabox_function_episode","episodes","normal","high");
add_meta_box("meta_Box_rest_idEP","meta_Box_rest_EPISODE","meta_Box_rest_functionEP","episodes","normal","high");
  }
    add_action("add_meta_boxes","my_fist_meta_box");
    
    function metabox_movies_function(){
        ?>
    
        <div class="container_btserver">
          <textarea class="tex_dataserver" style="
            width: -webkit-fill-available;
            background: steelblue;
            color: black;
            height: -webkit-fill-available;
        "></textarea>
          <h1 class='title_server'>imdb</h1> <input type='text' class='imdbrs imdb' name="imdb" value='<?php echo get_post_meta(get_the_ID(  ),'imdb',true);?>
        ' /><br><br>
          <h1 class='title_server'>Actors</h1>
          <input type='text' class='actors_in imdb' name="actors_in" value='<?php echo get_post_meta(get_the_ID(  ),'actors_in',true);?>' /><br><br>
          <h1 class='title_server'>server 240p</h1> <input type='text' class='imdb serv240' name="serv240"
            value='<?php echo get_post_meta(get_the_ID(),"serv240",true);?>' /><br><br>
          <h1 class='title_server'>server 360p</h1> <input type='text' class='imdb serv360' name="serv360"
            value='<?php echo get_post_meta(get_the_ID(),"serv360",true);?>' /><br><br>
          <h1 class='title_server'>server 480p</h1> <input type='text' class='imdb serv480' name="serv480"
            value='<?php echo get_post_meta(get_the_ID(),"serv480",true);?>' /><br><br>
          <h1 class='title_server'>server 720p</h1> <input type='text' class='imdb serv720' name="serv720"
            value='<?php echo get_post_meta(get_the_ID(),"serv720",true);?>' /><br><br>
          <h1 class='title_server'>server 1080p</h1> <input type='text' class='imdb serv1080' name="serv1080"
            value='<?php echo get_post_meta(get_the_ID(),"serv1080",true);?>' /><br><br>
    
          <h1 class='title_server'>VIDHD</h1> <input type='text' class='serv1 inservers' name="VIDHD" value='<?php echo get_post_meta(get_the_ID(  ),'server1',true);?>' />
          <br><br>  
          <h1 class='title_server'>VIDBOM</h1><input type='text' class='serv2 inservers' name="VIDBOM" value='<?php echo get_post_meta(get_the_ID(  ),'server2',true);?>' />
          <br><br>  <h1 class='title_server'>ok</h1> <input type='text' class='serv3 inservers' name="ok" value='<?php echo get_post_meta(get_the_ID(  ),'server3',true);?>' /> 
           <br><br>  <h1 class='title_server'>DoodStream</h1> <input type='text' class='serv4 inservers' name="DoodStream" value='<?php echo get_post_meta(get_the_ID(  ),'server4',true);?>' />
           <br><br>  <h1 class='title_server'>Mixdrop</h1> <input type='text' class='serv5 inservers' name="Mixdrop" value='<?php echo get_post_meta(get_the_ID(  ),'server5',true);?>' />
           <br><br>  <h1 class='title_server '>VidFast</h1> <input type='text' class='serv6 inservers' name="VidFast" value='<?php echo get_post_meta(get_the_ID(  ),'server6',true);?>' />
           <br><br>  <h1 class='title_server '>Uqload</h1> <input type='text' class='serv7 inservers' name="Uqload" value='<?php echo get_post_meta(get_the_ID(  ),'server7',true);?>' />
           <br><br>  <h1 class='title_server '>Uptobox</h1> <input type='text' class='serv8 inservers' name="Uptobox" value='<?php echo get_post_meta(get_the_ID(  ),'server8',true);?>' />
           <br><br>  <h1 class='title_server '>Mystream</h1> <input type='text' class='serv9 inservers' name="Mystream" value='<?php echo get_post_meta(get_the_ID(  ),'server9',true);?>' />
           <br><br>  <h1 class='title_server '>4shared</h1> <input type='text' class='serv10 inservers' name="4shared" value='<?php echo get_post_meta(get_the_ID(  ),'server10',true);?>' /></div>
    
      <style>
       
    
        #meta_Box_editor_id textarea {
          min-height: 176px;
          width: -webkit-fill-available;
          direction: rtl;
          font-size: 23px;
        }
    
       
    
        .container_btserver .imdb {
          background-color: #FFEB3B;
          width: 80%;
          direction: ltr;
          font-size: x-large;
          color: #FF5722;
        }
    
        .container_btserver .title_server {
          display: inline;
        }
    
        .container_btserver {
          direction: rtl;
        }
    
        .container_btserver .inservers {
          background-color: #000000;
          width: 80%;
          direction: ltr;
          font-size: x-large;
          color: #ffffff;
        }
      </style>
    
    <?php
    }
      
      function metabox_seriess_function(){
          global $post;
              ?>
          <div class="container_btserver">
          <h1  class='title_server'>imdb</h1> <input  type='text' class='imdb' name="imdb" value='<?php echo get_post_meta(get_the_ID(),'imdb',true);?>
          '/><br><br><h1  class='title_server'>Actors</h1> 
          <input  type='text' class='actors_in imdb' name="actors_in" value='<?php echo get_post_meta(get_the_ID(),'actors_in',true);?>
          '/><br><br>
          </div>
      
          <style>
              #meta_Box_editor_id textarea{
                      min-height: 176px;
              width: -webkit-fill-available;
              direction: rtl;
              font-size: 23px;
              }
              .container_btserver .imdb{
              background-color: #FFEB3B;
              width: 80%;

              direction: ltr;
              font-size: x-large;
              color: #FF5722;
      
              }
              
              </style>
      
          <?php
      }



           
    function getPostViews($post_id) {
  
      if(get_post_meta( $post_id, 'post_views_count', true )==""){
           update_post_meta( $post_id, 'post_views_count', 0); 
      }
    $count = get_post_meta( $post_id, 'post_views_count', true );
      return $count;
  }
  function meta_box_select_function(){
    $my_query=new WP_Query(array(
        'posts_per_page'  => -1,
        "post_type"=>"seriess",
    ));
    ?>
    <div class="series_select_div">
        <span><input placeholder="اختار المسلسل" type="text"></span>
        <ul>
        <?php
        if($my_query->have_posts()){
        while($my_query->have_posts()){
            $my_query->the_post();
        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;
        the_title("<li  data-cat='". $category_id."' data-id='".get_the_ID()."'>","</li>");
        }}
        
        ?>
        </ul>
    </div>
    <?php


}
function meta_Box_rest_functionEP(){
        ?> 
            <input class="rest_id_cat_series" value="<?php echo get_post_meta(get_the_ID(),'id_cat_series',true);?>" />
        <input class="rest_id_name_series" value="<?php echo get_post_meta(get_the_ID(),'id_name_series',true);?>" />
        <input class="rest_id_name_episode" value="<?php echo get_post_meta(get_the_ID(),'id_name_episode',true);?>" />
        
        <input class="rest_thumbnail" value="<?php echo get_post_meta(get_the_ID(),'thumbnail',true);?>" />

        <input class="res_serv1" value="<?php echo get_post_meta(get_the_ID(),'server1',true);?>" />
        <input class="res_serv2" value="<?php echo get_post_meta(get_the_ID(),'server2',true);?>" />
        <input class="res_serv3" value="<?php echo get_post_meta(get_the_ID(),'server3',true);?>" />
        <input class="res_serv4" value="<?php echo get_post_meta(get_the_ID(),'server4',true);?>" />
        <input class="res_serv5" value="<?php echo get_post_meta(get_the_ID(),'server5',true);?>" />
        <input class="res_serv6" value="<?php echo get_post_meta(get_the_ID(),'server6',true);?>" />
        <input class="res_serv7" value="<?php echo get_post_meta(get_the_ID(),'server7',true);?>" />
        <input class="res_serv8" value="<?php echo get_post_meta(get_the_ID(),'server8',true);?>" />
        <input class="res_serv9" value="<?php echo get_post_meta(get_the_ID(),'server9',true);?>" />
        <input class="res_serv10" value="<?php echo get_post_meta(get_the_ID(),'server10',true);?>" />
        <input class="rest_server240" value="<?php echo get_post_meta(get_the_ID(),"serv240",true);?>" />

        <input class="rest_server360" value="<?php echo get_post_meta(get_the_ID(),"serv360",true);?>" />
        <input class="rest_server480" value="<?php echo get_post_meta(get_the_ID(),'serv480',true);?>" />
        <input class="rest_server720" value="<?php echo get_post_meta(get_the_ID(),'serv720',true);?>" />
        <input class="rest_server1080" value="<?php echo get_post_meta(get_the_ID(),'serv1080',true);?>" />
        
        <?php
}

function metabox_function_episode(){
                ?>
            <div class="container_btserver">
            <textarea class="tex_dataserver" style="
                width: -webkit-fill-available;
                background: steelblue;
                color: black;
                height: -webkit-fill-available;
            "></textarea>
                
            <div class="hiding-data">
            <h1  class='title_server'>id_cat_series</h1> <input  type='text' class='imdb id_cat_series' name="id_cat_series" value='<?php echo get_post_meta(get_the_ID(),"id_cat_series",true);?>'/><br><br>
            <h1  class='title_server'>id_name_series</h1> <input  type='text' class='imdb id_name_series' name="id_name_series" value='<?php echo get_post_meta(get_the_ID(),"id_name_series",true);?>'/><br><br>
            </div>
            <h1  class='title_server'>server 240p</h1> <input  type='text' class='imdb serv240' name="serv240" value='<?php echo get_post_meta(get_the_ID(),"serv240",true);?>'/><br><br>
            <h1  class='title_server'>server 360p</h1> <input  type='text' class='imdb serv360' name="serv360" value='<?php echo get_post_meta(get_the_ID(),"serv360",true);?>'/><br><br>
            <h1  class='title_server'>server 480p</h1> <input  type='text' class='imdb serv480' name="serv480" value='<?php echo get_post_meta(get_the_ID(),"serv480",true);?>'/><br><br>
            <h1  class='title_server'>server 720p</h1> <input  type='text' class='imdb serv720' name="serv720" value='<?php echo get_post_meta(get_the_ID(),"serv720",true);?>'/><br><br>
            <h1  class='title_server'>server 1080p</h1> <input  type='text' class='imdb serv1080' name="serv1080" value='<?php echo get_post_meta(get_the_ID(),"serv1080",true);?>'/><br><br>
                
            <h1  class='title_server'>VIDHD</h1> <input  type='text' class='serv1 inservers' name="VIDHD" value='<?php echo get_post_meta(get_the_ID(),'server1',true);?>'/><br><br>
            <h1  class='title_server'>VIDBOM</h1><input  type='text' class='serv2 inservers' name="VIDBOM" value='<?php echo get_post_meta(get_the_ID(),'server2',true);?>'/><br><br>
            <h1  class='title_server'>ok</h1> <input  type='text' class='serv3 inservers' name="ok" value='<?php echo get_post_meta(get_the_ID(),'server3',true);?>'/>
            <br><br><h1  class='title_server'>DoodStream</h1> <input  type='text' class='serv4 inservers' name="DoodStream" value='<?php echo get_post_meta(get_the_ID(),'server4',true);?>'/><br><br>
            <h1  class='title_server'>Mixdrop</h1> <input  type='text' class='serv5 inservers' name="Mixdrop" value='<?php echo get_post_meta(get_the_ID(),'server5',true);?>'/><br><br>
            <h1  class='title_server'>VidFast</h1> <input  type='text' class='serv6 inservers' name="VidFast" value='<?php echo get_post_meta(get_the_ID(),'server6',true);?>'/><br><br>
            <h1  class='title_server'>Uqload</h1> <input  type='text' class='serv7 inservers' name="Uqload" value='<?php echo get_post_meta(get_the_ID(),'server7',true);?>'/><br><br>
            <h1  class='title_server'>Uptobox</h1> <input  type='text' class='serv8 inservers' name="Uptobox" value='<?php echo get_post_meta(get_the_ID(),'server8',true);?>'/><br><br>
            <h1  class='title_server'>Mystream</h1> <input  type='text' class='serv9 inservers' name="Mystream" value='<?php echo get_post_meta(get_the_ID(),'server9',true);?>'/><br><br>
            <h1  class='title_server'>4shared</h1> <input  type='text' class='serv10 inservers' name="4shared" value='<?php echo get_post_meta(get_the_ID(),'server10',true);?>'/></div>

            <style>
 .series_select_div span {
     position:relative;
 }   
 .series_select_div span::after{
    content: "";
    border-width: 5px;
    border-color: black transparent transparent;
    border-style: solid;
    position: absolute;
    bottom: 0;
    right: 8px;
 }            
.series_select_div ul{
  max-height: 500px;
  overflow-y: auto;
  width: max-content;
  font-weight: bold;
  display:none;
}
.series_select_div ul.show{
  display:block;
}
.series_select_div ul li{
    cursor:pointer;
    color:red;
}
                
                .hiding-data,#meta_Box_rest_id{
                    display: none;
                }
                .container_btserver .imdb{
                background-color: #FFEB3B;
                width: 80%;
                direction: ltr;
                font-size: x-large;
                color: #FF5722;
                }
                .container_btserver .title_server{
                    display: inline;
                }
                .container_btserver {
                    direction: rtl;
                }
            .container_btserver .inservers{
            background-color: #000000;
                width: 80%;
                direction: ltr;
                font-size: x-large;
                color: #ffffff;
                }
            </style>

            <?php
}

 function save_metabox_function_episode(){
if(isset($_POST["VIDHD"])||isset($_POST["imdb"])):

             update_post_meta(get_the_ID(), 'imdb', $_POST["imdb"]);
            update_post_meta(get_the_ID(), 'actors_in', $_POST["actors_in"]);
                update_post_meta(get_the_ID(), 'serv240', $_POST["serv240"]);
            update_post_meta(get_the_ID(), 'serv360', $_POST["serv360"]); 
            update_post_meta(get_the_ID(), 'serv480', $_POST["serv480"]); 
            update_post_meta(get_the_ID(), 'serv720', $_POST["serv720"]); 
            update_post_meta(get_the_ID(), 'serv1080', $_POST["serv1080"]); 
            update_post_meta(get_the_ID(), 'id_cat_series', $_POST["id_cat_series"]);  
            update_post_meta(get_the_ID(), 'id_name_series', $_POST["id_name_series"]);  
            update_post_meta(get_the_ID(), 'server1', $_POST["VIDHD"]);
                update_post_meta(get_the_ID(), 'server2', $_POST["VIDBOM"]);
            update_post_meta(get_the_ID(), 'server3', $_POST["ok"]);
            update_post_meta(get_the_ID(), 'server4', $_POST["DoodStream"]);
            update_post_meta(get_the_ID(), 'server5', $_POST["Mixdrop"]);
            update_post_meta(get_the_ID(), 'server6', $_POST["VidFast"]);
                update_post_meta(get_the_ID(), 'server7', $_POST["Uqload"]);
            update_post_meta(get_the_ID(), 'server8', $_POST["Uptobox"]);
            update_post_meta(get_the_ID(), 'server9', $_POST["Mystream"]);
                update_post_meta(get_the_ID(), 'server10', $_POST["4shared"]);

                if(get_post_type(get_the_ID(  ))=="episodes"){
                                    //set thumbnail to post by seriess id
                          set_post_thumbnail(get_the_ID(), get_post_meta(get_post_meta( get_the_ID(), 'id_name_series', true ), '_thumbnail_id', true ) );
                          //set thumbnail to post by seriess id
                      wp_set_post_categories(get_the_ID(),get_post_meta(get_the_ID(),"id_cat_series",true),false );
                          //set release_years\\
                      $removetaxs=get_the_terms(get_the_ID(),'release_years');   
                      $taxs= get_the_terms(get_post_meta(get_the_ID(),"id_name_series",true),'release_years');
                      foreach($removetaxs as $tax){
                          wp_remove_object_terms(get_the_ID(),array($tax->term_id),"release_years");  
                          }
                          foreach($taxs as $tax){
                          wp_set_post_terms(get_the_ID(),array($tax->term_id),"release_years",true);  
                          }
                                  //set release_years\\
                                  
                                  //set genres\\
                          $removetaxs=get_the_terms(get_the_ID(),'genres');   
                                  $taxs= get_the_terms(get_post_meta(get_the_ID(),"id_name_series",true),'genres');
                      foreach($removetaxs as $tax){
                          wp_remove_object_terms(get_the_ID(),array($tax->term_id),"genres");  
                          }
                          foreach($taxs as $tax){
                          wp_set_post_terms(get_the_ID(),array($tax->term_id),"genres",true);  
                          }
                      //set genres\\
                }
            


             //edit episodes cat and genres and years
             if(get_post_type(get_the_ID(  ))=="seriess"){
                        $id_series_post=get_the_ID();
                    $categories = get_the_category();
                    $category_id_series = $categories[0]->cat_ID;
                    $my_query = new WP_Query(array("meta_value"=>get_the_ID(),"meta_key"=>"id_name_series","post_type"=>"episodes"));
                    
                      if($my_query->have_posts()){
                            while ($my_query->have_posts()) {
                                $my_query->the_post();
                            
                                $removecats=get_the_terms(get_the_ID(),'category'); 
                                //remove catageory
                                foreach($removecats as $cat){
                          wp_remove_object_terms(get_the_ID(),array($cat->term_id),"category");  
                        }
                    //remove catageory
                                
                      wp_set_post_categories(get_the_ID(),$category_id_series,true );
                                
                            //remove current then set release_years\\
                      $removetaxs=get_the_terms(get_the_ID(),'release_years');   
                      $settaxs= get_the_terms($id_series_post,'release_years');
                    foreach($removetaxs as $tax){
                          wp_remove_object_terms(get_the_ID(),array($tax->term_id),"release_years");  
                        }
                                
                        foreach($settaxs as $tax){
                          wp_set_post_terms(get_the_ID(),array($tax->term_id),"release_years",true);  
                        }
                                //remove current set release_years\\
                                
                                //remove current set genres\\
                              $removetaxs=get_the_terms(get_the_ID(),'genres');   
                      $settaxs= get_the_terms($id_series_post,'genres');
                    foreach($removetaxs as $tax){
                          wp_remove_object_terms(get_the_ID(),array($tax->term_id),"genres");  
                        }
                                
                        foreach($settaxs as $tax){
                          wp_set_post_terms(get_the_ID(),array($tax->term_id),"genres",true);  
                        }
                                //remove current set genres\\
                                
                            }
                        }
            }
            
            if(get_post_type(get_the_ID(  ))!="episodes"){
                    //add actors
                    $str_actors=get_post_meta(get_the_ID(),'actors_in',true);
                    $new_actors=explode(";",$str_actors);
                    if(get_post_meta(get_the_ID(),'actors_in',true)!=""){
                          
                    //remove all current actors
                      $remove_actors=get_the_terms(get_the_ID(),'actors');  
                            foreach($remove_actors as $actor){
                    wp_remove_object_terms(get_the_ID(),$actor->term_id,"actors");
                    }
                            //remove all current actors   
                          
                    for($x=0;$x<count($new_actors);$x++)  {
                    //if actor isnt exist 
                    if(!term_exists($new_actors[$x],'actors')){
                        wp_insert_term($new_actors[$x],'actors');//add current actor to actors taxonomy 
                        update_term_meta($new_actors[$x],"term_views_count",0);//set number of views=0
                    }


                      $term_id = term_exists($new_actors[$x]);  
                        wp_set_post_terms(get_the_ID(),$term_id,'actors',true);//add current actor to current post

                    $x++;

                    //$new_actors[$x]=>url actor
                    $term_id = term_exists($new_actors[$x-1]);
                    if(get_term_meta($term_id,"actor_image",true)!=$new_actors[$x])
                    update_term_meta($term_id,"actor_image",$new_actors[$x]);  ///------   append image to current actor   -----\\\
                      }}
              }
     endif;

}
 add_action("save_post","save_metabox_function_episode");

add_action( 'admin_head', 'cpt_icon');
function cpt_icon() { 
            ?>
            <script>
              window.onload=function(){
                let post_type="<?php  echo get_post_type(get_the_ID(  ));?>";
        if(post_type=="episodes"){
        document.querySelector(".serv240").value=document.querySelector(".rest_server240").value;
        document.querySelector(".serv360").value=document.querySelector(".rest_server360").value;
        document.querySelector(".serv480").value=document.querySelector(".rest_server480").value;
        document.querySelector(".serv720").value=document.querySelector(".rest_server720").value;
        document.querySelector(".serv1080").value=document.querySelector(".rest_server1080").value;
        document.querySelector(".serv1").value=document.querySelector(".res_serv1").value;
        document.querySelector(".serv2").value=document.querySelector(".res_serv2").value;
        document.querySelector(".serv3").value=document.querySelector(".res_serv3").value;
        document.querySelector(".serv4").value=document.querySelector(".res_serv4").value;
        document.querySelector(".serv5").value=document.querySelector(".res_serv5").value;
        document.querySelector(".serv6").value=document.querySelector(".res_serv6").value;
        document.querySelector(".serv7").value=document.querySelector(".res_serv7").value;
        document.querySelector(".serv8").value=document.querySelector(".res_serv8").value;
        document.querySelector(".serv9").value=document.querySelector(".res_serv9").value;
        document.querySelector(".serv10").value=document.querySelector(".res_serv10").value;
        document.querySelector(".id_name_series").value=document.querySelector(".rest_id_name_series").value;
        document.querySelector(".id_cat_series").value=document.querySelector(".rest_id_cat_series").value;
        
        //restor data from database\

        document.querySelector('.series_select_div span').addEventListener('click', function() {
            this.parentElement.querySelector("ul").classList.toggle("show");
        });

        document.querySelectorAll('.series_select_div ul li').forEach(function(li){
            li.addEventListener('click', function() {
            document.querySelector('.series_select_div input').value=this.innerText;
            document.querySelector(".id_name_series").value=this.getAttribute("data-id");
            document.querySelector(".id_cat_series").value=this.getAttribute("data-cat");
            document.querySelector('.series_select_div ul').classList.remove("show");
        });
        });

        document.querySelector('.series_select_div input').addEventListener('keyup', function() {
           let value_input=this.value.toLowerCase();
           console.log(value_input);
           document.querySelectorAll('.series_select_div ul li').forEach(function(li){
              if(!li.innerText.toLowerCase().includes(value_input))
                li.style.display="none";
                else
                li.style.display="block";
           });
        });

         //reset post name in slugdiv container to reset permalink
         document.querySelector("#post_name").value="";   
      }    

                     if(post_type!="seriess"){
                                document.querySelector(".tex_dataserver").addEventListener("change",function(){
                                var lines = document.querySelector('.tex_dataserver').value.split('\n');
                                for(var i = 0;i < lines.length;i++){
                                
                                    if(lines[i].includes("240p")){
                                    document.querySelector(".serv240").value=lines[i];
                                    }
                                    if(lines[i].includes("480p")){
                                    document.querySelector(".serv480").value=lines[i];
                                    }
                                    if(lines[i].includes("720p")){
                                    document.querySelector(".serv720").value=lines[i];
                                    }
                                    if(lines[i].includes("360p")){
                                    document.querySelector(".serv360").value=lines[i];
                                    }
                                    if(lines[i].includes("1080p")){
                                    document.querySelector(".serv1080").value=lines[i];
                                    }
                                    if(lines[i].includes("vedbom")){
                                    document.querySelector(".serv2").value=lines[i];
                                    }
                                    if(lines[i].includes("vidshar")||lines[i].includes("vedshare")){
                                            document.querySelector(".serv1").value=lines[i];
                                            }
                                    if(lines[i].includes("ok.ru")){
                                            document.querySelector(".serv3").value=lines[i];
                                            }
                                if(lines[i].includes("uqload")){
                                            document.querySelector(".serv7").value=lines[i];
                                            }
                                if(lines[i].includes("uptostream")){
                                            document.querySelector(".serv8").value=lines[i];
                                            }
                                if(lines[i].includes("playtube.ws")||lines[i].includes("vidcloud.co")){
                                            document.querySelector(".serv6").value=lines[i];
                                            }
                                if(lines[i].includes("dood.to")||lines[i].includes("thevid.live")){
                                            document.querySelector(".serv4").value=lines[i];
                                            }
                                    if(lines[i].includes("mystream")||lines[i].includes("ninjastream")){
                                            document.querySelector(".serv9").value=lines[i];
                                            }
                                    if(lines[i].includes("vidia.tv")||lines[i].includes("govid")){
                                            document.querySelector(".serv5").value=lines[i];
                                            }
                                            if(lines[i].includes("4shared")){
                                            document.querySelector(".serv10").value=lines[i];
                                            }
                                    
                                }

                                    })
                     }

                          }
                          

        </script>
        <?php
            
}




  
  function setPostViews() {
   
    $count = get_post_meta( get_the_ID(), 'post_views_count', true );
      if(!current_user_can("administrator")){
          $count++;
      }
      update_post_meta( get_the_ID(), 'post_views_count', $count );
  }
  
  function getTermViews($term_id) {
    if(!is_single()){
      if(get_term_meta( $term_id, 'term_views_count', true )==""){
        update_term_meta( $term_id, 'term_views_count', 0); 
   }
   
  $count = get_term_meta( $term_id, 'term_views_count', true );
   return $count;
    }
    
  }
  function setTermViews() {
    if(!current_user_can("administrator")){
    $count = get_term_meta( get_queried_object_id(), 'term_views_count', true );
          $count++;
      update_term_meta( get_queried_object_id(), 'term_views_count', $count );
    }
  }
  
  function public_filter($query){
    if(($query->is_main_query()) &&
     (is_front_page(  ))){
      $query->set("post_type",array("movies","episodes"));
    }
    if(($query->is_main_query()) &&
     (is_tax() || $query->is_search || is_category(  ))){
      $query->set("post_type",array("movies","seriess"));
    }
  }
 
  add_action("pre_get_posts","public_filter");
add_action("init","myfun");
function myfun(){
    add_filter( 'show_admin_bar', '__return_false' );
}
  
                ?>