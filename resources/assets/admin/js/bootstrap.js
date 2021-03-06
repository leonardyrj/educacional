/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
    window.PNotify = require('pnotify');
    require('pnotify/src/pnotify.buttons');
    require('pnotify/src/pnotify.confirm');
} catch (e) {}
