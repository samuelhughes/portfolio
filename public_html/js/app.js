$(document).ready(function() {
    // Accordion Functionality
    $('.accordion .title').click(function(){
        var $accordion = $(this).closest('.accordion');
        var status = $accordion.attr('data-status');
        if(status == 'active'){
            $accordion.trigger('accordion-close');
        }else{
            $accordion.trigger('accordion-open');
        }
    });

    $('.accordion').on('accordion-open', function(){
        $(this).attr('data-status','active').children('.content').stop().slideDown(200);
        $(this).siblings('[data-status="active"]').trigger('accordion-close');
    }).on('accordion-close',function(event){
        event.stopPropagation();
        $(this).attr('data-status','inactive').children('.content').stop().slideUp(200);
    });

    // Header scrolling functionality
    function headerScroll() {
        var windowPos = $(window).scrollTop();
        if (windowPos > 0) {
            $('.header-content').addClass('scrolling');
        } else {
            $('.header-content').removeClass('scrolling');
        }
    }

    $(window).on('scroll',function() {
        headerScroll();
    })
})
