$(document).ready(function () {
    $('.fa-caret-up').hide();
    $('.search-mobile').on('click', function () {
        if(!$(this).hasClass('current-up')){
            $('.left-sidebar').slideDown(500).fadeIn();
            $('.left-sidebar').css({'position':'absolute','top':'85px',
                'max-width':'80%','z-index':'1000','background-color':'#f3f3f3',
                'right':'15px'});
            $('.fa-caret-down').hide();
            $('.fa-caret-up').show();
            $(this).addClass('current-up');
        }else{
            $('.left-sidebar').slideUp(500).fadeOut();
            $('.fa-caret-down').show();
            $('.fa-caret-up').hide();
            $(this).removeClass('current-up');
        }

    });

    $(".selector").on({
        mouseenter: function () {
            //stuff to do on mouse enter
        },
        mouseleave: function () {
            //stuff to do on mouse leave
        }
    });
});