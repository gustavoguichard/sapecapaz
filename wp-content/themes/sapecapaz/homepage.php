<?php
/**
 * Template Name: Homepage Page
 *
 * @package WordPress
 * @subpackage Espaço Jaya
 * @since Gustavo Guichard 2012
 */

get_header(); ?>
<?php disable_past_events();?> 
<section id="banner">
  <article class="banner_content">
    <h1 class="banner_call_out">
    	<?php echo nl2br(get_option("banner_text"));?>
    </h1>
    <a href="<?php echo get_option("banner_link_url");?>" class="click_flag"><?php echo get_option("banner_link");?></a>
    <img src="<?php echo get_bloginfo('template_directory'); ?>/images/balloon.png" id="balloon_img" alt="Balloon" />
  </article>
  <aside id="clouds"></aside>
</section>
<aside id="site_overview">
  <section class="overview_content">
    <?php $page_names = array("Quem somos", "O que propomos", "Notícias sapecas", "Agenda");?> 
    <?php foreach($page_names as $name):?>
    <article class="post_overview">
      <?php $post = get_page_by_title($name);?>
      <?php setup_postdata($post);?> 
      <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
      <?php if($name == "Notícias sapecas"):?>
        <?php $my_query = new WP_Query('showposts=1&post_type=news&orderby=menu_order&order=ASC'); ?>  
        <?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
          <a href="<?php the_permalink();?>">
          <?php if(has_post_thumbnail()):?> 
            <?php the_post_thumbnail();?> 
          <?php endif;?>
          </a>
          <?php the_excerpt();?>
        <?php endwhile; endif; wp_reset_query(); ?> 
      <?php elseif($name == "Agenda"):?>
        <ul class="agenda_list">
        <?php $my_query = new WP_Query('showposts=6&post_type=appointment&orderby=menu_order&order=ASC');?>
        <?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
          <li><a href="<?php echo get_post_meta($post->ID, 'agenda_url', true);?>"><?php the_title();?></a></li>
        <?php endwhile; endif; wp_reset_query(); ?> 
        </ul>
      <?php else:?>
        <a href="<?php the_permalink();?>">
        <?php if(has_post_thumbnail()):?> 
          <?php the_post_thumbnail();?> 
        <?php endif;?>
        </a>
        <?php the_excerpt();?>
      <?php endif;?> 
    </article>
    <?php endforeach;?>
  </section>
</aside>
<div id="main">
  <article id="poem">
  	<?php $my_query = new WP_Query('showposts=1&post_type=poema&orderby=rand'); ?>
		<?php if($my_query->have_posts()) : ?><?php while($my_query->have_posts()) : $my_query->the_post(); ?>
    <blockquote>
      <?php the_content(); ?>
      <footer>
        <cite>
          <?php the_title();?>	
        </cite>
      </footer>
    </blockquote>
		<?php endwhile; endif; wp_reset_query(); ?>	
  </article>
</div>
<?php get_footer(); ?>