jQuery(document).ready(function(jQuery) {
	jQuery("#dl-stc-counter-form").on("submit", function(e) {
		e.preventDefault();
		var text = jQuery("#dl-stc-text").val().trim();

		var charCount = text.length;
		var wordCount = text ? text.split(/\s+/).length : 0;
		var sentenceCount = text ? text.split(/[.!?]+/).filter(Boolean).length : 0;

		jQuery("#dl-stc-characters").text(charCount);
		jQuery("#dl-stc-words").text(wordCount);
		jQuery("#dl-stc-sentences").text(sentenceCount);
		
		jQuery("#dl-stc-result").slideDown();
	});
});
