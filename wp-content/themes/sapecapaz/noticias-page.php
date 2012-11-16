<?php
/**
 * Template Name: Notícias Page
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<div id="main">
  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
  <?php if($paged <= 1):?>
  <article class="hentry">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title();?></h2>
      <?php the_content();?>
    <?php endwhile; // end of the loop. ?>
  </article>
  <?php endif;?> 
  <?php query_posts(array($query_string, 'post_type'=>'news', 'paged'=>$paged, 'orderby'=>'menu_order', 'order'=>'ASC'));?>
  <?php get_template_part( 'loop', 'index' ); ?>
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
<?php query_posts('pagename=noticias');?>
<?php get_footer(); ?>