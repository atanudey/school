$(function(){
	$('.navBar').click(function(event){
		$('.dropDownMenu').stop().slideToggle(500);
		$('.adminDropdown').hide(200);
		event.stopPropagation();
	});
	$('.homePage').click(function(){
		$('.dropDownMenu').slideUp(500);
		
	});
	$('.exapandBtn').click(function(e){
		$('.mainContentInner').addClass('showAll');
		e.preventDefault();
	});
	$('.dropDownMenu ul li').mouseenter(function(){
		$(this).children('ul').stop().slideDown(500);
		$(this).addClass('active');
	});
	$('.dropDownMenu ul li').mouseleave(function(){
		$(this).children('ul').stop().slideUp(500);	
		$(this).removeClass('active');
	});
	$('.topLinks li').click(function(event){
		$(this).children('.adminDropdown').stop().slideToggle(500);
		$('.dropDownMenu').hide(200);
		event.stopPropagation();
	});
	$('.homePage').click(function(){
		$('.adminDropdown').slideUp(500);
			
	});


});