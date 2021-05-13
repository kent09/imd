$(document).ready(function() {
    $('.slider .owl-carousel').owlCarousel({
        loop:true,
        autoplay: true,
        animateOut: 'fadeOut',
        items:1
    });

    $('.card-slider .owl-carousel').owlCarousel({
        loop:true,
        autoplay: true,
        margin:30,
        responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
    });

    $('.content-testimonial .owl-carousel').owlCarousel({
        loop:true,
        autoplay: true,
        animateOut: 'fadeOut',
        dots: false,
        mouseDrag: false,
        touchDrag: false,
        items:1
    });

    $('#wheel-tab ul a').each(function() {
        $(this).lettering();
    }); 

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $('.nav-wrapper button').on('click', function() {
      $('#site-navigation').removeClass('toggled');
    });

    $('.content-tab-list .tab_title').on('click', function() {
        let $this = $(this)
        $this.parent().toggleClass('active');
        $this.parent().find('.tab_description').slideToggle('fast');
    });

    $('.card-slider .item').on('click', function(e){
        e.preventDefault();
        let $this = $(this);
        $this.find('.hover-show').fadeToggle();
    });
    
});
