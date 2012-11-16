<?php
/**
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Sapeca Paz 1.0
 */

add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):

function twentyten_setup() {
  add_editor_style();
  add_post_type_support('page', 'excerpt');
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 220, 130, true );
  add_image_size('big-thumb', 778, 222, true);
  add_image_size('album-thumb', 370, 250, true);
  // Add default posts and comments RSS feed links to head
  add_theme_support( 'automatic-feed-links' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'top_menu' => __( 'Main Navigation', 'twentyten' ),
    'bottom_menu' => __( 'Footer Navigation', 'twentyten' )
  ) );

}
endif;

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
  if(is_front_page()) return 19;
  else return 50;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

function twentyten_continue_reading_link() {
  return ' <p><a href="'. get_permalink() . '" class="more_content">Saiba mais...</a>';
}

function twentyten_auto_excerpt_more( $more ) {
  if(is_home() || is_search()) return '&hellip;';
  else return '&hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

function twentyten_custom_excerpt_more( $output ) {
  if ( has_excerpt() && ! is_attachment() ) {
    $output .= twentyten_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );


function twentyten_remove_gallery_css( $css ) {
  return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'twentyten_remove_gallery_css' );


/* CUSTOM POST TYPES */
add_action('init', 'my_cpt_init');
function my_cpt_init() 
{
/* POEMAS */
  $labelsPoemas = array(
    'name' => 'Poemas',
    'singular_name' => 'Poema',
    'add_new' => 'Novo Poema',
    'add_new_item' => 'Adicionar novo Poema',
    'edit_item' => 'Editar Poema',
    'new_item' => 'Novo Poema',
    'view_item' => 'Ver Poema',
    'search_items' => 'Procurar Poemas',
    'menu_name' => 'Poemas'

  );
  $argsPoemas = array(
    'labels' => $labelsPoemas,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/poema.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor')
  );
/* NOTÍCIAS */
  $labelsNews = array(
    'name' => 'Notícias',
    'singular_name' => 'Notícia',
    'add_new' => 'Nova Notícia',
    'add_new_item' => 'Adicionar nova Notícia',
    'edit_item' => 'Editar Notícia',
    'new_item' => 'Nova Notícia',
    'view_item' => 'Ver Notícia',
    'search_items' => 'Procurar Notícias',
    'menu_name' => 'Notícias'

  );
  $argsNews = array(
    'labels' => $labelsNews,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => false,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/noticia.png',
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'noticia', 'with_front' => true),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor','excerpt','thumbnail')
  );
/* AGENDA */
  $labelsAgenda = array(
    'name' => 'Item da Agenda',
    'singular_name' => 'Item da Agenda',
    'add_new' => 'Novo Item da Agenda',
    'add_new_item' => 'Adicionar novo Item da Agenda',
    'edit_item' => 'Editar Item da Agenda',
    'new_item' => 'Novo Item da Agenda',
    'view_item' => 'Ver Item da Agenda',
    'search_items' => 'Procurar Item da Agendas',
    'menu_name' => 'Agenda'

  );
  $argsAgenda = array(
    'labels' => $labelsAgenda,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 8,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/agenda.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => false,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title')
  );
/* ALBUNS */
  $labelsAlbum = array(
    'name' => 'Álbums',
    'singular_name' => 'Álbum',
    'add_new' => 'Novo Álbum',
    'add_new_item' => 'Adicionar novo Álbum',
    'edit_item' => 'Editar Álbum',
    'new_item' => 'Novo Álbum',
    'view_item' => 'Ver Álbum',
    'search_items' => 'Procurar Álbum',
    'menu_name' => 'Álbums'

  );
  $argsAlbum = array(
    'labels' => $labelsAlbum,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 6,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/album.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'album', 'with_front' => false),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title', 'editor','thumbnail')
  );
/* VÍDEOS */
  $labelsVideo = array(
    'name' => 'Vídeos',
    'singular_name' => 'Vídeo',
    'add_new' => 'Novo Vídeo',
    'add_new_item' => 'Adicionar novo Vídeo',
    'edit_item' => 'Editar Vídeo',
    'new_item' => 'Novo Vídeo',
    'view_item' => 'Ver Vídeo',
    'search_items' => 'Procurar Vídeos',
    'menu_name' => 'Vídeos'

  );
  $argsVideo = array(
    'labels' => $labelsVideo,
    'public' => true,
    'publicly_queryable' => false,
    'show_ui' => true,
    'exclude_from_search' => true,
    'menu_position' => 7,
    'menu_icon' => get_bloginfo('url') . '/wp-admin/images/media-button-video.gif',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'video', 'with_front' => false),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title')
  );
  
