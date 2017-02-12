jQuery(document).ready(function() {
  var slider=$('.slider');
  slider.find('li:first-child a').delay(500).animate({"bottom":"0","opacity":"1"},500);
  function autoChange(){
    slider.find("li a").each(function(index, el) {
      $(this).animate({"bottom":"-25%","opacity":"0"},300);
    });
    slider.find('li:first-child').delay(500).animate({"marginRight":"-1200px"},900,function(){
      $(this).next().children('a').animate({'bottom':"0","opacity":"1"},500).parent().prev().appendTo('.slider .slides').css("marginRight","0")
    });
  }
  setInterval(autoChange,5000);
});