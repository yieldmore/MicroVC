$(document).ready(function() {
  // http://snook.ca/archives/javascript/simplest-jquery-slideshow
  // http://css-tricks.com/snippets/jquery/simple-auto-playing-slideshow/
  $("#slideshow div:gt(0)").hide();
  setInterval(function() 
  {
    $('#slideshow > div:first').fadeOut(900) // give 100ms else both are seen together
      .next().fadeIn(1000)
      .end().appendTo('#slideshow');
  },  3000);
});
