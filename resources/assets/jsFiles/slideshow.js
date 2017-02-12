jQuery(document).ready(function($) {
	var interval = setInterval(slideshow , 4000);
	function slideshow(){
		var currentImg=$('.slideshow .slide-show li.active');
		var currentLink=$('.slideshow .links li.active');
		if(currentImg.next().next().index()!=-1){
			currentImg.animate({'opacity':'0'},function(){
				$(this).removeClass('active').css('opacity','1').next().addClass('active').removeClass('reserve').next().addClass('reserve');
			})
		}
		else if(currentImg.next().index()!=-1){
			currentImg.animate({'opacity':'0'},function(){
				$(this).removeClass('active').css('opacity','1').next().addClass('active').removeClass('reserve');
				$('.slideshow .slide-show li:first-child').addClass('reserve');
			})
		}else{
			currentImg.animate({'opacity':'0'},function(){
				$(this).removeClass('active').css('opacity','1');
				$('.slideshow .slide-show li:first-child').addClass('active').removeClass('reserve').next().addClass('reserve');
			})
		}
		/////////
		if(currentLink.next().index()!=-1)
			currentLink.removeClass('active').next().addClass('active');
		else{
			currentLink.removeClass('active');
			$('.slideshow .links li:first-child').addClass('active');
		}
	}

});