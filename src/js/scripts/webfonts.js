'use strict';

var fontFamilies = ['Playfair+Display:400,700', 'Raleway:300,600'];

module.exports = function() {
    window.WebFontConfig = {
        google: {families: fontFamilies}
    };
    (function () {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
};