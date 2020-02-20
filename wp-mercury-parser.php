<?php
/**
 * Plugin Name: WP Mercury Parser
 * Plugin URI: https://mercury.postlight.com/web-parser/
 * Description: Mercury Parser for WordPress
 * Version: 1.0
 * Author: Postlight
 * Author URI: https://postlight.com
 *
 * @package wp-mercury-parser
 */

/**
 * Exit if accessed directly
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Definitions
 */
if ( ! defined( 'WMP_PREFIX' ) ) {

	define( 'WMP_PREFIX', 'wmp_' );

	define( 'WMP_DEFAULT_TIMEZONE', 'America/New York' );
	define( 'WMP_DATE_FORMAT', 'd-m-Y' );

	define( 'WMP_PLUGIN_FOLDER_NAME', 'wp-mercury-parser' );
	define( 'WMP_PLUGIN_URL', WP_PLUGIN_URL . '/' . WMP_PLUGIN_FOLDER_NAME . '/' );

	define( 'WMP_PLUGIN_DIR', dirname( __FILE__ ) . '/' );

	if ( empty( get_option( 'wmp_settings_api_endpoint' )['wmp_settings_api_endpoint_field'] ) ) {
		define( 'WMP_MERCURY_PARSER_ENDPOINT', 'https://postlight-mercury-parser-api.glitch.me/parse' );
		define( 'WMP_CUSTOM_ENDPOINT', 0 );
	} else {
		define( 'WMP_MERCURY_PARSER_ENDPOINT', get_option( 'wmp_settings_api_endpoint' )['wmp_settings_api_endpoint_field'] );
		define( 'WMP_CUSTOM_ENDPOINT', 1 );
	}
}

/**
 * Load plugin Start
 */
require WMP_PLUGIN_DIR . '/includes/classes/class-wmpbase.php';
global $wmp;
$wmp = new WmpBase();
$wmp->init();
