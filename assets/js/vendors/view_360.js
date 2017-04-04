jQuery(document).ready(function() {
    pannellum.viewer('panorama', {
        "type": "equirectangular",
        "panorama": jQuery("#panorama").data('url'),
        "title": "360 Degree panorama of " + jQuery("#panorama").data('title'),
        "compass": true,
        "hfov" : 200,
        "autoRotate": 10,
        "autoRotateInactivityDelay": 10000,
        "preview": jQuery("#panorama").data('preview-url'),
        "autoLoad": true,
    });
});

// pannellum.viewer('panorama', {
//     "type": "equirectangular",
//     "panorama": "https://pannellum.org/images/alma.jpg"
// });
