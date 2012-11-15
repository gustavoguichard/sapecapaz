<?php get_header(); ?>
<div id="main">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header>
		<div class="entry-content">
			<?php if(has_post_thumbnail($post->ID)):?><?php the_post_thumbnail('big-thumb');?><?php endif;?>
			<?php the_content(); ?>
		</div>
		<hr />
		<footer>
			<span class="category-show">
				<?php the_time('l, j \d\e F \d\e Y');?>
				<?php $category_list = get_the_category_list( ', ' ); ?>
				<?php if ( $category_list ): ?>
					 | Categoria: <?=$category_list;?>
				<?php endif; ?>
			</span>
		</footer>
	</article>
<?php endwhile; // end of the loop. ?>
</div>
<?php get_footer(); ?>