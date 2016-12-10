$(document).ready(function () {
    $('#slider').nivoSlider({
        effect: 'fade',                 // Specify sets like: 'fold,fade,sliceDown'
        animSpeed: 500,                   // Slide transition speed
        pauseTime: 5000,                  // How long each slide will show
        startSlide: 0,                    // Set starting Slide (0 index)
        directionNav: false,               // Next & Prev navigation
        controlNav: true,                 // 1,2,3... navigation
        controlNavThumbs: false,          // Use thumbnails for Control Nav
        pauseOnHover: false,               // Stop animation while hovering
        manualAdvance: false,             // Force manual transitions
        prevText: '',                 // Prev directionNav text
        nextText: '',                 // Next directionNav text
        randomStart: false
    });
});