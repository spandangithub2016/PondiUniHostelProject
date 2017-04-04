jQuery(document).ready(function() {
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": jQuery("#panorama").data('url'),
        "title": jQuery("#panorama").data('title'),
        "compass": true,
    });
});

// pannellum.viewer('panorama', {
//     "type": "equirectangular",
//     "panorama": "https://pannellum.org/images/alma.jpg"
// });
