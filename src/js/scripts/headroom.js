'use strict';

var Headroom = require('headroom');

module.exports = function() {

    var myElement = document.querySelector('._global-header');
    var headroom = new Headroom(myElement, {
        "tolerance": 0,
        "offset": 720,
        "classes": {
            "initial": "headroom",
            "pinned": "headroom--pinned",
            "unpinned": "headroom--unpinned",
            "top": "headroom--top",
            "notTop": "headroom--not-top"
        }
    });
    headroom.init();

};