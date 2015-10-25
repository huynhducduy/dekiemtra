        $(document).ready(function () {
            var $interv = setInterval(nextSlides, 30000);
            var $numSlides = $('#slideshow li').length;
            var $slideCount = 1;
            var $firstSlide = $('#slideshow li:first');
            var $lastSlide = $('#slideshow li:last');
            var $next, $prev;
            function nextSlides() {
                var $currSlide = $('#slideshow li.current-slide');
                $currSlide.fadeOut('slow', function () {
                    $currSlide.removeClass('current-slide');
                    if ($slideCount == $numSlides) {
                        $slideCount = 1;
                        $next = $('#slideshow li:first');
                    }
                    else {
                        $slideCount += 1;
                        $next = $currSlide.next();
                    }
                    $next.fadeIn('slow', function () {
                        $next.addClass('current-slide');
                    });
                });
            }
            function prevSlides() {
                var $currSlide = $('#slideshow li.current-slide');
                $currSlide.fadeOut('slow', function () {
                    $currSlide.removeClass('current-slide');
                    if ($slideCount - 1 == 0) {
                        $slideCount = $numSlides;
                        $prev = $('#slideshow li:last');
                    }
                    else {
                        $slideCount -= 1;
                        $prev = $currSlide.prev();
                    }
                    $prev.fadeIn('slow', function () {
                        $prev.addClass('current-slide');
                    });
                });
            }
            $("#fbprevbtn").click(function () {
                prevSlides();
            });
            $("#fbnextbtn").click(function () {
                nextSlides();
            });
            $("#cevher_close").click(function () {
                $("#fbdivcevherlink").animate({ right: 20 }, 500).animate({ right: -320 }, 500);
            });
            $("#fbdivcevherlink").animate({ right: 5 }, 500);
        });