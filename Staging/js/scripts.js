/* TOGGLE PARA EL MENU RESPONSIVE */
$(document).ready(function(){
  $(".toggle").click(function(){
     $("#mainNav .menu").slideToggle(400, function(){
         $(this).toggleClass("mobile");
         $(this).css("display", "");
     });
  });
  $(".toggleusermenu").click(function(){
     $("#mainNav .usermenu").slideToggle(400, function(){
         $(this).toggleClass("mobile");
         $(this).css("display", "");
     });
  });
});


/* SETTINGS PARA EL SLIDER DE PRODUCTOS DESEADOS */
$(document).ready(function() {
    $(".deseados-slider").slick({
        infinite: true,
        arrows: true,
        dots: false,
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        mobileFirst:true,
        responsive: [
        {
          breakpoint: 400,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 3
          }
        }
      ]
    });
});
