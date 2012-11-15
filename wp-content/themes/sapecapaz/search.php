<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<div id="main">
	<div class="page-title">
    <h3>Resultados da busca por: <?php echo get_search_query(); ?></h3>
  </div>
  <?php if ( have_posts() ) : ?>
	<?php get_template_part( 'loop', 'search' ); ?>
	<?php else : ?>
	<article class="post e404">
		<h4>Nada encontrado</h4>
		<p>Desculpe, mas nada pode ser encontrado. Talvez uma nova busca possa retornar algum resultado...</p>
	</article>
	<?php endif; ?>
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
<?php get_footer(); ?>