jQuery(window).scroll(function() {    
	var scroll = jQuery(window).scrollTop();
	if (scroll >= 100) {
		jQuery(".header").addClass("active");
	} else {
		jQuery(".header").removeClass("active");
	}
});

jQuery(document).ready(function() {
	
	// Navigation //
	jQuery(".nav-menu li").has("ul").addClass("dsk-arrow");
	jQuery(".nav-menu li").has("ul").append("<div class='arrow'><span><i class='fa fa-angle-down' aria-hidden='true'></i></span></div>");
	jQuery(".menu_icon").click(function(){
		jQuery(".nav-menu").slideToggle("slow");
		jQuery("body").toggleClass("scroll-none");
		jQuery(this).toggleClass("active");
		jQuery(".nav-menu li ul").slideUp();
		jQuery(".nav-menu .arrow").removeClass("active");
	});

	jQuery(".nav-menu .arrow").click(function(){
		jQuery(this).parent().siblings().find("ul").slideUp();
		jQuery(this).parent().siblings().find(".arrow").removeClass("active");        
		jQuery(this).siblings("ul").slideToggle();            
		jQuery(this).siblings("ul").find("ul").slideUp();            
		jQuery(this).siblings("ul").find(".arrow").removeClass("active");            
		jQuery(this).toggleClass("active");
	});


	var for_mbl = $(".head_links").html();
	jQuery(".header_btm .head_links").append(for_mbl);


	jQuery(document).on("click",".scroll_to_form",function() {
		var curdata = "#" + jQuery(this).attr("data-type");
		var head_height = jQuery(".header").innerHeight();
		jQuery('html, body').animate({ scrollTop: jQuery(curdata).offset().top - head_height}, 1000);
		return false;
	});

	var owl = $('#hp_carousel');
	owl.owlCarousel({
	nav: true,
	loop: true,
	autoplay:true,
	autoplayTimeout:10000,
	responsive:{
		0:{items:1},
		600:{items:1},
		1000:{items:1}
	}
	});


	jQuery(".pop_vid_play").on("click", function(){
		var firsturl = "https://www.youtube.com/embed/";
		var videoinfo = "?rel=0&amp;controls=0&amp;showinfo=0&autoplay=1";
		var iframesrc = jQuery(this).attr("data-type");
		var finalurl = firsturl + iframesrc + videoinfo;
		jQuery(".pop_up").addClass("show");
		jQuery(".video_iframe iframe").attr("src", finalurl)
	})
	
	jQuery(".pop_up .close_btn").on("click", function(){
		jQuery(".pop_up").removeClass("show");
		jQuery(".video_iframe iframe").attr("src", "")
	})

jQuery(window).resize(function(){
	var wwindow = jQuery(window).width();
	if (wwindow >= 1200) {         
		jQuery(".menu-icon").removeClass("active");
		jQuery(".nav-menu").removeAttr("style"); 
		jQuery(".nav-menu ul").removeAttr("style");
	}
});

$(".nav-menu .dd-menu .left-menu li a").on("click", function(){
	$(".nav-menu .dd-menu .right-content").removeClass("active");
	var curid = $(this).attr("data-type");
	$(curid).addClass("active");
});

$(".nav-menu .dd-menu .right-content li a").on("click", function(){
	let category = $(this).data('cat');
	var imgDiv = $(this).closest('li').next('.img').html();
	$('#cat-'+category).html(imgDiv);
});

$(".nav-menu .dd-menu .solution-category li a").on("click", function(){
	let category = $(this).data('cat');
	var imgDiv = $(this).closest('li').next('.img').html();
	$('#solution-cat-'+category).html(imgDiv);
});

$(".nav-menu .dd-menu .left-menu li").on("click", function(){
	$(".nav-menu .dd-menu .left-menu li").removeClass("active");
	$(this).addClass("active");
});


$(".our-client .tab-box .client-tabnav li a").on("click", function(){
	$(".our-client .tab-box .client-tabnav li a").removeClass("active");
	$(".our-client .tab-box .tab-content").removeClass("active");
	$(this).addClass("active");
	var curid = $(this).attr("data-type");
	$(curid).addClass("active");
})

$(".header-right .search-btn svg").on("click", function(){
$(".search-p").show();
});

$(document).on("click", function(event) {
    if (!$(event.target).closest('.search-p, .header-right .search-btn').length) {
        $(".search-p").hide();
    }
});

$(".global .g-btn").on("click", function(){
	$(this).toggleClass("active");
$(".global-menu").toggle();
});

$(".header-right .connect-with").on("click", function(){
	$(".get-in-touch").show();
});


$(".header-right .connect-with").on("click", function(e) {
    e.stopPropagation();
    $(".get-in-touch").show();
});

$(document).on("click", function() {
    $(".get-in-touch").hide();
});

$(".get-in-touch").on("click", function(e) {
    e.stopPropagation();
});
});