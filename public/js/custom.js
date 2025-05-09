$(function() {
	var colors = ['red', 'blue', 'green', 'orange', 'purple'];
	$('.tag-box').each(function() {
	    var randomClass = colors[Math.floor(Math.random() * colors.length)];
	    $(this).addClass(randomClass);
	});
});