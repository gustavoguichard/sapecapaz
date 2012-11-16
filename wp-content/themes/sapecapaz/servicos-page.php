<?php
/**
 * Template Name: Serviços Page
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<div id="main">
  <article class="hentry">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title();?></h2>
      <?php the_content();?>
    <?php endwhile; // end of the loop. ?>
    <hr />
  </article>
  <?php query_posts(array($query_string, 'post_type'=>'services', 'showposts'=>-1, 'orderby'=>'menu_order', 'order'=>'ASC'));?>
  <?php get_template_part( 'loop', 'services' ); ?>
</div>
<?php query_posts('pagename=servicos');?>
<?php get_footer(); ?>