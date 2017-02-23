/**
 * Created by andrey on 13.02.17.
 */
$(function() {
    $('#slides').superslides({
        inherit_width_from: '.wide-container',
        inherit_height_from: '.wide-container'
    });
});
$(document).on("scroll", function() {

    if($(document).scrollTop()>600) {
        $("header").addClass("smaller");
    } else {
        $("header").removeClass("smaller");
    }

});
$('.hamburger').on('click', function(){
    if ($(this).hasClass('is-active')){
        $(this).removeClass('is-active');
        $('.main_menu').removeClass('active');
    }
    else{
        $(this).addClass('is-active');
        $('.main_menu').addClass('active');
    }

});
$(document).ready(function(){
    $('.photo').each(function(){
        var width = $(this).find('img').width();
        var image = $(this).find('.image-wrap');
        var hover = $(this).find('.hover-wrap');
        image.width(width);
        hover.width(width);
        console.log(width);
    })
})
$(window).resize(function(){
    $('.photo').each(function(){
        var width = $(this).find('img').width();
        var image = $(this).find('.image-wrap');
        var hover = $(this).find('.hover-wrap');
        image.width(width);
        hover.width(width);
        console.log(width);
    })
})