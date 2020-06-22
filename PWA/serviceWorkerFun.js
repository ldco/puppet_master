/*jshint esversion: 6 */
"use strict";
document.addEventListener("DOMContentLoaded", initFun);

function initFun() {
    SW();
}

//service worker
function SW() {

    if ("serviceWorker" in navigator) {
        navigator.serviceWorker.register('sw.js').then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ', registration.scope);
        }, function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });
    }
}