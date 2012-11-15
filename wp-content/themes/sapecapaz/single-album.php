<?php get_header(); ?>
<div id="main">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h2 class="entry-title"><?php the_title(); ?></h2>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <hr />
    <footer>
      <span class="category-show">
        <a href="<?php echo get_permalink_by_name("fotos");?>">Voltar aos álbums</a>
      </span>
    </footer>
  </article>
<?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>