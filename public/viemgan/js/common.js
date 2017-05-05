$(document).ready(function () {
    closeHotline('#close-hotline');
    clickChangeVideo('.video-group a', ".video-group .data");
    clickShowPopupVideo('.thumb-video a', '.popup-video');
    menu('.open-main-nav');
    bannerAdsSide();
    changeContentTab('.tab-pro a', '.des-pro .tab-content');
    changeContentTab('.tabs .tab');
    $("#slider-2").owlCarousel({
        navigation: true,
        pagination: true,
        autoPlay: true,
        autoPlaySpeed: 2000,
        responsive: true,
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [980, 3],
        itemsTablet: [768, 2],
        itemsMobile: [479, 1]
    });

    var e = $("#sidebar").offset().top + $("#sidebar").height()+100;
    $(window).scroll(function () {
        var o = $(window).scrollTop();
        e <= o ? $("#sidebar").addClass("fixed") : $("#sidebar").removeClass("fixed");
    });
    $(".hide-form-phone").on("click", function (n) {
        n.preventDefault(), $(".show-form-phone").show();
    }), $(".show-form-phone h4").on("click", function (n) {
        n.preventDefault(), $(".show-form-phone").hide();
    });
});
$(".parentMenu>a").on('click', function () {
    var parentMenu = $(this).parent();
    parentMenu.find('.submenu').toggle();
});
function bannerAdsSide() {
    var $banner = $('.banner-ads'), $window = $(window);
    var $topDefault = parseFloat($banner.css('top'), 10);
    $window.on('scroll', function () {
        var $top = $(this).scrollTop();
        $banner.stop().animate({top: $top + $topDefault}, 100, 'easeOutCirc');
    });
}
function clickChangeVideo(btnClick, posShowvideo) {
    $(btnClick).off('click');
    $(btnClick).click(function () {
        var src = $(this).data('src');
        $(posShowvideo).find('iframe').attr('src', src);
    });
}
function clickShowPopupVideo(btnClick, popupName) {
    $(btnClick).off('click');
    $(btnClick).click(function () {
        var src = $(this).data('src');
        $(popupName).fadeIn();
        $(popupName).find('iframe').attr('src', src);
        $(".close-popup").click(function () {
            $(popupName).fadeOut();
        });
    });
}
function changeContentTab(btnClick, tabContent) {
    $(btnClick).click(function () {
        var content = $(this).data('content');
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(content).siblings().removeClass('active');
        $(content).addClass('active');
    });
}
function menu(btnClick) {
    $(btnClick).off('click');
    var click = 0;
    $(btnClick).click(function () {
        var menu = $(this).data('menu');
        if (click == 0) {
            $(menu).addClass('transX0');
            $(this).css({'background': 'url("http://www.duoclieutuelinh.vn/frontend/images/menu-close.png")'});
            click++;
        } else {
            $(menu).removeClass('transX0');
            $(this).css({'background': 'url("http://www.duoclieutuelinh.vn/frontend/images/menu-open.png")'});
            click--;
        }
    });
}
function closeHotline(btnClick) {
    var click = 0;
    $(btnClick).click(function () {
        var menu = $(this).data('close');
        if (click == 0) {
            $(menu).addClass('transY94');
            click++;
        } else {
            $(menu).removeClass('transY94');
            click--;
        }
    });
}
function notify(message) {
    $('body').append("<div class='popup px'><div class='popup-content'><a href='javascript:void(0)' class='close-popup' title='Đóng lại'>X</a><div class='message'></div></div></div>");
    $(".popup").fadeIn();
    $(".message").html(message);
    $('.close-popup').click(function () {
        $(".popup").fadeOut();
    });
}
function login() {
    $(".popup-dn").fadeIn();
    $(".close-popup").click(function () {
        $(".popup-dn").fadeOut();
    });
    $(".popup-dn .btn-dk").click(function () {
        $(".popup-dn").fadeOut();
        $(".popup-dk").fadeIn();
        $(".popup-dk .close-popup").click(function () {
            $(".popup-dk").fadeOut();
        });
    });
}
function register() {
    $(".popup-dk").fadeIn();
    $(".close-popup").click(function () {
        $(".popup-dk").fadeOut();
    });
}