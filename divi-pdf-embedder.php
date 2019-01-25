<?php

/*
	Plugin Name: Divi PDF Embedder
	Plugin URI: https://github.com/andronics/divi-pdf-embedder
	Description: Extends Divi Builder by adding support for the PDF Embedder plugin.
	Author: andronics
	Author URI: https://github.com/andronics/
	Version: 0.1
	License: GNU General Public License v2.0
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domian: divi-pdf-embedder
	Domain Path: /languages

 */

function aio_pdf_embedder_enqueue() {
	wp_enqueue_style( 'aio_pdf_embedder_css', plugins_url( '/style.css', __FILE__ ) );
}

function aio_pdf_embedder_module_loader() {
	
	if ( class_exists('ET_Builder_Module') ) {
		include_once('modules/pdf_embedder.php');
	} 

}
 
add_action( is_admin() ? 'wp_loaded' : 'wp', 'aio_pdf_embedder_module_loader', 9789);
add_action( 'wp_enqueue_scripts', 'aio_pdf_embedder_enqueue', 9999);


?>