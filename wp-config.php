<?php
/**
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define( 'DB_NAME', 'conjunto' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'uconjunto' );

/** Tu contraseña de MySQL */
define( 'DB_PASSWORD', 'uconjunto' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', ']JFGkhoS+f5gG$n&I22I[z9{2De-V.<GtOp~FHxe0[WX00kUE6(_MS}T]D!?/`|~' );
define( 'SECURE_AUTH_KEY', 'e$-fo OI))M9<}o,7[SDibdiEDKj9Wvl-Ag1/`L_W#Sq~Qx!|VU}GaT/zitvDXF<' );
define( 'LOGGED_IN_KEY', 'eH.PiuyoRJqwOJ7@222D2z,f;@b;1RKhgDuKzj[=13]GC!EQzR h1RF26u{m%b:0' );
define( 'NONCE_KEY', 'Z$v[6j!.T(<$AZ+3/*HxJW%>^~18{Im;(5h7@)}pU$Q ;h6X_oj-ZV- `GuHf.[e' );
define( 'AUTH_SALT', '- W@^twkLl@DRXy6;)QK%-U/~V ]*nqv2gF/;Q6&qZuccnKE$T5umlizs$.@JUcG' );
define( 'SECURE_AUTH_SALT', 'ifv(ji.}8.yaSnU!S,<Q&)Vs=zI|x*(nz)J%#|yx3{0D[0Jt90SP~kQ*9T2qEa{?' );
define( 'LOGGED_IN_SALT', 'bqCNxmcaM}3RM#d051ID5{0Js~7>-`h;aX7`#/;K03zD{]NA)Kvmh^.;}i~(@f?{' );
define( 'NONCE_SALT', 'x+*[/[6>VeV8/^_7>D;bN3Rh_+6O~L!(&qv44Q6(]1BM7iiYH}egF{AF]SIv}v|e' );

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

