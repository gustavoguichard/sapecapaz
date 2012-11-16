<?php get_header(); ?>
<div id="main">
  <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
  <?php $posts_per_page = 3;?> 
  <?php $offset = $posts_per_page*($paged-1);?> 
  <?php if($paged <= 1):?>
  <article class="hentry">
    <?php $post = get_page_by_title("Artigos sapecas");?>
    <?php setup_postdata($post);?> 
    <h3><?php the_title();?></h3>
    <?php the_content();?>
    <hr />
  </article>
  <?php endif;?> 
  <?php query_posts(array($query_string, 'posts_per_page'=>$posts_per_page, 'offset'=>$offset, 'orderby'=>'menu_order', 'order'=>'ASC'));?>
  
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
<?php get_footer(); ?>