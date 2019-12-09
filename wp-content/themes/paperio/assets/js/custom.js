"use strict";

( function( $ ) {

    $(document).ready(function () {

        // Shrink nav on scroll
        $(window).scroll(function () {
            if( !$( 'header' ).hasClass( 'non-sticky-header' ) ) {
                if ($(window).scrollTop() > 10) {
                    $('header').addClass('shrink-nav');
                } else {
                    $('header').removeClass('shrink-nav');
                }
            }
        });


        /*==============================================================*/
        // Masonry - START CODE
        /*==============================================================*/

        var $grid = $('.masonry-listing').imagesLoaded(function () {
            $grid.masonry({
                itemSelector: '.masonry-item',
                columnWidth: '.masonry-item',
                percentPosition: true
            });
        });

        /*==============================================================*/
        // Masonry - END CODE
        /*==============================================================*/

        if( $(".navigation .page-numbers").hasClass("next") ){
            $(".navigation .page-numbers").prev("a.page-numbers:last").addClass("last-page");
        }else{
            $(".navigation .page-numbers:last").addClass("last-page");
        }

        /*==============================================================*/
        // Back To Top - START CODE
        /*==============================================================*/

        var btnFixed = '.btn-fixed-bottom';
        var btnToTopClass = '.back-to-top';

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $(btnFixed).fadeIn();
            } else {
                $(btnFixed).fadeOut();
            }
        });

        $(document).on( 'click', btnToTopClass, function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 1000);
            return false;
        });

        /*==============================================================*/
        // Back To Top - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Light Box - START CODE
        /*==============================================================*/

        var isMobile = false;
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            isMobile = true;
        }


        $('.post-popup-gallery').magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            gallery: {
                enabled: true
            },
            image: {
                titleSrc: function (item) {
                    if( item.el.attr( 'title' ) || item.el.attr( 'lightbox_caption' ) ){
                        var title, lightbox_caption = '';
                        if( item.el.attr('title') ){
                            title = item.el.attr('title');
                        }
                        if( item.el.attr('lightbox_caption') ){
                            lightbox_caption = '<span class="lightbox-popup-caption">'+item.el.attr( 'lightbox_caption' )+'</span>';
                        }
                        return title + lightbox_caption;
                    }
                }
            },
            // Remove close on popup bg
            callbacks: {
                open: function () {
                    $.magnificPopup.instance.close = function() {
                        if( !isMobile ){
                            $.magnificPopup.proto.close.call( this );
                        } else {
                            $(document).on('click', 'button.mfp-close', function () {
                                $.magnificPopup.proto.close.call( this );
                            });
                        }
                    }
                }
            }
        });

        /*==============================================================*/
        // Light Box - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Fit Video - START CODE
        /*==============================================================*/

        $(".fit-videos").fitVids();

        /*==============================================================*/
        // Fit Video - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Post Like Dislike Button JQuery - START CODE
        /*==============================================================*/
        $(document).on( 'click', '.sl-button', function () {
            var button = $(this);
            var post_id = button.attr('data-post-id');
            var security = button.attr('data-nonce');
            var iscomment = button.attr('data-iscomment');
            var allbuttons;
            if (iscomment === '1') { /* Comments can have same id */
                allbuttons = $('.sl-comment-button-' + post_id);
            } else {
                allbuttons = $('.sl-button-' + post_id);
            }
            var loader = allbuttons.next('#sl-loader');
            if (post_id !== '') {
                $.ajax({
                    type: 'POST',
                    url: simpleLikes.ajaxurl,
                    data: {
                        action: 'process_simple_like',
                        post_id: post_id,
                        nonce: security,
                        is_comment: iscomment
                    },
                    beforeSend: function () {
                        //loader.html('&nbsp;<div class="loader">Loading...</div>');
                    },
                    success: function (response) {
                        var icon = response.icon;
                        var count = response.count;
                        allbuttons.html(icon + '<span>' + count + '</span>');
                        if (response.status === 'unliked') {
                            var like_text = simpleLikes.like;
                            allbuttons.prop('title', like_text);
                            allbuttons.removeClass('liked');
                        } else {
                            var unlike_text = simpleLikes.unlike;
                            allbuttons.prop('title', unlike_text);
                            allbuttons.addClass('liked');
                        }
                        loader.empty();
                    }
                });

            }
            return false;
        });

        /*==============================================================*/
        // Post Like Dislike Button JQuery - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Comment Scroll  - START CODE
        /*==============================================================*/

        $(document).on('click', 'a.inner-link', function (e) {
            // Prevent a page reload when a link is pressed
            e.preventDefault(); 
            // Call the scroll function
            $( 'html,body' ).animate({
                scrollTop: $( '#respond' ).offset().top - 180 }, 'slow' );    
        });

        /*==============================================================*/
        // Comment Scroll  - END CODE
        /*==============================================================*/
        
        $( '.post-owl-slider-simple' ).owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            rtl: $( 'body' ).hasClass( 'rtl' ) ? true:false,
            autoplay: true,
            autoplayTimeout: 3000, //Set AutoPlay to 3 seconds   
            autoplayHoverPause: true,
            items: 1,
            navText: ['<span class="screen-reader-text">'+paperioajaxurl.paperio_previous_text+'</span><i class="fas fa-chevron-left"></i>', '<span class="screen-reader-text">'+paperioajaxurl.paperio_next_text+'</span><i class="fas fa-chevron-right"></i>']
        });

        var owlCarousel = $('.owl-carousel');
        setTimeout(function () {
            owlCarousel.each(function(index) {
                $(this).find('.owl-nav, .owl-dots').wrapAll("<div class='owl-controls'></div>");
            }); 
         }, 500);

        // Infinite Scroll jQuery
        var pagesNum = $("div.paperio-infinite-scroll").attr('data-pagination');

        paperio_separator();

        $('.infinite-scroll-pagination').infinitescroll({
            nextSelector: 'div.paperio-infinite-scroll .old-post a',
            loading: {
                img: paperioajaxurl.loading_image,
                msgText: '<div class="paging-loader" style="transform:scale(0.35);"><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div><div class="circle"><div></div></div></div>',
                finishedMsg: '<div class="finish-load">' + paperio_infinite_scroll_message.message + '</div>',
                speed: 'fast',
            },
            navSelector: 'div.paperio-infinite-scroll',
            contentSelector: '.infinite-scroll-pagination',
            itemSelector: '.infinite-scroll-pagination div.blog-single-post',
            maxPage: pagesNum,
        }, function (newElements) {
            /* For new element set masonry */
            var $newblogpost = $(newElements);
            var $grid = $('.masonry-listing').imagesLoaded(function () {
                $grid.masonry('appended', $newblogpost);
            });
            paperio_separator();
        });

        /*==============================================================*/
        // Comment Validation - START CODE
        /*==============================================================*/

        $(".paperio-comment-button").on("click", function () {
            var fields;
            fields = "";
            if ($(this).parent().parent().find('#author').length == 1) {
                if ($("#author").val().length == 0 || $("#author").val().value == '') {
                    fields = '1';
                    $("#author").addClass("inputerror");
                }
            }
            if ($(this).parent().parent().find('#comment').length == 1) {
                if ($("#comment").val().length == 0 || $("#comment").val().value == '') {
                    fields = '1';
                    $("#comment").addClass("inputerror");
                }
            }
            if ($(this).parent().parent().find('#email').length == 1) {
                if ($("#email").val().length == 0 || $("#email").val().length == '') {
                    fields = '1';
                    $("#email").addClass("inputerror");
                } else {
                    var re = new RegExp();
                    re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                    var sinput;
                    sinput = "";
                    sinput = $("#email").val();
                    if (!re.test(sinput)) {
                        fields = '1';
                        $("#email").addClass("inputerror");
                    }
                }
            }
            if (fields != "") {
                return false;
            } else {
                return true;
            }
        });

        /*==============================================================*/
        // Comment Validation - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Paperio Instagram Widget  - START CODE
        /*==============================================================*/

        var keys = Object.keys(window);
        for( var i in keys ) {
            if( keys[i].toLowerCase().indexOf("paperio_instagram_widget_") >= 0 ) {
                if (typeof window[keys[i]] != 'function') {
                    window[keys[i]].run();
                }
            }
        }

        /*==============================================================*/
        // Paperio Instagram Widget  - END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Paperio Default Menu  - START CODE
        /*==============================================================*/

        $(".paperio-default-menu > .page_item_has_children").each(function( index ) {
            if( $(this).hasClass('page_item_has_children') ) {
                $(this).find('a:first').before('<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>');
            }
        });

        $(".paperio-default-menu > .menu-item-has-children").each(function( index ) {
            if( $(this).hasClass('menu-item-has-children') && !$(this).hasClass('dropdown') ) {
                $(this).find('a:first').before('<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>');
            }
        });

        if( $(".menu-item-language ul").hasClass('submenu-languages') ) {
            $(".menu-item-language ul").prev().before('<a class="dropdown-caret-icon" data-toggle="dropdown"><i class="fas fa-caret-down"></i></a>');
        }

        /*==============================================================*/
        // Paperio Default Menu  - END CODE
        /*==============================================================*/

        function paperio_separator() {

            var setColumnType = $('.infinite-scroll-pagination').attr('data-column');
            $(".infinite-scroll-pagination > .page-separator").remove();
            var total = $('.infinite-scroll-pagination > .blog-single-post').length;
            var setColumnType = $('.infinite-scroll-pagination').attr('data-column');
            
            for (var i = 1; i < total; i++) {
                if (i % setColumnType == 0) {
                    var appendDiv = $('.page-separator-parent > .page-separator').clone(false);
                    var appendElement = $('.infinite-scroll-pagination').find('.blog-single-post:eq(' + (i - 1) + ')');
                    $(appendDiv).insertAfter(appendElement);
                }
            }
        }

        /*==============================================================*/
        // Header Image - START CODE
        /*==============================================================*/

        $('.header-img').each(function () {
            if ($(this).children('.header-background-img').length) {
                var imgSrc = $(this).children('.header-background-img').attr('src');
                $(this).css('background', 'url("' + imgSrc + '")');
                $(this).children('.header-background-img').remove();
            }

        });

        /*==============================================================*/
        // Header Image - END CODE
        /*==============================================================*/

        /*==============================================================*/
        //Contact Form Focus Remove Border- START CODE
        /*==============================================================*/

        $("form.wpcf7-form input").focus(function () {
            if ($(this).hasClass("wpcf7-not-valid")) {
                $(this).removeClass("wpcf7-not-valid");
                $(this).parent().find(".wpcf7-not-valid-tip").remove();
                $(this).parents('.wpcf7-form').find(".wpcf7-validation-errors").hide();
            }
        });

        /*==============================================================*/
        //Contact Form Focus Remove Border- END CODE
        /*==============================================================*/

        /*==============================================================*/
        // Add Mobile Menu Class- START CODE
        /*==============================================================*/

        function paperio_add_menu_class() {
            var windowsize = $(window).width();
            if( windowsize <= 991 ) {
                $('.navbar-collapse').addClass( 'mobile-tablet-submenu-bg' );
                if( $('.navbar-collapse').attr( 'data-menu-bg-color' ) ) {
                    $('.navbar-collapse').css( 'background', $('.navbar-collapse').attr( 'data-menu-bg-color' ) );
                }
            } else {
                $('.navbar-collapse').removeClass( 'mobile-tablet-submenu-bg' );
                $('.navbar-collapse').removeAttr( 'style' );
            }
        }

        /*==============================================================*/
        // Add Mobile Menu Class- END CODE
        /*==============================================================*/

        paperio_add_menu_class();

        $(window).resize(function () {
            paperio_add_menu_class();
        });

        $( '.paperio-input-focus-remove' ).on( 'focus', function(e){
            if( $( this ).hasClass( 'inputerror' ) ){
                $( this ).removeClass('inputerror');
            }
        });

    });

})( jQuery );