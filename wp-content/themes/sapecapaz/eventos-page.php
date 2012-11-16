<?php
/**
 * Template Name: Eventos Page
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<div id="main">
  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
  <?php $posts_per_page = 5;?> 
  <?php $offset = $posts_per_page*($paged-1);?> 
  <?php if($paged <= 1):?>
  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article class="hentry">
    <h2><?php the_title();?></h2>
    <?php the_content();?>
    <hr />
  </article>
  <?php endwhile; // end of the loop. ?>
  <?php endif;?> 
  <?php query_posts(array($query_string, 'post_type'=>'events', 'posts_per_page'=>$posts_per_page, 'offset'=>$offset, 'orderby'=>'menu_order', 'order'=>'ASC'));?>
  <?php get_template_part( 'loop', 'events' ); ?>
  <aside class="pagination">
    <?php if(get_next_posts_link()):?>
    <div id="prev_post">
      <?php next_posts_link('Antigos');?>
    </div>
    <?php endif;?>
    <?php if(get_previous_posts_link()):?>
    <div id="next_post">
      <?php previous_posts_link('Novos');?>
    </div>
    <?php endif;?>
  </aside>
</div>
<?php query_posts('pagename=eventos');?>
<?php get_footer(); ?>