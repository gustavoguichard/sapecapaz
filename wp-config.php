<?php
/** 
 * A configuração de base do WordPress
 *
 * Este ficheiro define os seguintes parâmetros: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, e ABSPATH. Pode obter mais informação
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} no Codex. As definições de MySQL são-lhe fornecidas pelo seu serviço de alojamento.
 *
 * Este ficheiro é usado para criar o script  wp-config.php, durante
 * a instalação, mas não tem que usar essa funcionalidade se não quiser. 
 * Salve este ficheiro como "wp-config.php" e preencha os valores.
 *
 * @package WordPress
 */

// ** Definições de MySQL - obtenha estes dados do seu serviço de alojamento** //
/** O nome da base de dados do WordPress */
define('DB_NAME', 'sapecapaz');

/** O nome do utilizador de MySQL */
define('DB_USER', 'root');

/** A password do utilizador de MySQL  */
define('DB_PASSWORD', 'root');

/** O nome do serviddor de  MySQL  */
define('DB_HOST', 'localhost:8889');

/** O "Database Charset" a usar na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O "Database Collate type". Se tem dúvidas não mude. */
define('DB_COLLATE', '');

/**#@+
 * Chaves Únicas de Autenticação.
 *
 * Mude para frases únicas e diferentes!
 * Pode gerar frases automáticamente em {@link https://api.wordpress.org/secret-key/1.1/salt/ Serviço de chaves secretas de WordPress.org}
 * Pode mudar estes valores em qualquer altura para invalidar todos os cookies existentes o que terá como resultado obrigar todos os utilizadores a voltarem a fazer login
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'NCI`/-=Po8.2X{#[+1f$T:ikb6%yvvG5!j,wo%#K+Y+6gfPa@Sod_7B|&s@:5=<q');
define('SECURE_AUTH_KEY',  'r]~7hTeo]~qdYU$n90KSRR&`8SV,u+%E=U&_+U< [+eMZtmLRU%/zv7h_ (e@1z3');
define('LOGGED_IN_KEY',    '`x-:p2!:Pjt*e_M77pPy5f(RNOa fCV7 bnq<qKYehne__dlyf13*32R+(Ipdfe ');
define('NONCE_KEY',        '_n!&G:+M<.k[+2J/Ur{2SH.W e8!J7{xyt=]9(=Vc^kVJrD*7hh5HP^}cuU:)rSU');
define('AUTH_SALT',        'a|P_G}u/UqzRnZ?|ut1s-eAra#mO0{1cmV*x)vDZxE_WCS.&DR5`P*ci`+/1?NZc');
define('SECURE_AUTH_SALT', 'pP{DO}o3^($w/1g-u5!POqJmOGICRhj$&b>5(oW]u]$B0miW {r<?3g0j6[! ,Yx');
define('LOGGED_IN_SALT',   '{KXP(t$Rb AK-(ElC/%kso=x4m(v-q3[`c6Zw,RfnQ`P-4_]Qf/6G*/CiX%Ynr^%');
define('NONCE_SALT',       '/ietmfZyH~^JOpX_]3LO;wCJD%Y_1ln.UxVEBmlH4EeR>0^M_My(1oYi@bd]/;Ff');

/**#@-*/

/**
 * Prefixo das tabelas de WordPress.
 *
 * Pode suportar múltiplas instalações numa só base de dados, ao dar a cada
 * instalação um prefixo único. Só algarismos, letras e underscores, por favor!
 */
$table_prefix  = 'wp_';

/**
 * Idioma de Localização do WordPress, Inglês por omissão.
 *
 * Mude isto para localizar o WordPress. Um ficheiro MO correspondendo ao idioma
 * escolhido deverá existir na directoria wp-content/languages. Instale por exemplo
 * pt_PT.mo em wp-content/languages e defina WPLANG como 'pt_PT' para activar o
 * suporte para a língua portuguesa.
 */
define ('WPLANG', 'pt_PT');

/**
 * Para developers: WordPress em modo debugging.
 *
 * Mude isto para true para mostrar avisos enquanto estiver a testar.
 * É vivamente recomendado aos autores de temas e plugins usarem WP_DEBUG
 * no seu ambiente de desenvolvimento.
 */
define('WP_DEBUG', false);

/* E é tudo. Pare de editar! Bom blogging!. */

/** Caminho absoluto para a pasta do WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Define as variáveis do WordPress e ficheiros a incluir. */
require_once(ABSPATH . 'wp-settings.php');
