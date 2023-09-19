define(['jquery'], function ($) {
    'use strict';

    return function (config, element) {
        $(element).find('.fa-star').on('click', function () {
            console.log('clicou na estrela');
            var rating = $(this).data('rating');
            $('#review_rating').val(rating);

            // Adicionar classe 'selected' para estrelas até a selecionada
            $(element).find('.fa-star').each(function (index) {
                if (index < rating) {
                    $(this).addClass('selected');
                } else {
                    $(this).removeClass('selected');
                }
            });
        });
    };
});
