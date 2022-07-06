// https://www.kunkalabs.com/mixitup/docs/get-started/
import mixitup from 'mixitup';

$( document ).ready(function() {

    var initialFilter = 'all';
    var hash = window.location.hash.replace(/^#/g, '');

    if (hash) {
        initialFilter = '.' + hash;
    }

    if ($('.mixit--filter').length) {
        var mixer = mixitup(".mixit--filter", {
            animation: {
                animateResizeTargets: true,
                duration: 550,
                nudge: true,
                reverseOut: false,
                effects: "fade scale(0.01) translateZ(-100px)"
            },
            selectors: {
                control: '.mixitup-control'
            },
            load: {
                filter: initialFilter
            }
        });
    }
});
