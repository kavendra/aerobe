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
});