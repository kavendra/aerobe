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
	$(this).closest(".left-menu").siblings(".right-content").removeClass("active");
	var curid = $(this).attr("data-type");
	$(this).closest(".left-menu").siblings(curid).addClass("active");
})

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

$(".nav-menu .dd-menu .right-content li a").hover(
    function() {
      var cat = $(this).data("cat");
      var newHeading = $(this).data("heading");
      var newParagraph = $(this).data("paragraph");
      if($(this).data("type") == 'portfolio') {
        var imgDiv = $(this).closest('li').next('.img').html();
  		} else{
  			var imgDiv = $(this).closest('li').next('.sol-img').html();
  		}
      $(".nav-menu .dd-menu .right-content .col .textb h3").text(newHeading);
      $(".nav-menu .dd-menu .right-content .col .textb p").text(newParagraph);
      if($(this).data("type") == 'portfolio') {
      	$('#'+cat+'-portfolio-img').html(imgDiv);
  	  }else{
  	  	$('#'+cat+'-solution-img').html(imgDiv);
  	  }
    },
    function() {
      // (optional) Jab mouse hataayein tab default text wapas laana ho toh:
      //$(".nav-menu .dd-menu .right-content .col .textb h3").text("Default Heading");
      //$(".nav-menu .dd-menu .right-content .col .textb p").text("Default Paragraph");
    }
  );

$("#categoryone").addClass("active");

   $(".csr-section .tab-nav li a").click(function() {
	$(".csr-section .tab-nav li a").removeClass("active");
	$(this).addClass("active");
	   var target = $(this).data("target");

	   $(".blog-list").removeClass("active");

	   if (target === "viewall") {
		   $(".blog-list").addClass("active");
	   } else {
		   $("#" + target).addClass("active");
	   }
   });

   $(".latest-post .left-tab li button").click(function() {
   $(".items-container").css("display", 'none');
	$(".latest-post .left-tab li button").removeClass("active");
	$(this).addClass("active");
	   var target = $(this).data("target");
	   $(".items-container").removeClass("active");

	   if (target === "viewall") {
		   $(".items-container").addClass("active").css("display", 'flex');
	   } else {
		   $("#" + target).addClass("active").css("display", 'flex');
	   }
   });


  $('#gridBtn').click(function() {
	$(this).addClass("active");
	$("#listBtn").removeClass("active");
    $('.items-container')
      .removeClass('list-view')
      .addClass('grid-view');
  });

  $('#listBtn').click(function() {
	$(this).addClass("active");
	$("#gridBtn").removeClass("active");
    $('.items-container')
      .removeClass('grid-view')
      .addClass('list-view');
  });

  	$(".dsk-arrow a").on("click", function(){
		$(this).siblings(".dd-menu").slideToggle();
	});

	$(".menu-icon").on("click", function(){
		$(".header-left .m-div").toggleClass("active");
	});

	$(".header-left .m-div .close-btn").on("click", function(){
		$(".header-left .m-div").toggleClass("active");
	});

  /*function showFileName(input) {
	const fileName = input.files.length ? input.files[0].name : "No file selected";
	document.getElementById("file-name").textContent = fileName;
	}

	function showFileName(input) {
	const fileName = input.files.length ? input.files[0].name : "No file selected";
	document.getElementById("file-name-cv").textContent = fileName;
	}

	showFileName();*/
	
});
