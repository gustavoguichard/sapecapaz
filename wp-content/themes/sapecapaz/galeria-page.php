<?php
/**
 * Template Name: Galeria Page
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
    <section class="gallery">
      <h3>Álbuns de Fotos</h3>
      <?php query_posts(array($query_string, 'post_type'=>'album', 'showposts'=>2));?>
      <?php get_template_part( 'loop', 'albums' ); ?>
      <a href="<?php echo get_permalink_by_name("fotos");?>" class="button">Ver mais álbuns</a>
      <hr />
      <h3>Vídeos</h3>
      <?php query_posts(array($query_string, 'post_type'=>'video', 'showposts'=>2));?>
      <?php get_template_part( 'loop', 'videos' ); ?>
      <a href="<?php echo get_permalink_by_name("videos");?>" class="button">Ver mais vídeos</a>
    </section>
  </article>
</div>
<?php query_posts('pagename=galeria');?>
<?php get_footer(); ?>