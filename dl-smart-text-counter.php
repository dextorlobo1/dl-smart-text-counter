<?php
/**
 * Plugin Name: DL Smart Text Counter
 * Plugin URI: https://github.com/dextorlobo1/text-counter
 * Description: Character count, word count, and sentence count tool with shortcode [dl_smart_text_counter].
 * Version: 1.0.1
 * Author: Arun Sharma
 * Author URI: https://imarun.me
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: dl-smart-text-counter
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function dl_stc_enqueue_scripts() {
	wp_enqueue_script(
		'dl-stc-script',
		plugin_dir_url( __FILE__ ) . 'assets/js/dl-stc.js',
		array( 'jquery' ),
		'1.0.1',
		true
	);
	wp_enqueue_style(
		'dl-stc-style',
		plugin_dir_url( __FILE__ ) . 'assets/css/dl-style.css',
		array(),
		'1.0.1'
	);
}
add_action( 'wp_enqueue_scripts', 'dl_stc_enqueue_scripts' );


// Register shortcode
function tc_counter_shortcode() {
	ob_start(); ?>

	<div id="tc-counter-wrapper">
		<form id="tc-counter-form">
			<textarea id="tc-text" rows="6" placeholder="<?php esc_attr_e( 'Enter text here...', 'dl-smart-text-counter' ); ?>"></textarea>
			<br><br>
			<button type="submit" id="tc-submit"><?php esc_html_e( 'Count', 'dl-smart-text-counter' ); ?></button>
		</form>

		<div id="tc-result">
			<p><strong><?php esc_html_e( 'Characters:', 'dl-smart-text-counter' ); ?></strong><span id="tc-characters"></span></p>
			<p><strong><?php esc_html_e( 'Words:', 'dl-smart-text-counter' ); ?></strong> <span id="tc-words"></span></p>
			<p><strong><?php esc_html_e( 'Sentences:', 'dl-smart-text-counter' ); ?></strong> <span id="tc-sentences"></span></p>
		</div>
	</div>
<?php 
	return ob_get_clean();
}
add_shortcode( 'dl_smart_text_counter', 'tc_counter_shortcode' );
