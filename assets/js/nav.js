$(window).scroll(function () {
    $('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
    $('a').toggleClass('scrolled', $(this).scrollTop() > 50);
    $('img').toggleClass('scrolled', $(this).scrollTop() > 50);
})