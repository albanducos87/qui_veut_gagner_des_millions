(function($) {

    var	$window = $(window),
        $body = $('body'),
        $banner = $('#banner'),
        $header = $('#header');

    $window.on('load', function() {
        window.setTimeout(function() {
            $body.removeClass('is-preload');
        }, 100);
    });

    if (browser.mobile)
        $body.addClass('is-mobile');
    else {

        breakpoints.on('>medium', function() {
            $body.removeClass('is-mobile');
        });

        breakpoints.on('<=medium', function() {
            $body.addClass('is-mobile');
        });

    }

    if ($banner.length > 0
        &&	$header.hasClass('alt')) {

        $window.on('resize', function() { $window.trigger('scroll'); });

        $banner.scrollex({
            bottom:		$header.outerHeight() + 1,
            terminate:	function() { $header.removeClass('alt'); },
            enter:		function() { $header.addClass('alt'); },
            leave:		function() { $header.removeClass('alt'); }
        });

    }

})(jQuery);