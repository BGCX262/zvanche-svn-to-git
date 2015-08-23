<!DOCTYPE HTML>
<html>
    <head>
        <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />                
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/mootools-release-1.11.js"></script>
        <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/dropDownMenu.js"></script>
        <!--[if IE 7]><style>#dropdownMenu li ul ul {margin-left: 100px;}</style><![endif]-->
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        
        <?php wp_head(); ?>

    </head>
    <body>
        <div id="container">
            <div id="wrapper">
                <div id="top">                    
                    <ul class="login">
                        <li class="left">&nbsp;</li>
                        <li>Добре дошли на страницата на</li>                        
                        <li><a href="http://www.free-css.com/">ЦДГ №39 "Звънче"!</a></li>                      
                    </ul>
                </div>

                <ul id="nav">
                    <li class="left">&nbsp;</li>
                    <?php
                    wp_nav_menu(array(
                        "container" => false,
                        "menu_id" => "nav",
                        "menu_class" => "",
                        'items_wrap' => '%3$s'
                    ));
                    ?>                                            
                    <li class="sep">&nbsp;</li>
                    <li class="right">&nbsp;</li>
                </ul>

                <div id="header">                    
                    <div class="intro">
                        <a href="<?php echo get_settings('home'); ?>">
                            <?php getImage("/logo.jpg", "", "alignleft", "")?>
                        </a>
                        <h2>Целодневна Детска Градина №39</h2>
                        <h1>"Звънче", гр. Варна</h1>                        
                        <?php get_search_form(); ?>
                    </div>
                </div>
                

