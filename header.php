<!DOCTYPE html>
<html lang="ar">
   
<head>
<meta name="title" content="<?php the_title();?>">
<meta name="description" 
content="<?php echo wp_title("|","true","right");?>">
<meta name="keywords" content="<?php echo wp_title("|","true","right");?>">
<link rel="image_src" href="<?php echo get_the_post_thumbnail_url();?>">
<meta property="og:url" content="<?php global $wp;echo home_url( $wp->request );?>">
<meta property="og:title" content="<?php the_title();?>">
<meta property="og:description" content="<?php echo wp_title("|","true","right");?>">
<meta property="og:image" content="<?php echo get_the_post_thumbnail_url();?>">
<meta property="og:image:width" content="347">
<meta property="og:image:height" content="520">

<script data-ad-client="ca-pub-1171642265138350" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<link rel="pingback" href="<?php bloginfo('pingback');?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_title("|","true","right");?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri().'/images/logo.png';?>" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(  )?>/css/main.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(  )?>/css/FAPRO5.css">
<script src="<?php echo get_template_directory_uri(  )?>/js/main.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(  )?>/css/video_style.css">
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-168003133-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-168003133-1');
</script>

<body>
    <div class="cover">
        
    </div>
    <div class="header container">
        <div class="Button_small_menu">
            <i class="far fa-bars"></i>
        </div>
        <div class="small_menu">
        <?php wp_nav_menu(array("container"=>false));?>
        </div>
        <div class="logo_menu">
            <div class="logo">
                <a title="مسلسلي" href="<?php echo get_home_url();?>"><h1>MUSALSALI</h1></a>
                </div>
    
            <div class="menu">
            <?php wp_nav_menu(array("container"=>false));?>
            </div>
            
        </div>
        
        <div class="search">
            <form action="<?php echo get_home_url();?>" method="GET">
               <input placeholder="ابحث عن اسم مسلسل او فيلم هنا..." name="s" type="text" class="field">
            <button type="submit">
            <i class="far fa-search"></i>
            </button>
            </form>
        </div>
    </div>
</body>
</html>
