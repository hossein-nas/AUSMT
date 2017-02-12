$(document).ready(function(){
	console.log();
	var oldscroll=0;
	var newscroll=$(document).scrollTop();
	var flag=0;

	$("nav").wrap('<div class="WrapNav"></div>');
    var nav=$("nav");
	nav = nav.parent();
	if(newscroll>150)
		NavIn(nav);
	$( window ).scroll(function() {
		oldscroll=newscroll;
		newscroll=$(document).scrollTop();
		if(oldscroll<150 && newscroll>150){
			flag=1;
			NavIn(nav);
		}
		else if(oldscroll>150 && newscroll<150){
			flag=0;
			NavOut(nav);
		}
		if (oldscroll>150 && newscroll > 150 && flag==0){
			flag=1;
			NavIn(nav);
		}
		if (oldscroll < 150 && newscroll < 150 && flag==1){
			flag=0;
			NavOut(nav);
		}

	});
	function NavIn(nav){
		nav.css({'position':'fixed','top':-100,'right':0,'z-index':100,'width':'100%','background-color':'white'});
		nav.css({'box-shadow':'0 0px 3px #aaa'});
		nav.css({'-webkit-box-shadow':'0 0px 3px #aaa'});
		nav.css({'-mox-box-shadow':'0 0px 3px #aaa'});
		nav.find('nav').css({'width':1200});
		nav.animate({'top':0},500);
	}
	function NavOut(){
		nav.css({'position':'static','width':'auto','background-color':'transparent'});
		nav.find('nav').css({'width':'1100px'});
		nav.css({'box-shadow':'none'});
		nav.css({'-webkit-box-shadow':'none'});
		nav.css({'-mox-box-shadow':'none'});
	}
})