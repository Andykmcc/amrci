<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title><?php wp_title( '|', true, 'right' ); ?></title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>      
    <![endif]-->

    <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php get_wpbs_theme_options(); ?>

    <!-- typeahead plugin - if top nav search bar enabled -->
    <?php require_once('library/typeahead.php'); ?>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">  

</head>
  
<body <?php body_class(); ?>>
    <!--facebook-->
    <div id="fb-root"></div>
    <script>
      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=164950143540443";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
    <!--end facebook-->  
    <header role="banner">
        <div class="container">
            <div class="row">
                <div class='col-xs-12 col-sm-3 col-md-3'>
                    <a class="navbar-brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
                        <?php if(of_get_option('navbar-branding_logo','')!='') { ?>
                            <img src="<?php echo of_get_option('navbar-branding_logo'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
                        <?php }
                            if(of_get_option('site_name','1')) bloginfo('name'); ?>
                    </a>
                </div>
                <div class='hidden-xs col-sm-9 col-md-9'>
                    
                    <img src="<?php bloginfo('template_directory'); ?>/images/header.png" class="img-responsive">
                    
                </div>
            </div>
            <div class='row'>
                <nav class="navbar navbar-default navbar-static-top" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">                      <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <div class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-9 col-lg-offset-3">
                            <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                        </div>
                    </div>
                </nav> <!-- end .navbar -->
            </div>
        </div>
    </header> <!-- end header -->
    <div class="container">