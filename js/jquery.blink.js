$.fn.blink = function (count) {
    var element = $(this);

    count = count - 1 || 0;
    // .animate( properties [, duration ] [, easing ] [, complete ] )
    element.animate({opacity: .25}, 100, function () {
        element.animate({opacity: 1}, 100, function () {
            if (count > 0) {
                element.blink(count);
            }
        });
    });
};