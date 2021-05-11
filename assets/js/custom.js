$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay: true,
        animateOut: 'fadeOut',
        items:1
    })

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
    })
    
});
