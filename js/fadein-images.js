// @codekit-prepend "_jquery.waitforimages.js"

jQuery(document).ready(function($) {
	$('header#masthead, body.blog article, body.archive article, body.search article, body.single .entry-content img, body.page .entry-content img').each(function() {
		$(this).css('opacity', '.1').waitForImages({
			finished: function() {
				$(this).css('opacity', '1');
		    },
		    waitForAll: true
		});
	});
});