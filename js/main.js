$(".header__mobile-menu").click(function(){
    $(".mobile-menu-hidden").toggleClass("mobile-menu-visible");
    $("body").toggleClass("body-another");
    $(".parallax-mirror").toggleClass("parallax-another");
});
$('.background__image').parallax({imageSrc: '../img/back-one.jpg', speed: 0.0009, positionY: 'bottom'});