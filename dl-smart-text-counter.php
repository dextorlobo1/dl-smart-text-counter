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

// Register shortcode
function tc_counter_shortcode() {
	ob_start(); ?>

	<div id="tc-counter-wrapper">
		<form id="tc-counter-form">
			<textarea id="tc-text" rows="6" style="width:100%;" placeholder="Enter text here..."></textarea><br><br>
			<button type="submit" id="tc-submit">Count</button>
		</form>

		<div id="tc-result" style="margin-top:20px; display:none; background:#f7f7f7; padding:10px; border:1px solid #ddd;">
			<p><strong>Characters:</strong> <span id="tc-characters"></span></p>
			<p><strong>Words:</strong> <span id="tc-words"></span></p>
			<p><strong>Sentences:</strong> <span id="tc-sentences"></span></p>
		</div>
	</div>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$("#tc-counter-form").on("submit", function(e) {
				e.preventDefault();
				var text = $("#tc-text").val().trim();

				var charCount = text.length;
				var wordCount = text ? text.split(/\s+/).length : 0;
				var sentenceCount = text ? text.split(/[.!?]+/).filter(Boolean).length : 0;

				$("#tc-characters").text(charCount);
				$("#tc-words").text(wordCount);
				$("#tc-sentences").text(sentenceCount);
				
				$("#tc-result").slideDown();
			});
		});
	</script>

<?php 
	return ob_get_clean();
}
add_shortcode( 'dl_smart_text_counter', 'tc_counter_shortcode' );

