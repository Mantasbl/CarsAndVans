$(document).ready(function() {
    $(".testimonial-carousel").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      autoplay: true,
      autoplaySpeed: 4000,
      prevArrow: $(".testimonial-carousel-controls .prev"),
      nextArrow: $(".testimonial-carousel-controls .next")
    });
  });
  