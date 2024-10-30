<?php
class KITBLOCKS_Scripts {
	public function __construct() {
		add_action( 'wp_footer', array( $this, 'kahafkit_js' ) );
	}
	public function kahafkit_js() {
		// js goes here 
	}
}
$kitblocks_scripts = new KITBLOCKS_Scripts();


class KITBLOCKS_Style {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_style' ), 99 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'mands_block_editor_styles' ), 99 );
	}
	public function enqueue_style() {
		// css goes here 
        wp_enqueue_style( 'kitblocks-grid', plugins_url("../assets/css/kitblocks-grid.css", __FILE__ ), false, time() );
	}
	public function mands_block_editor_styles() {
		// js goes here for backend
        wp_enqueue_style( 'kitblocks-grid', plugins_url("../assets/css/kitblocks-grid.css", __FILE__ ), false, time() );
	}
}
$kitblocks_Style = new KITBLOCKS_Style();