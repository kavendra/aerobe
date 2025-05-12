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
});