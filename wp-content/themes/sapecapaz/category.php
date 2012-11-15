<?php get_header(); ?>
<div id="main">
  <div class="page-title">
    <h3>Artigos em <?php echo single_tag_title();?></h3>
  </div>
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