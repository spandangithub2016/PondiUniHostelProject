function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();

    /*TODO : CRITICAL : CHANGE DOMAIN ON PRODUCTION*/
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/; domain=hostels.pu";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function setFontSizeFromCookie() {
    var fs = getCookie("accessibility-font-size");
    // Set Fonts and font-controls
    if (fs == "") {
        setCookie("accessibility-font-size", "0", (365*10));
    } else {
        if(parseInt(fs) < -1) {
            jQuery(".btn_font_decrease").attr("disabled", "disabled");
        } else {
            jQuery(".btn_font_decrease").removeAttr("disabled");
        }
        if(parseInt(fs) > 3) {
            jQuery(".btn_font_increase").attr("disabled", "disabled");
        } else {
            jQuery(".btn_font_increase").removeAttr("disabled");
        }
        if(parseInt(fs) == 0) {
            jQuery(".btn_font_restore").attr("disabled", "disabled");
        } else {
            jQuery(".btn_font_restore").removeAttr("disabled");
        }

        elements = document.querySelectorAll('[data-default-font-size]');
        for (var index in elements) if (elements.hasOwnProperty(index)) {
            defaultFontSize = elements[index].getAttribute('data-default-font-size');
            setFontSize = parseInt(defaultFontSize) + (parseInt(fs) * 2);
            elements[index].style.fontSize = setFontSize + "px";
        }
    }
}

function setColorSchemeFromCookie() {
    var cs = getCookie("accessibility-color-scheme");
    // Set color and color-controls
    if (cs == "") {
        setCookie("accessibility-color-scheme", "normal", (365*10));
    } else {
        jQuery('.color_controls .btn').each(function(){
            jQuery(this).removeClass("active");
        });
        jQuery('.color_controls .btn.btn_color_' + cs).addClass("active");
        jQuery('.color_controls .btn.btn_color_' + cs + " input").attr("checked", "checked");
        setColorScheme(cs);
    }
}

function setColorScheme(new_color_scheme) {
    elements = document.querySelectorAll('[data-color-class-setting]');
    for (var index in elements) if (elements.hasOwnProperty(index)) {
        old_color_class = jQuery(elements[index]).data('color-class-setting');

        new_color_class = jQuery(elements[index]).data('color-class-' + new_color_scheme);
        if(new_color_class == undefined || new_color_class == "") {
            // Set normals
            new_color_class = jQuery(elements[index]).data('color-class-normal');
        }
        if(old_color_class !== new_color_class) {
            if(old_color_class == undefined || old_color_class == "") {
                jQuery(elements[index]).addClass(new_color_class);
            } else {
                jQuery(elements[index]).removeClass(old_color_class);
                jQuery(elements[index]).addClass(new_color_class);
            }
        }
        jQuery(elements[index]).data('color-class-setting', new_color_class);
    }
    setCookie("accessibility-color-scheme", new_color_scheme, (365*10));
}

function checkCookie() {
    setFontSizeFromCookie();
    setColorSchemeFromCookie();
}

jQuery(document).ready(function() {

    // Setup accessbility controls from cookie
    checkCookie();

    // slimScroll setup
    jQuery('#notice-list').slimScroll({
        height: '350px'
    });
    jQuery('#news-list').slimScroll({
        height: '350px'
    });

    // Font Size Control
    //// Fontsize decrease
    jQuery(".btn_font_decrease").click(function() {
        currentFontScale = getCookie("accessibility-font-size");
        setCookie("accessibility-font-size", (parseInt(currentFontScale) - 1), (365*10));
        setFontSizeFromCookie();
    });
    //// Fontsize increase
    jQuery(".btn_font_increase").click(function() {
        currentFontScale = getCookie("accessibility-font-size");
        setCookie("accessibility-font-size", (parseInt(currentFontScale) + 1), (365*10));
        setFontSizeFromCookie()
    });
    //// Fontsize restore
    jQuery(".btn_font_restore").click(function() {
        currentFontScale = getCookie("accessibility-font-size");
        setCookie("accessibility-font-size", 0, (365*10));
        setFontSizeFromCookie()
    });

    // Color controls
    //// White On Black
    jQuery(".btn.btn_color_bw").click(function() {
        setColorScheme("bw");
    });
    jQuery(".btn.btn_color_wb").click(function() {
        setColorScheme("wb");
    });
    jQuery(".btn.btn_color_yb").click(function() {
        setColorScheme("yb");
    });
    jQuery(".btn.btn_color_normal").click(function() {
        setColorScheme("normal");
    });

    if(jQuery("#amenities-sidebar").length) {
        jQuery('body').scrollspy({
            target: '#amenities-sidebar',
            offset: 120,
        });
    }

    var shiftWindow = function() { scrollBy(0, -50) };
    window.addEventListener("hashchange", shiftWindow);
    function load() { if (window.location.hash) shiftWindow(); }
})
