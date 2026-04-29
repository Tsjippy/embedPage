<?php
namespace TSJIPPY\EMBEDPAGE;
use TSJIPPY;

/**
 * Plugin Name:  		Tsjippy Embed a Page
 * Description:  		This plugin makes it possible to display the contents of another page in a page.<br>This can be done by using the frontend contend plugin or by using the 'embed_page' shortcode.<br>Use like this: <code>[embed_page id=SOMEPAGEID]</code>
 * Version:      		10.0.0
 * Author:       		Ewald Harmsen
 * AuthorURI:			harmseninnigeria.nl
 * Requires at least:	6.3
 * Requires PHP: 		8.3
 * Tested up to: 		6.9
 * Plugin URI:			https://github.com/Tsjippy/embedpage/
 * Tested:				6.9
 * TextDomain:			tsjippy
 * Requires Plugins:	tsjippy-shared-functionality
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * @author Ewald Harmsen
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$pluginData = get_plugin_data(__FILE__, false, false);

// Define constants
define(__NAMESPACE__ .'\PLUGIN', plugin_basename(__FILE__));
define(__NAMESPACE__ .'\PLUGINPATH', __DIR__.'/');
define(__NAMESPACE__ .'\PLUGINVERSION', $pluginData['Version']);
define(__NAMESPACE__ .'\PLUGINSLUG', str_replace('tsjippy-', '', basename(__FILE__, '.php')));
define(__NAMESPACE__ .'\SETTINGS', get_option('tsjippy_embedpage_settings', []));