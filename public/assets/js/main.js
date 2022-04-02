

// $(window).on('load', () => {

//     $("#loading").fadeOut(1000);
//     $("#app").fadeIn(1000);
// });

$('.recommend-recipes-row').slick({
    centerMode: true,
    centerPadding: '14px',
    slidesToShow: 1,
    infinite: true,
    autoplay: true,
    swipe: true,
    speed: 700,
    arrows: false,

    cssEase: 'ease-in-out',
    responsive: [
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '14px',
                slidesToShow: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: false,
                centerMode: true,
                centerPadding: '20px',
                slidesToShow: 1
            }
        }
    ]
});

