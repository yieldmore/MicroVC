var $last = null;

$(document).ready(function() {
  // Handler for .ready() called.
  $(".thumbs img").click(function () {
    if ($last != null && $last.hasClass("selected")) $last.removeClass("selected");
    $(this).addClass("selected");
    $last = $(this);
    
    var $img = $("#img-current");
    $img.attr("src", curFol + $(this).attr("alt"));
    var $or = $(this).attr("data-orient");
    var $sz = $(this).attr("data-size");
    if ($or == "h") { img.height = curSize; img.width = $sz; }
    else { img.height = $sz; img.width = curSize; }
  });
});
