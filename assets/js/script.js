$(function(){
	// $('.navBar').click(function(event){
	// 	$('.dropDownMenu').stop().slideToggle(500);
	// 	$('.adminDropdown').hide(200);
	// 	event.stopPropagation();
	// });


	$('.navBar').click(function (e) {
        $('.dropDownMenu').slideToggle();
        $('.dropDownMenu .sub-menu li .sub-menu-section').slideUp();
        $('.sub-menu-section li span').removeClass('open');
    });


	// menu toggle
        $(".dropDownMenu").click(function (event) {
            event.stopPropagation();
        });
        $(window).click(function () {
            $(".dropDownMenu").slideUp(400);
            $(".sub-menu li .sub-menu-section").slideUp(400);
        });
        $(".right-part").click(function (event) {
            event.stopPropagation();
        })
        $(".sub-btn, ul.sub-menu-section li span").click(function (event) {

            event.stopPropagation();
            $('.sub-menu-section li span').removeClass('open');

            	$('.sub-menu-section').slideToggle();



            // if ($(this).siblings('ul').is(":visible") == true) {
            //     $(this).siblings('ul').slideUp(400);
            // } else {
            //     $(".sub-menu li .sub-menu-section").slideUp(400);
            //     $(this).siblings('ul').slideDown(400);
            //     $(this).next('span').addClass('open');
            // }
        });






	// $('.homePage').click(function(){
	// 	$('.dropDownMenu').slideUp(500);
		
	// });
	$('.exapandBtn').click(function(e){
		$('.mainContentInner').addClass('showAll');
		e.preventDefault();
	});
	// $('.dropDownMenu ul li').mouseenter(function(){
	// 	$(this).children('ul').stop().slideDown(500);
	// 	$(this).addClass('active');
	// });
	// $('.dropDownMenu ul li').mouseleave(function(){
	// 	$(this).children('ul').stop().slideUp(500);	
	// 	$(this).removeClass('active');
	// });
	$('.topLinks li').click(function(event){
		$(this).children('.adminDropdown').stop().slideToggle(500);
		$('.dropDownMenu').hide(200);
		event.stopPropagation();
	});
	$('.homePage').click(function(){
		$('.adminDropdown').slideUp(500);
			
	});


});