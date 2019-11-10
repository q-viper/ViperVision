jQuery(document).ready(function($) {

/*------------------------------------------------
                LOADER
------------------------------------------------*/

 $('#loader').fadeOut();
 $('#loader-container').fadeOut();

/*------------------------------------------------
                MENU ACTIVE AND STICKY
------------------------------------------------*/

$('.main-navigation ul li').click(function() {
    $('.main-navigation ul li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
});

$('.menu-toggle').click(function() { 
    $('.main-navigation').toggleClass('menu-open');
});

/*$(window).scroll(function() {    
    var scroll = $(window).scrollTop();  
    if (scroll >= 1) {
        $(".site-header.sticky-menu").addClass("is-sticky");
    }
    else {
        $(".site-header.sticky-menu").removeClass("is-sticky");
    }
});*/

/*------------------------------------------------
                END MENU ACTIVE
------------------------------------------------*/

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

$(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
        $('.backtotop').css({bottom:"25px"});
    } 
    else {
        $('.backtotop').css({bottom:"-100px"});
    }
});

$('.backtotop').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
});

/*------------------------------------------------
                END BACK TO TOP
------------------------------------------------*/

/*------------------------------------------------
                FEATURED MUSIC
------------------------------------------------*/
function parallax(){
    var scrolled = $(window).scrollTop();
    $('.parallax-background').css('top', -(scrolled * 0.2) + 'px');
}
$(window).scroll(function(e){
    parallax();
});

/*------------------------------------------------
                SLICK SLIDER
------------------------------------------------*/
var $a = $('#videos-slider .regular').data('effect');
var $b = $('#main-slider').data('effect');
var $c = $('.widget_featured_videos').data('effect');

