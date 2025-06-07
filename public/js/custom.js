$(function() {
	var colors = ['red', 'blue', 'green', 'orange', 'purple'];
	$('.tag-box, .tag-text').each(function() {
	    var randomClass = colors[Math.floor(Math.random() * colors.length)];
	    $(this).addClass(randomClass);
	});

	var rawUrl = $('.top-banner.contact-banner img').attr('src');
	if(rawUrl) {
	    var fixedUrl = rawUrl.replace(/\\/g, '/');
	    $('.top-banner.contact-banner').css('background-image', 'url(' + fixedUrl + ')');
	}

	function fetchNews(url) {
		$('#news-container').load(url);
	}

	$('.category-checkbox').on('change', function () {
		const selectedCategories = $('.category-checkbox:checked').map(function () {
            return $(this).val();
        }).get();
		let route = $('#news-container').data('route')+"?category_ids="+selectedCategories;
        fetchNews(route);
    });

    $(document).on('click', '.pagination a', function (e) {
	    e.preventDefault();
	    const selectedCategories = $('.category-checkbox:checked').map(function () {
            return $(this).val();
        }).get();
	    let route = $(this).attr('href')+"&category_ids="+selectedCategories;
	    fetchNews(route);
	});

    $('#newslettertop-form').on('submit', function (e) {
        e.preventDefault();
        let email = $('#newsletter-email').val();
        if(email == ''){
            $('#newsletter-email').css('border', '1px solid #F00');
            return;
        }else if(!isValidEmail(email)) {
	      $('#newsletter-email').css('border', '1px solid #F00');
	      return;
	    }
        let token = $('input[name="_token"]').val();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                _token: token,
                email: email
            },
            success: function (response) {
                $('#newsletter-email').css('border', '1px solid #2ecc71');
                $('#newslettertop-form')[0].reset();
            },
            error: function (xhr) {
                $('#newsletter-email').css('border', '1px solid #F00');
            }
        });
    });

    $('#newsletter-form').on('submit', function (e) {
        e.preventDefault();
        let email = $('#join-email').val();
        if(email == ''){
            $('#join-email').css('border', '1px solid #F00');
            return;
        }else if(!isValidEmail(email)) {
            $('#response-message').html('<p style="color: red;">Please enter valid email</p>');
          return;
        }
        let token = $('input[name="_token"]').val();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: {
                _token: token,
                email: email
            },
            success: function (response) {
                $('#join-email').css('border', 0);
                $('#response-message').html('<p style="color: green;">' + response.success + '</p>');
                $('#newsletter-form')[0].reset();
            },
            error: function (xhr) {
                let error = xhr.responseJSON.errors.email[0];
                $('#response-message').html('<p style="color: red;">' + error + '</p>');
            }
        });
    });

	$(document).on('click', '.our-portfolio', function (e) {
	    e.preventDefault();
	    var $target = $('#dd-portofolio');

		  if ($target.is(':visible')) {
		    //$target.slideUp();
            $target
              .css('display', '');
		  } else {
		    $target
		      .css('display', 'flex')
		      .slideDown();
		  }
	});

    $(document).on('click', '#solutions', function (e) {
        e.preventDefault();
        var $target = $('#dd-solutions');

          if ($target.is(':visible')) {
            //$target.slideUp();
            $target
              .css('display', '');
          } else {
            $target
              .css('display', 'flex')
              .slideDown();
          }
    });

    $(".dsk-arrow").mouseout(function(e){
        e.preventDefault();
        var $target = $('#dd-portofolio');

        if ($target.is(':visible')) {
            $target.css('display', '');
        }
    });

    $("#cate-solution").mouseout(function(e){
        e.preventDefault();
        var $target = $('#dd-solutions');

        if ($target.is(':visible')) {
            $target.css('display', '');
        }
    });

	$('.dd-menu').each(function () {
      var $menu = $(this);
      var $firstRightContent = $menu.find('.right-content').first();
      var colCount = $firstRightContent.find('.col').length;

      // Remove any previous class
      $menu.removeClass('dd-one dd-two dd-three');

      // Add based on count
      if (colCount === 2) {
        $menu.addClass('dd-one');
      } else if (colCount === 3) {
        $menu.addClass('dd-two');
      } else if (colCount === 4) {
        $menu.addClass('dd-three');
      }
	});

	$(".fb-btn").on("click", function(){
		$(".facebook-p").addClass("active");
	});	

	$(".facebook-p .close-btn").on("click", function(){
		$(".facebook-p").removeClass("active");
	});

	function isValidEmail(email) {
	    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
	    return re.test(email);
	}
});