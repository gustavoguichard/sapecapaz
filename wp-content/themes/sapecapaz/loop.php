<?php if ( ! have_posts() ) : ?>
	<article class="post e404">
		<h2>Nada encontrado</h2>
		<p>Desculpe, mas nenhum artigo pode ser encontrado. Talvez uma busca possa ajudar...</p>
	</article>
<?php endif; ?>
<?php $i = 0;?>	
<?php while ( have_posts() ) : the_post(); ?>
	<?php $post_type = get_post_type($post);?>
	
	<!-- QUANDO FOR PAGINAS, POSTS e NOTICIAS -->
	<?php if($post_type == 'post' || $post_type == 'news'):?>	
	<article <?php post_class(); ?>>
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<span class="category-show">
				<?php the_time('l, j \d\e F \d\e Y');?>
				<?php $category_list = get_the_category_list( ', ' ); ?>
				<?php if ( $category_list ): ?>
					 | Categoria: <?=$category_list;?>
				<?php endif; ?>
			</span>
		</header>
		<div class="entry-content">
			<?php if(has_post_thumbnail($post->ID)):?><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('big-thumb');?></a><?php endif;?>
			<?php the_excerpt(); ?>
		</div>
		<hr />
	</article>

	<!-- QUANDO FOR SERVICOS -->
	<?php elseif($post_type == 'services' || $post_type == 'events'):?>
	<article <?php post_class('service_item'); ?>>
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<?php if(has_post_thumbnail($post->ID)):?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail();?></a>
			<?php endif;?>
			<?php the_excerpt(); ?>
		</div>
		<hr />
	</article>
	<!-- QUANDO FOR PÁGINAS -->
	<?php elseif($post_type == 'page'):?>
	<article <?php post_class('page_item'); ?>>
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<?php if(has_post_thumbnail($post->ID)):?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail();?></a>
			<?php endif;?>
			<?php the_excerpt(); ?>
		</div>
		<hr />
	</article>
	<!-- QUANDO FOR VÍDEOS -->
	<?php elseif($post_type == 'video'):?>
	<article class="video_item">
		<?php $video_host = get_post_meta($post->ID, 'video_host', true);?>
		<?php $video_url = get_post_meta($post->ID, 'video_url', true);?>
		<?php $youtube = false;?>
		<?php if($video_host == "Youtube") $youtube = true;?>
		<?php $video_id = get_video_ID($video_url, $youtube)?>
		<?php if($youtube):?>
			<iframe width="251" height="170" src="http://www.youtube.com/embed/<?=$video_id;?>?wmode=transparent" frameborder="0" allowfullscreen></iframe>
			<header>
				<h2 class="entry-title"><?php the_title();?></h2>
			</header>
		<?php else:?>
			<iframe src="http://player.vimeo.com/video/<?=$video_id;?>?title=0&amp;byline=0" width="300" height="169" frameborder="0"></iframe>
			<header>
				<h2 class="entry-title"><?php the_title();?></h2>
			</header>
		<?php endif;?>
	</article>
	<?php elseif($post_type == 'album'):?>
	<article class="album_item">
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</header>
		<div class="entry-content">
			<?php if(has_post_thumbnail($post->ID)):?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('album-thumb');?></a>
			<?php endif;?>
			<?php the_excerpt(); ?>
		</div>
	</article>
	<?php endif;?>
<?php $i++;?>	
<?php endwhile; // End the loop. Whew. ?>