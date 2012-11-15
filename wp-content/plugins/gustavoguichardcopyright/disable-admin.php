<?php 
/*
  Plugin Name: Disable Admin Features Plugin
  Description: Tira tudo o que não vai ser usado pelo usuário logado
  Version: 0.1
  Author: Gustavo Guichard
  Author URI: http://gustavoguichard.com/
*/

/* COLOCAR CURRENT EM ITEM DE MENU DEPENDENDO DO TIPO DE POST */
function remove_parent($var)
{
	if ($var == 'current_page_parent' || $var == 'current-menu-item' || $var == 'current-page-ancestor') {
		return false;
	}
	return true;
}

function tg_add_class_to_menu($classes)
{
	if (is_single())
	{
		// we're viewing a custom post type, so remove the 'current-page' from all menu items.
		$classes = array_filter($classes, "remove_parent");
		if (in_array('menu-item-31', $classes)) $classes[] = 'current-menu-parent';
	} 
	return $classes;
}
if (!is_admin()) { add_filter('nav_menu_css_class', 'tg_add_class_to_menu'); }

function remove_dashboard_widgets(){
	global$wp_meta_boxes;
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
 
function remove_menu_items() {
	global $menu;
	$restricted = array(__('Links'), __('Painel'), __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
			unset($menu[key($menu)]);
		}
	}
}
 
add_action('admin_menu', 'remove_menu_items');

function remove_submenus() {
	global $submenu;
	//unset($submenu['index.php'][10]); // Removes 'Updates'.
	unset($submenu['themes.php'][5]); // Removes 'Themes'.
	unset($submenu['options-general.php'][15]); // Removes 'Writing'.
	unset($submenu['options-general.php'][25]); // Removes 'Discussion'.
	unset($submenu['plugins.php'][15]); // Editor de Plugins
	unset($submenu['tools.php'][5]); // Ferramentas Sub
}

add_action('admin_menu', 'remove_submenus');

/* REMOVER O EDITOR DO ADMIN */
function remove_editor_menu() {
	remove_action('admin_menu', '_add_themes_utility_last', 101);
}

add_action('_admin_menu', 'remove_editor_menu', 1);

function customize_meta_boxes() {
/* Removes meta boxes from Posts */
	remove_meta_box('postcustom','post','normal');
	remove_meta_box('trackbacksdiv','post','normal');
//   remove_meta_box('postexcerpt','post','normal');
	remove_meta_box('slugdiv','post','normal');
//   /* Removes meta boxes from pages */
	remove_meta_box('postcustom','page','normal');
	remove_meta_box('trackbacksdiv','page','normal');
	remove_meta_box('commentstatusdiv','page','normal');
	remove_meta_box('commentsdiv','page','normal'); 
	remove_meta_box('slugdiv','page','normal');
//   remove_meta_box('authordiv','page','normal');
}

add_action('admin_init','customize_meta_boxes');

/* MENU DE ACOES FAVORITAS */
function custom_favorite_actions($actions) {
	unset($actions['edit-comments.php']);
	return $actions;
}
add_filter('favorite_actions', 'custom_favorite_actions');

/* REMOVER LIXO DO HEAD */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/* GOOGLE ANALYTICS */
function add_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("' . get_option('google_analytics') . '");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

/* FAVICON AUTOMÁTICO */
function blog_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');
?>