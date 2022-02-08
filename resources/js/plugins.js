import Swiper, { Navigation, Pagination } from 'swiper'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

import { Fancybox } from '@fancyapps/ui'

(function($) {
    'use strict'

    // configure Swiper to use modules
    Swiper.use([Navigation, Pagination])

    var swiper = new Swiper('.slideHome', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    })

    var carousel = new Swiper('.carrosselEmpreendimentos', {
        loop: true,
        spaceBetween: 20,
        slidesPerView: 3,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            450: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1300: {
                slidesPerView: 3,
                spaceBetween: 20
            }
        }
    })

    var carrosselEmpreendimento = new Swiper('.carrosselEmpreendimento', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
    })





    // Mask
    $('.cep').mask('00000-000');
    $('.cpf').mask('000.000.000-00', { reverse: true });
    $('.data').mask('00/00/0000');

    $('.telefone').focusout(function() {
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if (phone.length > 10) {
            element.mask("(99) 99999-9999");
        } else {
            element.mask("(99) 9999-99999");
        }
    }).trigger('focusout');


})(jQuery, window, document)