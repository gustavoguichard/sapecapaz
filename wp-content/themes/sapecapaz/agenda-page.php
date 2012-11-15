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
  <article class="post">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title();?></h2>
      <?php the_content();?>
    <?php endwhile; // end of the loop. ?>
  </article>

  <?php $i = 0;?>
  <?php $my_query = new WP_Query('showposts=-1&post_type=evento&orderby=menu_order&order=ASC'); ?>  
  <?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
  <?php if($i == 0){ echo "<div class=\"clear\"></div>"; }; ?>
  <div class="grid_4 post toggle-container">
    <h3><?php $link = get_post_meta($post->ID, 'evento_link', true); if($link): ?><a href="<?=$link?>"><?php the_title();?></a><?php else: ?><?php the_title();?><?php endif;?></h3>
    <?php the_content();?>
    <p><strong><?php echo get_post_meta($post->ID, 'evento_data', true);?></strong></p>
  </div><!--//grid_4-->
  <?php if($i < 2){$i++;} else {$i = 0;};?>
  <?php endwhile; endif; wp_reset_query(); ?>  

</div>
<?php get_footer(); ?>