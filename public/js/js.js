$(document).ready(function(a){a(".togglemenu,nav").on("click",function(){var b=a("nav .navigation");b.on("click",function(a){a.stopPropagation()}),b.hasClass("show")?b.animate({marginLeft:"-80%"},500,function(){b.parent().hide()}).removeClass("show"):(b.parent().show(),b.animate({marginLeft:0},500).addClass("show"))})}),$(document).ready(function(){$(".navbar li").on("click",function(){var a=$(this);if(!a.hasClass("active")&&0==$(".navbar li:animated").size()){var b=$(".navbar li.active").removeClass("active").data("rel"),c=a.addClass("active").data("rel"),d=".content .body ."+b,e=".content .body ."+c;$(d).animate({opacity:"0"},300,function(){$(this).hide(),$(e).show().animate({opacity:"1"},300)})}})}),jQuery(document).ready(function(){function a(){b.find("li a").each(function(a,b){$(this).animate({bottom:"-25%",opacity:"0"},300)}),b.find("li:first-child").delay(500).animate({marginRight:"-1200px"},900,function(){$(this).next().children("a").animate({bottom:"0",opacity:"1"},500).parent().prev().appendTo(".slider .slides").css("marginRight","0")})}var b=$(".slider");return b.find("li:first-child a").delay(500).animate({bottom:"0",opacity:"1"},500),b.find("li").size()<=1?0:void setInterval(a,5e3)}),jQuery(document).ready(function(a){function b(){var b=a(".slideshow .slide-show li.active"),c=a(".slideshow .links li.active");b.next().next().index()!=-1?b.animate({opacity:"0"},function(){a(this).removeClass("active").css("opacity","1").next().addClass("active").removeClass("reserve").next().addClass("reserve")}):b.next().index()!=-1?b.animate({opacity:"0"},function(){a(this).removeClass("active").css("opacity","1").next().addClass("active").removeClass("reserve"),a(".slideshow .slide-show li:first-child").addClass("reserve")}):b.animate({opacity:"0"},function(){a(this).removeClass("active").css("opacity","1"),a(".slideshow .slide-show li:first-child").addClass("active").removeClass("reserve").next().addClass("reserve")}),c.next().index()!=-1?c.removeClass("active").next().addClass("active"):(c.removeClass("active"),a(".slideshow .links li:first-child").addClass("active"))}setInterval(b,4e3)});