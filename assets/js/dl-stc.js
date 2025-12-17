jQuery(document).ready(function(jQuery) {
	jQuery("#tc-counter-form").on("submit", function(e) {
		e.preventDefault();
		var text = jQuery("#tc-text").val().trim();

		var charCount = text.length;
		var wordCount = text ? text.split(/\s+/).length : 0;
		var sentenceCount = text ? text.split(/[.!?]+/).filter(Boolean).length : 0;

		jQuery("#tc-characters").text(charCount);
		jQuery("#tc-words").text(wordCount);
		jQuery("#tc-sentences").text(sentenceCount);
		
		jQuery("#tc-result").slideDown();
	});
});
