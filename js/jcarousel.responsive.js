(function($) {
    $(function() {
        var jcarousel = $('.jcarousel');

        jcarousel
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel = $(this),
                    width = carousel.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }
                carousel.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            /*.jcarousel({
                wrap: 'last',
            }).jcarouselAutoscroll();*/
            .jcarousel({
                wrap: 'circular',
            });

        $('.jcarousel-control-prev')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
$(function() {
        var jcarousela2 = $('.jcarousela2');

        jcarousela2
            .on('jcarousel:reload jcarousel:create', function () {
                var jcarousela2 = $(this),
                    width = jcarousela2.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }

                jcarousela2.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'last',
            }).jcarouselAutoscroll();

        $('.jcarousel-control-preva2')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-nexta2')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-paginationa2')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
$(function() {
        var jcarousela3 = $('.jcarousela3');

        jcarousela3
            .on('jcarousel:reload jcarousel:create', function () {
                var jcarousela3 = $(this),
                    width = jcarousela3.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }

                jcarousela3.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'last',
            }).jcarouselAutoscroll();

        $('.jcarousel-control-preva3')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-nexta3')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-paginationa3')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
$(function() {
        var jcarousela = $('.jcarousela');

        jcarousela
            .on('jcarousel:reload jcarousel:create', function () {
                var jcarousela = $(this),
                    width = jcarousela.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }

                jcarousela.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'last',
            }).jcarouselAutoscroll();

        $('.jcarousel-control-preva')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-nexta')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-paginationa')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
    $(function() {
        var jcarousel1 = $('.jcarousel1');

        jcarousel1
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel1 = $(this),
                    width = carousel1.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }

                carousel1.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'last',
            }).jcarouselAutoscroll();

        $('.jcarousel-control-prev1')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next1')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination1')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
$(function() {
        var jcarousel2 = $('.jcarousel2');

        jcarousel2
            .on('jcarousel:reload jcarousel:create', function () {
                var carousel2 = $(this),
                    width = carousel2.innerWidth();

                if (width >= 600) {
                    width = width / 3;
                } else if (width >= 350) {
                    width = width / 2;
                }

                carousel2.jcarousel('items').css('width', Math.ceil(width) + 'px');
            })
            .jcarousel({
                wrap: 'last',
            }).jcarouselAutoscroll();

        $('.jcarousel-control-prev2')
            .jcarouselControl({
                target: '-=1'
            });

        $('.jcarousel-control-next2')
            .jcarouselControl({
                target: '+=1'
            });

        $('.jcarousel-pagination2')
            .on('jcarouselpagination:active', 'a', function() {
                $(this).addClass('active');
            })
            .on('jcarouselpagination:inactive', 'a', function() {
                $(this).removeClass('active');
            })
            .on('click', function(e) {
                e.preventDefault();
            })
            .jcarouselPagination({
                perPage: 1,
                item: function(page) {
                    return '<a href="#' + page + '">' + page + '</a>';
                }
            });
    });
})(jQuery);
