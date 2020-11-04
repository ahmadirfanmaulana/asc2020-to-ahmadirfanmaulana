const $ = jQuery;

$(document).ready(function () {
    $(window).scroll(function () {
       let scrollTop = $(window).scrollTop();

       if (scrollTop > 50) {
           $('#header').addClass('light');
       } else {
           $('#header').removeClass('light');
       }
    });

    $('#wrapper').delegate('a:not(.without-ajax)', 'click', function (e) {
        e.preventDefault();

        let href = $(this).attr('href');

        $('#loader .loader-wrapper').css({
            left: e.clientX,
            top: e.clientY,
        });

        window.history.pushState({href}, '', href);

        $('#loader').addClass('active');
        $.ajax({
            url: href,
            method: 'POST',
            data: {from_ajax: true},
            success: function (response) {
                $('#container').html(response);
                $(window).scrollTop(0);
                $('#loader .loader-wrapper').css({
                    left: '50%',
                    top: '50%',
                });
                setTimeout(() => {
                $('#loader').removeClass('active');
                }, 500);
            }
        })

    });
});