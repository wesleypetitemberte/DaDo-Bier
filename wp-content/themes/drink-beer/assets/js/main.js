"use strict";

(function () {
    let main = {
        init: function () {
            restaurants.init();
        },
    };

    let restaurants = {
        init: function () {
            console.log("restaurants");
            $(document).ready(function () {
                $(".restaurants .slider").slick({
                    prevArrow:
                        '<img class="arrow-left" src="wp-content/themes/drink-beer/dist/img/chevron_right.png" alt="Seta Esquerda">',
                    nextArrow:
                        '<img class="arrow-rigth" src="wp-content/themes/drink-beer/dist/img/chevron_right.png" alt="Seta Direita">',
                    dots: true,
                });
            });
        },
    };

    main.init();
})();
