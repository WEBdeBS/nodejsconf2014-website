<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * di creazione di wp-config.php. Non è necessario utilizzarlo solo via
 * web,è anche possibile copiare questo file in "wp-config.php" e
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Sto simulando gli environments di Rails ** // 
require_once dirname( __FILE__ ) . '/lib/spyc/spyc.php';
$database = spyc_load_file(dirname( __FILE__ ) . '/database.yml');
 
if ( file_exists( dirname( __FILE__ ) . '/env_local' ) ) {	 	
	define('WP_ENV', 'local');
	
} elseif ( file_exists( dirname( __FILE__ ) . '/env_demo' ) ) {
	define('WP_ENV', 'demo');

} elseif ( file_exists( dirname( __FILE__ ) . '/env_production' ) ) {
	define('WP_ENV', 'production');

} elseif ( file_exists( dirname( __FILE__ ) . '/env_stage' ) ) {
	define('WP_ENV', 'stage');

} else {
	define('WP_ENV', 'local');
}

$settings = $database[constant("WP_ENV")];

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', $settings['database']);

/** Nome utente del database MySQL */
define('DB_USER', $settings['username']);

/** Password del database MySQL */
define('DB_PASSWORD', $settings['password']);

/** Hostname MySQL  */
define('DB_HOST', $settings['host']);

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/** temporaneo **/
// define('WP_SITEURL', 'http://192.168.178.6/');


/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 * E' possibile cambiare queste chiavi in qualsiasi momento, per invalidare tuttii cookie esistenti. Ciò forzerà tutti gli utenti ad effettuare nuovamente il login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nEn^&[BpFya{cA{j%!k3|):HS*fr?3rx7>m,pH0t]B21v$r$vR=*z@vMEfxm2xy ');
define('SECURE_AUTH_KEY',  'pg)SD?dYY$]nFrm&LN;OhQ>^W>i~^z.Q xQyPd;3xSKB#bk9XCmQhWlC6V:IDY9a');
define('LOGGED_IN_KEY',    'qJeZ$a]$@Tqa`y8bGkY_.rN Ah4#fb5DjW4Lh<PVD5ItRUmiyI46gd!sME_O7DCM');
define('NONCE_KEY',        '&I>n&7?b<7JB fO^6}5KnMGDk+C1zj&U61:cNI*XGwkt[&67BiHjCXrVFgtR39nh');
define('AUTH_SALT',        'NL%oF5N7 3@)N<4AY0Yj5]:|blA fJseeJ MPu}5cBv3Mds!ocu=e%Tdi9~,~zLD');
define('SECURE_AUTH_SALT', 'wh}TYOHtxd)H1Up6a*x;B3/7|4=EHZH%)RtX=G],#5F(o)F{$UM4Qtff$Ytq2SKg');
define('LOGGED_IN_SALT',   '#S03.<z7f9Y#@`Ct[[*ZIj,5sIQkAdXE$5)25krGA,d~%vkR2f#G(?6gXL-2!F]T');
define('NONCE_SALT',       'Zbqt344r@@}n;Y hH,,*`src=e36S ^E9`(%uymJhH$nYMLBo2]oAi;hU)FmX,i_');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Lingua di Localizzazione di WordPress, di base Inglese.
 *
 * Modificare questa voce per localizzare WordPress. Occorre che nella cartella
 * wp-content/languages sia installato un file MO corrispondente alla lingua
 * selezionata. Ad esempio, installare de_DE.mo in to wp-content/languages ed
 * impostare WPLANG a 'de_DE' per abilitare il supporto alla lingua tedesca.
 *
 * Tale valore è già impostato per la lingua italiana
 */
define('WPLANG', 'it_IT');

/**
 * Per gli sviluppatori: modalità di debug di WordPress.
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */

//define( 'COOKIE_DOMAIN', ".".str_replace('www.','',$_SERVER['HTTP_HOST']));

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
