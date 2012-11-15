<?php 
/*
  Plugin Name: Gustavo Guichard Cria Copyright
  Description: Mostra informações de copyright no Dashboard
  Version: 0.1
  Author: Gustavo Guichard
  Author URI: http://gustavoguichard.com/
*/


function modify_footer_admin () {
	echo 'Criado por <a href="http://gustavoguichard.com">Gustavo Guichard</a>.';
	echo ' Suportado por <a href="http://WordPress.org">WordPress</a>.';
}

add_filter('admin_footer_text', 'modify_footer_admin');


/* LOGOTIPO DO AMIN */

function custom_logo() {
  echo '<style type="text/css">
    #header-logo { background-image: url(http://www.pinaculo.com.br/favicon.ico) !important; height: 30px !important; width: 17px !important; position: relative; margin-top: 1px !important; }
    </style>';
}

add_action('admin_head', 'custom_logo');

?>