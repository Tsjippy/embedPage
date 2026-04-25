<?php
namespace SIM\EMBEDPAGE;
use SIM;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('init', __NAMESPACE__.'\init');
function init(){
	global $wp_scripts;
	
	// do not run during rest request
    if(SIM\isRestApiRequest()){
        return;
    }
	
	//Add tinymce plugin
	add_filter('mce_external_plugins', __NAMESPACE__.'\addPlugin',999);
			
	//add tinymce button
	add_filter('mce_buttons', __NAMESPACE__.'\addButton',999);

}

function addPlugin($plugins){
	global $wp_scripts;
	
	if(!isset($wp_scripts->registered['tsjippy_script'])){
		return $plugins;
	}
		
	//Add extra variables to the main.js script
	wp_localize_script( 'tsjippy_script', 
		'pageSelect', 
		['html'=> SIM\pageSelect('page-selector')]
	);

	wp_localize_script( 'tsjippy_admin_js', 
		'pageSelect', 
		['html'=>SIM\pageSelect('page-selector')]
	);

	$plugins['insert_embed_shortcode']		= SIM\pathToUrl(PLUGINPATH."js/tiny_mce.js?ver=".PLUGINVERSION);

	return $plugins;
}

function addButton($buttons){
	array_push($buttons, 'insert_embed_shortcode');
	return $buttons;
}