<?php
/**
 * Template Name: Agenda Page
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
    <ul class="agenda_list">
      <?php $my_query = new WP_Query('showposts=-1&post_type=appointment&orderby=menu_order&order=ASC');?>
      <?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
        <li><a href="<?php echo get_post_meta($post->ID, 'agenda_url', true);?>"><?php the_title();?></a></li>
      <?php endwhile; endif; wp_reset_query(); ?>
    </ul>
  </article>
</div>
<?php get_footer(); ?>