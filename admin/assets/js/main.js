$('.slider-three')
  .slick({
    centerMode: true,
    centerPadding: '60px',
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    width: '100vw',
    prevArrow: ".site-slider-three .slider-btn .prev",
    nextArrow: ".site-slider-three .slider-btn .next",
    responsive: [
      {
        breakpoint: 800,

        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]

  });

