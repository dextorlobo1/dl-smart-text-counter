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