/* SERVICOS */
  $labelsServicos = array(
    'name' => 'Serviços',
    'singular_name' => 'Serviço',
    'add_new' => 'Novo Serviço',
    'add_new_item' => 'Adicionar novo Serviço',
    'edit_item' => 'Editar Serviço',
    'new_item' => 'Novo Serviço',
    'view_item' => 'Ver Serviço',
    'search_items' => 'Procurar Serviços',
    'menu_name' => 'Serviços'

  );
  $argsServicos = array(
    'labels' => $labelsServicos,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => false,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/servico.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'servico'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor','thumbnail', 'excerpt')
  );
/* EVENTOS */
  $labelsEventos = array(
    'name' => 'Eventos',
    'singular_name' => 'Evento',
    'add_new' => 'Novo Evento',
    'add_new_item' => 'Adicionar novo Evento',
    'edit_item' => 'Editar Evento',
    'new_item' => 'Novo Evento',
    'view_item' => 'Ver Evento',
    'search_items' => 'Procurar Eventos',
    'menu_name' => 'Eventos'

  );
  $argsEventos = array(
    'labels' => $labelsEventos,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'exclude_from_search' => false,
    'menu_position' => 5,
    'menu_icon' => get_bloginfo('template_url') . '/images/icons/evento.png',
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array('slug' => 'evento'),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'supports' => array('title','editor','thumbnail', 'excerpt')
  );
  register_post_type('services', $argsServicos);
  register_post_type('poema',$argsPoemas);
  register_post_type('news',$argsNews);
  register_post_type('events',$argsEventos);
  register_post_type('album',$argsAlbum);
  register_post_type('video',$argsVideo);
  register_post_type('appointment',$argsAgenda);

  // flush_rewrite_rules();
}

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Artigos';
    $menu[5][4] = 'open-if-no-js menu-top';
    $menu[5][6] = get_bloginfo('template_directory') . '/images/icons/artigo.png';
    $submenu['edit.php'][5][0] = 'Artigos';
    $submenu['edit.php'][10][0] = 'Novo Artigo';
    echo '';
}

function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Artigos';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


// ADDS A THEME OPTIONS PAGE
add_action('admin_menu', 'add_gcf_interface');
function add_gcf_interface() {
    add_menu_page('Opções Sapecas', 'Sapeca', 'manage_options',  
    'sapeca_settings_page', 'editglobalcustomfields', get_bloginfo('wpurl').'/favicon.ico', 1);
}

function editglobalcustomfields() {
  if (!current_user_can('manage_options')) {  
        wp_die('You do not have sufficient permissions to access this page.');  
    }
    if (isset($_GET["settings-updated"])) {?>
        <div id="message" class="updated" style="padding:10px;margin-top:20px;width:90%;">Alterações salvas</div>
    <?php };?>
    <div class="wrap">
    <?php screen_icon('tools'); ?><h2>Configurações Sapecas</h2>  
    <form method="post" action="options.php">
    <?php wp_nonce_field('update-options') ?>
  <p><strong>Texto do Banner de introdução:</strong></p>
  <p>
    <textarea name="banner_text" cols="40" rows="8" id="banner_text"><?php echo get_option('banner_text');?></textarea>
  </p>
  <p><strong>Texto do link no banner</strong></p>
  <p>
    <input type="text" name="banner_link" id="banner_link" value="<?php echo get_option('banner_link');?>" />
  </p>
  <p><strong>URL do Link no banner</strong></p>
  <p>
    <input type="text" name="banner_link_url" id="banner_link_url" value="<?php echo get_option('banner_link_url');?>" />
  </p>
  <hr />
  <p><strong>Código do Google Analytics:</strong></p>
  <p>
    <input type="text" name="google_analytics" id="google_analytics" value="<?php echo get_option('google_analytics');?>" />
  </p>
  <p><input type="submit" name="Submit" value="Salvar Alterações" /></p>
  
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="google_analytics,banner_text,banner_link,banner_link_url" />

  </form>
  </div>
  <?php
}

function get_video_ID ($url, $youtube) {
  if($youtube) $url = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
  else $url = preg_match("([0-9]{1,10})", $url, $matches);
  return $matches[0];
}

function get_permalink_by_name($page_name)
{
  global $post;
  global $wpdb;
  $pageid_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."'");
  return get_permalink($pageid_name);
}

function disable_past_events()
{
  global $wpdb;
  $server_time = date('mdy');
  $result = $wpdb->get_results("SELECT * FROM wp_posts WHERE post_type = 'appointment' AND post_status = 'publish'");
  if(!empty($result)) foreach ($result as $post){
      $expiration = get_post_meta($post->ID, 'agenda_expires', true);
      $seconds_between = strtotime($expiration)-time();
      if($seconds_between < 0){
        $post->post_status = 'draft';
        wp_update_post($post);
      }
  }
}

?>