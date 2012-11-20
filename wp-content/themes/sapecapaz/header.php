<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php wp_title( '', true);?></title>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<body <?php body_class(); ?>>
  <aside id="search-box">
    <div id="search-container">
      <form id="searchform" action="<?php bloginfo('url');?>" method="get">
        <input id="s" type="text" placeholder="Buscar" name="s">
      </form>
    </div>
    <a id="toggle-search" href="#search-container">Buscar</a>
  </aside>
  <header class="header">
    <div id="header">
      <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" id="logo" rel="home">
        <h1>
          <?php bloginfo( 'name' ); ?>
          <small><?php bloginfo( 'description' ); ?></small>
        </h1>
      </a>
      <?php wp_nav_menu( array( 'menu_id' => 'top_menu', 'theme_location' => 'top_menu', 'container' => 'nav') ); ?>
    </div>
  </header>