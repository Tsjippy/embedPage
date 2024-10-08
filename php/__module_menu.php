<?php
namespace SIM\EMBEDPAGE;
use SIM;

const MODULE_VERSION		= '8.0.0';
//module slug is the same as grandparent folder name
DEFINE(__NAMESPACE__.'\MODULE_SLUG', strtolower(basename(dirname(__DIR__))));

add_filter('sim_submenu_description', function($description, $moduleSlug){
	//module slug should be the same as the constant
	if($moduleSlug != MODULE_SLUG)	{
		return $description;
	}

	ob_start();
	?>
	<p>
		This module makes it possible to display the contents of another page in a page.<br>
		This can be done by using the frontend contend module or by using the 'embed_page' shortcode.<br>
		Use like this: <code>[embed_page id=SOMEPAGEID]</code>
	</p>
	<?php

	return ob_get_clean();
}, 10, 2);