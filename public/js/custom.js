$(document).ready(function() {

    $('.counter').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 10000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    $('#categories').on('change', function() {
        $('div[class*="_subcategory"]').not('div[class*="d-none"]').addClass("d-none");
        if(!$("."+this.value+"_subcategory").length)
        {
            if(!$("#subcategoriesGroup").hasClass("d-none"))
                $("#subcategoriesGroup").addClass("d-none");
            return;
        }
        $("."+this.value+"_subcategory").removeClass("d-none");
        $("#subcategoriesGroup").removeClass("d-none");
    });

    $('.init-periods').on('click', function() {
        if(this.id == "contPeriod" && !$("#initPeriodDates").hasClass("d-none"))
        {
            $("#initPeriodDates").addClass("d-none");
            return;
        }
        else if(this.id == "specificPeriod")
        {
            $("#initPeriodDates").removeClass("d-none");
        }
    });
    
});

// var fixmeTop = $('#section-achiev').offset().top;

// $(window).scroll(function() {                  

//     var currentScroll = $(window).scrollTop(); 

//     if (currentScroll >= fixmeTop) {           
//         $('.counter').each(function () {
//             $(this).prop('Counter',0).animate({
//                 Counter: $(this).text()
//             }, {
//                 duration: 4000,
//                 easing: 'swing',
//                 step: function (now) {
//                     $(this).text(Math.ceil(now));
//                 }
//             });
//         });
//     }
// });