$('#main-slider').slick({
    cssEase: $b
});
$("#videos-slider .regular").slick({
    cssEase: $a,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
$('.widget_featured_videos .regular').slick({
    cssEase: $c
});

/*------------------------------------------------
                END SLICK SLIDER
------------------------------------------------*/

/*------------------------------------------------
                TABS
------------------------------------------------*/
$(".browse-videos .tabs-menu a").click(function(event) {
    event.preventDefault();
    $(this).parent().addClass("active");
    $(this).parent().siblings().removeClass("active");
    var tab = $(this).attr("href");
    $(".browse-videos .tab-content").not(tab).css("display", "none");
    $(tab).fadeIn();
});
$(".videos-list-wrapper .tabs-menu a").click(function(event) {
    event.preventDefault();
    $(this).parent().addClass("active");
    $(this).parent().siblings().removeClass("active");
    var tab = $(this).attr("href");
    $(".videos-list-wrapper .tab-content").not(tab).css("display", "none");
    $(tab).fadeIn();
});
/*------------------------------------------------
                PRETTYPHOTO
------------------------------------------------*/

if ($().prettyPhoto) {
    $("a[data-gal^='prettyPhoto']").prettyPhoto({
        theme: 'dark_square'
    });
}

/*------------------------------------------------
                END PRETTYPHOTO
------------------------------------------------*/

/*------------------------------------------------
                MAGNIFIC POPUP
------------------------------------------------*/

$('.gallery-popup').magnificPopup( {
    delegate:'.popup', type:'image', tLoading:'Loading image #%curr%...', 
    mainClass:'mfp-img-mobile', 
    gallery: {
        enabled: true, navigateByImgClick: true, preload: [0, 1]
    }
    , image: {
        tError:'<a href="%url%">The image #%curr%</a> could not be loaded.', titleSrc:function(item) {
            return item.el.attr('title');
        }
    }
    , zoom: {
        enabled:true, duration:400, opener:function(element) {
            return element.find('img');
        }
    }
});

/*--------------------------------------------------------
                COLOR, BOXED LAYOUT AND FONT SWITCHER
----------------------------------------------------------*/
$('.color-switcher .switch-colors li').click(function(){
    $('.color-switcher .switch-colors li').removeClass('active');
    $(this).addClass('active');
});

$("#green" ).click(function(){
    $("#color" ).attr("href", "assets/css/green.css");
});

$("#yellow" ).click(function(){
    $("#color" ).attr("href", "assets/css/yellow.css");
});

$("#black" ).click(function(){
    $("#color" ).attr("href", "assets/css/black.css");
});

$("#blue" ).click(function(){
    $("#color" ).attr("href", "assets/css/blue.css");
});

$("#red" ).click(function(){
    $("#color" ).attr("href", "assets/css/red.css");
});

$(".picker_close").click(function(){  
    $("#choose_color").toggleClass("position");
});

$('.boxed').click(function() {
    $('body').addClass('boxed');
});

$('.wide').click(function() {
    $('body').removeClass('boxed');
    $('body').addClass('wide');
});


$('.font-family li').click(function() {
    $('.font-family li').removeClass('active');
    $(this).addClass('active');
});

$('.header-font-1').click(function() {
    if  ($('body').hasClass('header-font-2') || 
        $('body').hasClass('header-font-3') ||
        $('body').hasClass('header-font-4') || 
        $('body').hasClass('header-font-5'))
    {
        $('body').removeClass('header-font-2 header-font-3 header-font-4 header-font-5');
    }
    $('body').addClass('header-font-1');
});
$('.header-font-2').click(function() {
    if  ($('body').hasClass('header-font-1') || 
        $('body').hasClass('header-font-3') ||
        $('body').hasClass('header-font-4') || 
        $('body').hasClass('header-font-5'))
    {
        $('body').removeClass('header-font-1 header-font-3 header-font-4 header-font-5');
    }
    $('body').addClass('header-font-2');
});
$('.header-font-3').click(function() {
    if  ($('body').hasClass('header-font-1') || 
        $('body').hasClass('header-font-2') ||
        $('body').hasClass('header-font-4') || 
        $('body').hasClass('header-font-5'))
    {
        $('body').removeClass('header-font-1 header-font-2 header-font-4 header-font-5');
    }
    $('body').addClass('header-font-3');
});
$('.header-font-4').click(function() {
    if  ($('body').hasClass('header-font-1') || 
        $('body').hasClass('header-font-2') ||
        $('body').hasClass('header-font-3') || 
        $('body').hasClass('header-font-5'))
    {
        $('body').removeClass('header-font-1 header-font-2 header-font-3 header-font-5');
    }
    $('body').addClass('header-font-4');
});
$('.header-font-5').click(function() {
    if  ($('body').hasClass('header-font-1') || 
        $('body').hasClass('header-font-2') ||
        $('body').hasClass('header-font-3') || 
        $('body').hasClass('header-font-4'))
    {
        $('body').removeClass('header-font-1 header-font-2 header-font-3 header-font-4');
    }
    $('body').addClass('header-font-5');
});

$('.body-font-1').click(function() {
    if  ($('body').hasClass('body-font-2') || 
        $('body').hasClass('body-font-3') ||
        $('body').hasClass('body-font-4') || 
        $('body').hasClass('body-font-5'))
    {
        $('body').removeClass('body-font-1 body-font-2 body-font-3 body-font-4');
    }
    $('body').addClass('body-font-1');
});
$('.body-font-2').click(function() {
    if  ($('body').hasClass('body-font-1') || 
        $('body').hasClass('body-font-3') ||
        $('body').hasClass('body-font-4') || 
        $('body').hasClass('body-font-5'))
    {
        $('body').removeClass('body-font-1 body-font-3 body-font-4 body-font-5');
    }
    $('body').addClass('body-font-2');
});
$('.body-font-3').click(function() {
    if  ($('body').hasClass('body-font-1') || 
        $('body').hasClass('body-font-2') ||
        $('body').hasClass('body-font-4') || 
        $('body').hasClass('body-font-5'))
    {
        $('body').removeClass('body-font-1 body-font-2 body-font-4 body-font-5');
    }
    $('body').addClass('body-font-3');
});
$('.body-font-4').click(function() {
    if  ($('body').hasClass('body-font-1') || 
        $('body').hasClass('body-font-2') ||
        $('body').hasClass('body-font-3') || 
        $('body').hasClass('body-font-5'))
    {
        $('body').removeClass('body-font-1 body-font-2 body-font-3 body-font-5');
    }
    $('body').addClass('body-font-4');
});
$('.body-font-5').click(function() {
    if  ($('body').hasClass('body-font-1') || 
        $('body').hasClass('body-font-2') ||
        $('body').hasClass('body-font-3') || 
        $('body').hasClass('body-font-4'))
    {
        $('body').removeClass('body-font-1 body-font-2 body-font-3 body-font-4');
    }
    $('body').addClass('body-font-5');
});

/*--------------------------------------------------------------------
                END COLOR, BOXED LAYOUT AND FONT SWITCHER
---------------------------------------------------------------------*/



});

/*------------------------------------------------
            END JQUERY
------------------------------------------------*/



