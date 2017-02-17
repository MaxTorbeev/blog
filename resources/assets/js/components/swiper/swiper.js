window.Swiper = require('swiper');

var blogPreviewSlider =  new Swiper('.hBlogImagesSlider', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    paginationType: 'progress'

});

var horizontalSlider =  new Swiper('.hSlider', {
    pagination: '.swiper-pagination',
    slidesPerView: 2,
    paginationClickable: true,
    //spaceBetween: 30,
    //freeMode: true
});