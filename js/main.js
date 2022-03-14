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

    var boutonReponseSelected
    var idSelected

    var valider = document.getElementById('valider')
    valider.addEventListener('click', () => {
        boutonReponseSelected.style.backgroundColor = "green"
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "coral"
        }, 100)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "green"
        }, 200)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "coral"
        }, 300)
        setTimeout(() => {
            boutonReponseSelected.style.backgroundColor = "green"
        }, 400)
    })

    var liste = document.getElementsByClassName('reponse')
    for(let i = 0; i < liste.length; i++) {
        liste[i].addEventListener("click", () => {
            if (boutonReponseSelected) {
                boutonReponseSelected.style.backgroundColor = "navy"
            }
            boutonReponseSelected = liste[i];
            idSelected = i;
            boutonReponseSelected.style.backgroundColor = "coral";
            valider.style.display = "block";
        })
    }

})(jQuery);

