<?php 
/*
Plugin Name: Bellevue College 25Live Shortcodes Plugin
Plugin URI: https://github.com/BellevueCollege/bc-25live-shortcode-plugin
Description: 
Author: Bellevue College Integration Team
Version: 0.0.0-dev1
Author URI: http://www.bellevuecollege.edu
*/

function bc25lsp_scripts() {
	wp_enqueue_script( '25live-spuds', 'https://25livepub.collegenet.com/scripts/spuds.js', array(), '1.0.0', false );
}
add_action( 'wp_enqueue_scripts', 'bc25lsp_scripts' );


function bc25lsp_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'webname' => 'bc-events-calendar',
		'type'    => 'main',
	), $atts );

	return '<script type="text/javascript">$Trumba.addSpud({ webName: "' . $a['webname'] . '", spudType : "' . $a['type'] . '" });</script>';
}
add_shortcode( '25live-spud', 'bc25lsp_shortcode' );