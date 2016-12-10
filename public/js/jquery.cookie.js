/**
 * jQuery Cookie plugin
 *
 * Copyright (c) 2010 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */
jQuery.cookie = function (key, value, options) {

    // key and at least value given, set cookie...
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || {};
    var result, decode = options.raw ? function (s) {
        return s;
    } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};


/**
 * $.include - script inclusion jQuery plugin
 * Based on idea from http://www.gnucitizen.org/projects/jquery-include/
 * @author Tobiasz Cudnik
 * @link http://meta20.net/.include_script_inclusion_jQuery_plugin
 * @license MIT
 */
// overload jquery's onDomReady
if (jQuery.browser.mozilla || jQuery.browser.opera) {
    document.removeEventListener("DOMContentLoaded", jQuery.ready, false);
    document.addEventListener("DOMContentLoaded", function () {
        jQuery.ready();
    }, false);
}
jQuery.event.remove(window, "load", jQuery.ready);
jQuery.event.add(window, "load", function () {
    jQuery.ready();
});
jQuery.extend({
    includeStates: {},
    include: function (url, callback, dependency) {
        if (typeof callback != 'function' && !dependency) {
            dependency = callback;
            callback = null;
        }
        url = url.replace('\n', '');
        jQuery.includeStates[url] = false;
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.onload = function () {
            jQuery.includeStates[url] = true;
            if (callback)
                callback.call(script);
        };
        script.onreadystatechange = function () {
            if (this.readyState != "complete" && this.readyState != "loaded") return;
            jQuery.includeStates[url] = true;
            if (callback)
                callback.call(script);
        };
        script.src = url;
        if (dependency) {
            if (dependency.constructor != Array)
                dependency = [dependency];
            setTimeout(function () {
                var valid = true;
                $.each(dependency, function (k, v) {
                    if (!v()) {
                        valid = false;
                        return false;
                    }
                })
                if (valid)
                    document.getElementsByTagName('head')[0].appendChild(script);
                else
                    setTimeout(arguments.callee, 10);
            }, 10);
        }
        else
            document.getElementsByTagName('head')[0].appendChild(script);
        return function () {
            return jQuery.includeStates[url];
        }
    },
    readyOld: jQuery.ready,
    ready: function () {
        if (jQuery.isReady) return;
        imReady = true;
        $.each(jQuery.includeStates, function (url, state) {
            if (!state)
                return imReady = false;
        });
        if (imReady) {
            jQuery.readyOld.apply(jQuery, arguments);
        } else {
            setTimeout(arguments.callee, 10);
        }
    }
});
