$(function() {
   $('#recipe-tags').change(function() {
       var recipeTags = document.getElementById("recipe-tags");
       var selectedText = recipeTags.options[recipeTags.selectedIndex].text;
       window.location = "/recipes/index/" + selectedText;
   });
});