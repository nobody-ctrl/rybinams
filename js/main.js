$(".header__mobile-menu").click(function(){
    $(".mobile-menu-hidden").toggleClass("mobile-menu-visible");
    $("body").toggleClass("body-another");
    $(".parallax-mirror").toggleClass("parallax-another");
});