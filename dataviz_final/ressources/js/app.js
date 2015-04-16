            $(window).scroll(function() {
                $('.media').each(function(){
                    var imagePos = $(this).offset().top;

                    var bottomOfWindow = $(window).scrollTop()+ $(window).height();
                        if (imagePos < bottomOfWindow-60) {
                            $(this).addClass("opacity");
                    }
                });
            });

            function hide(obj) {
                var el = document.getElementById(obj);
                el.style.display = 'none';
            }