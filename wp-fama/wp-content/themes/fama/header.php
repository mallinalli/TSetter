<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <?php if( is_single() ){ ?>
          <title><?php wp_title(''); ?> | <?php echo get_bloginfo('name'); ?></title>
          <meta name="description" content="<?php wp_title(''); ?>">
          <?php
            if( has_post_thumbnail() ) {
              $thumbnail_id = get_post_thumbnail_id($post->ID);
              $thumbnail_details = wp_get_attachment($thumbnail_id); 
              $thumbnail_src_display = wp_get_attachment_image_src( $thumbnail_id, 'nota-large' );
            }
          ?>
          <meta name="og:image" content="<?php echo $thumbnail_src_display[0]; ?>">
        <?php }else{ ?>
          <title><?php echo get_bloginfo('name'); ?></title>
          <meta name="description" content="Micrositio para el Mundial Brasil 2014, por Tribuna Comunicación&reg;">
          <meta name="og:image" content="<?php echo get_template_directory_uri(); ?>/img/logo.jpg">
        <?php } ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="pragma" content="no-cache" />
        <meta name="keywords" content="Brasil, Mundial, Futbol, Soccer, México, Selección, Periódico Digital, Tribuna Comunicación">

        <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" sizes="32x32" type="image/png">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
    </head>
    <body>
      <?php
        /*Ifs para banners*/

        /*if ( is_home() ) {
          echo '<span style="color:#ECEFEF;">h</span>';
        }
        if ( is_single() ) {
          echo '<span style="color:#ECEFEF;">n</span>';
        }
        if ( is_page() ) {
          echo '<span style="color:#ECEFEF;">s</span>';
        }*/
        
      ?>
        <!--[if lt IE 9]>
            <p class="chromeframe"><h2 style="background-color: #FF5050; color: #fff; padding: 5px 0;">Estás utilizando un navegador <strong>desactualizado</strong>. <a href="http://browsehappy.com/" style="color: #6699FF;">Actualiza tu navegador</h2></a></p>
        <![endif]-->
      <header class="main-header">
        
        <!--div class="upper-bar clearfix">
          <div class="estaciones">
            <span>Escúchanos:</span>
            <ul>
              <li>
                
                <a href="javascript: void(0)" onclick="popStation('exa');"><img src="<?php echo get_template_directory_uri(); ?>/img/logos/logo_exa.png" alt="Escucha EXA"></a>
                <a href="javascript: void(0)" onclick="popStation('lamejor')"><img src="<?php echo get_template_directory_uri(); ?>/img/logos/logo_lamejor.png" alt="Escucha La Mejor"></a>
              </li>
            </ul>
          </div>
        </div-->
        <div class="contenedor logo">
          <a href="<?php echo home_url(); ?>"></a>
        </div>
        <div class="contenedor menu">
          <div class="navhead clearfix">
            <div class="menubutton">
              <a href="#"><i class="icon-reorder"></i>&nbsp;</a>
            </div> 
          </div>
          <!-- <ul class="navegacion">
            <li><a href="<?php  home_url(); ?>">Inicio</a></li>
            <li><a href="<?php  home_url(); ?>/futbol">On Air</a></li>
            <li><a href="<?php  home_url(); ?>/beisbol">Lanzamientos</a></li>
            <li><a href="<?php  home_url(); ?>/local">Reconexión</a></li>
            <li class="spacer"></li>
            <li><a href="<?php  home_url(); ?>/local">Conciertos</a></li>
            <li><a href="<?php  home_url(); ?>/local">Cine</a></li>
            <li><a href="<?php  home_url(); ?>/local">Famosos</a></li>
            <li><a href="<?php  home_url(); ?>/otros-deportes">Moda</a></li>
            <li><a href="<?php  home_url(); ?>/calendario">Belleza</a></li>
          </ul> -->
          <?php
            
            $menu_name = 'header-menu';

            if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {

              $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
              $menu_items = wp_get_nav_menu_items($menu->term_id);
              $menu_list = '<ul id="menu-' . $menu_name . '" class="navegacion" >';
              $conti = 0;

              foreach ( (array) $menu_items as $key => $menu_item ) {

                if ( $conti == '4' OR $conti == '9' OR $conti == '14' ) {
                  $menu_list .= '<li class="spacer"></li>';
                }

                $title = $menu_item->title;
                $url = $menu_item->url;
                $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';

                $conti++;

              }
              $menu_list .= '</ul>';

            } else {
              
              $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';

            }

            echo $menu_list;
          ?>
        </div>
      </header>
      <div class="contenedor clearfix">
