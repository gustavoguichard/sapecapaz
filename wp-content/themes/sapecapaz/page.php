<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Sapeca Paz 1.0
 */

get_header(); ?>
<div id="main">
  <article class="post">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <h2><?php the_title();?></h2>
      <?php the_content();?>
    <?php endwhile; // end of the loop. ?>
  </article>
  <hr />
</div>
<?php get_footer(); ?>