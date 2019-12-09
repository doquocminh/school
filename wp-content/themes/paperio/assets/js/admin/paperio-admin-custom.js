!function($) {
	"use strict";

    /* For Mega Menu*/
    $( document ).ready(function() {
      
        // show or hide megamenu fields on parent and child list items
        paperio_menu_item_mouseup_event();
        paperio_megamenu_status_update();
        paperio_update_megamenu_field_classes();
        
        /* On mouseup event check megamenu status and add class or remove class */
        function paperio_menu_item_mouseup_event(){
            $( document ).on( 'mouseup', '.menu-item-bar', function( event, ui ) {
                if( ! $( event.target ).is( 'a' )) {
                    setTimeout( paperio_update_megamenu_field_classes, 300 );
                }
            });
        }
          
        /* Check if Mega Menu is enable for parent */
        function paperio_megamenu_status_update(){

            var parent_li_item = $( '#locations-paperiomegamenu' ).parents().find('.paperio-admin-mega-menu-init');

            if( $( '#locations-paperiomegamenu' ).val() == 0 ){
                setTimeout(function(){  
                    $('.paperio-admin-mega-menu-init').css("display","none")
                }, 10000);
            }
            if( $( '#locations-paperiomegamenu' ).is( ':checked' ) ) {
                parent_li_item.css("display","block");
            } else  {
                parent_li_item.css("display","none");
            }

            $( document ).on( 'click', '#locations-paperiomegamenu', function() {
                var parent_li_item = $( this ).parents().find('.paperio-admin-mega-menu-init');

                if( $( this ).is( ':checked' ) ) {
                    parent_li_item.css("display","block");
                } else  {
                    parent_li_item.css("display","none");
                }
            });

            $( document ).on( 'click', '.edit-menu-item-paperio-mega-menu-item-status', function() {
              
                var parent_li_item = $( this ).parents( 'li.menu-item:eq( 0 )' );

                if( $( this ).is( ':checked' ) ) {
                    parent_li_item.addClass( 'paperio-megamenu-active' );
                } else 	{
                    parent_li_item.removeClass( 'paperio-megamenu-active' );
                }
                paperio_update_megamenu_field_classes();
            });
        }

        /* Addd Mobile Menu BG Class in Tablet */
        $( document ).on( 'click', '.preview-tablet', function() {
            $('.navbar-collapse').addClass('mobile-tablet-submenu-bg');
        });

        /* Addd Mobile Menu BG Class Mobile */
        $( document ).on( 'click', '.preview-mobile', function() {
          $('.navbar-collapse').addClass('mobile-tablet-submenu-bg');
        });

        /* Remove Mobile Menu BG Class In Desktop */
        $( document ).on( 'click', '.preview-desktop', function() {
          $('.navbar-collapse').removeClass('mobile-tablet-submenu-bg');
        });
        
        /* Check onload which menu is checked and add class "paperio-megamenu-active" */
        function paperio_update_megamenu_field_classes(){
            var paperio_menu_li_items = $( '.menu-item');
            
            paperio_menu_li_items.each( function( i ) 	{
                var paperio_megamenu_status = $( '.edit-menu-item-paperio-mega-menu-item-status', this );
                
                if( ! $( this ).is( '.menu-item-depth-0' ) ) {
                    var check_item = paperio_menu_li_items.filter( ':eq(' + (i-1) + ')' );

                    if( check_item.is( '.paperio-megamenu-active' ) ) {
                        paperio_megamenu_status.attr( 'checked', 'checked' );
                        $( this ).addClass( 'paperio-megamenu-active' );
                    } else {
                        paperio_megamenu_status.attr( 'checked', '' );
                        $( this ).removeClass( 'paperio-megamenu-active' );
                    }
                } else {
                    if( paperio_megamenu_status.attr( 'checked' ) ) {
                        $( this ).addClass( 'paperio-megamenu-active' );
                    }
                }
            });
        }


        /* Customizer image selector */
        $( ".paperio-image-select img" ).on( "click", function() {
            var current_click = $(this);
            current_click.parent().parent().parent().find('.active').removeClass('active');
            current_click.parent().parent().addClass('active');
        });

        /* jQuery For Instagram Widget */
        $(document).on('change','.instagram-style-type select',function(){
            var Current = $(this);
            var SelectedValue = $(this).val();
            Current.parent().parent().find('.instagram-select-option').hide();
            $('.instagram-'+SelectedValue+'-option').show();
        });

        /* jQuery Enable Click Event For Switch in customizer */
        $('.paperio-switch-option .tz-switch-option').on( 'click', function(){
            var currentParent = $(this).parent();
            var currentParents = $(this).parent().parent();
            currentParent.find('.active').removeClass('active');
            $(this).addClass('active');
        });

        /******************* Start Import Script *********************************/

        var stop_ajax_request = false;
        var ajax_call_count = 0;
        var import_completed = false;
        var ajax_import_error = false;

        // Ajax paperio log function to show messages
        var paperio_import_log = function(msg) {
            $('.import-ajax-message').append(msg);
            $('.import-ajax-message').animate({"scrollTop": $('.import-ajax-message')[0].scrollHeight}, "fast");
        }

        var refresh_ajax_call_to_import_log = function() {
            
            ajax_call_count++;
            
            if (stop_ajax_request) {
                return;
            }
            
            // Stop Ajax clall After 700Sec.
            if (ajax_call_count > 700) {
                paperio_import_log('Import doesn\'t respond.');
                return;
            }
            
            // Ajax For Refresh Log
            $.ajax({
                url: ajaxurl,
                data: {
                    action : 'paperio_refresh_import_log'
                },
                success:function(data) {
                    
                    if (data.search("ERROR") != -1) {
                        ajax_import_error = true;
                    }
                    
                    $('.import-ajax-message').html(data);
                    $('.import-ajax-message').animate({"scrollTop": $('.import-ajax-message')[0].scrollHeight}, "fast");
                    
                    // Add Error Message In Log
                    if (ajax_import_error) {
                        stop_ajax_request = true;
                        paperio_import_log('Import error!');
                        return;
                    }
                    
                    // Add Completed Message In Log
                    if (import_completed) {
                        stop_ajax_request = true;
                        paperio_import_log('<p>Import Done.</p>');
                        window.location.href = window.location.href + "&show-message=true";
                        return;
                    }
                },
                error: function(errorThrown) {
                    console.log(errorThrown);
                }
            }).done( function() { 
                
                setTimeout( refresh_ajax_call_to_import_log , 1000) 
            } );
        }

        /* Paperio import data script */
        $('.paperio-import').on('click', function(e) {
            e.preventDefault();
            var ImportThis = $(this);
            ImportThis.parent().find('.import-loader-img').addClass('active');
            var setup_key = ImportThis.attr('data-demo-import');
            //alert(setup_key);
           $('#paperio_demo_setup_key').val(setup_key);
            $('.paperio-import-data-popup').show();
        });

        //Paperio check all posts while checked all content
        $('.paperio-checkbox-all').on('change', function() {
            $(".paperio-checkbox").prop('checked', $(this).prop("checked"));
        });

        //Paperio change all content based on checked individual checkbox
        $('.paperio-checkbox').on('click', function() {

            if($(".paperio-checkbox").length == $(".paperio-checkbox:checked").length) {
                $(".paperio-checkbox-all").prop("checked", true);
            } else {
                $(".paperio-checkbox-all").prop("checked", false);
            }

        });

        $('#paperio_demo_setup_submit').on('click', function(e) {
            e.preventDefault();

            var loading_img = $('.import-loader-img.active');

            var import_messages = $('.import-ajax-message');

            import_messages.empty();

            var message = confirm('Are you sure you want to proceed? Please note that your existing data will be replaced.');
            
            if( message == true && $(".paperio-checkbox:checked").length > 0 && $('#paperio_demo_setup_key').val() != '' ) {

                $('.demo-show-message').hide();
                $('.paperio-import-data-popup').hide();
                $('.paperio-import').attr('disabled', true);
                loading_img.show();
                import_messages.show();
                
                var importOptions = [];
                var setupKey = $('#paperio_demo_setup_key').val();
             
                $(".paperio-checkbox:checked").each(function(key, option) {
                    importOptions.push($( option ).val());
                });

                var data = {
                    action: 'paperio_import_sample_data',
                    setup_key: setupKey,
                    import_options: importOptions
                };

                $('.paperio-importer-notice').hide();

                var request = $.ajax({
                  url: ajaxurl,
                  type: "POST",
                  data: data
                });

                request.success(function(msg) {
                  
                    import_completed = true;
                    loading_img.hide();
                    $('.paperio-import').attr('disabled', false);
                    $('.paperio-import-data-popup').hide();
                   
                });

                request.fail(function(jqXHR, textStatus) {
                    alert( "Request failed: " + textStatus );
                    $('.paperio-import').attr('disabled', false);
                });
                setTimeout(function(){  
                    $('html, body').animate({
                        scrollTop: $('.import-ajax-message').offset().top - 50
                    }, 2000);
                }, 1000);
                setTimeout( refresh_ajax_call_to_import_log , 1000);
            }
        });

        //----- OPEN
        $('[data-popup-open]').on('click', function(e)  {
            var targeted_setup_key = $(this).attr('data-demo-import');
            $('.paperio-demo-option-name').text(targeted_setup_key + ' ');
            var targeted_popup_class = $(this).attr('data-popup-open');
            $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

            e.preventDefault();
        });

        //----- CLOSE
        $('[data-popup-close]').on('click', function(e)  {
            var targeted_popup_class = $(this).attr('data-popup-close');
            $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);
            $('.import-loader-img.active').removeClass("active");
            e.preventDefault();
        });

    /******************* End Import Script *********************************/

    /* Paperio Licence - START CODE */

    $( '.paperio-licence' ).on( 'click', function(e) {
        e.preventDefault();

        if( $( this ).attr( 'disabled' ) ){
            return false;
        }

        var currentVar = $(this);
        currentVar.parent().find( 'img' ).css( 'display', 'inline-block' );
        var data = {
            action: 'paperio_active_theme_licence',
        };

        var request = $.getJSON({
            url: ajaxurl,
            type: "POST",
            data: data
        });
        request.success(function(response) {
            response && response.status ? window.location = response.url : alert( paperio_licence_messages.response_failed );
        });

        request.fail(function(jqXHR, textStatus) {
            alert( 'Request failed: ' + textStatus );
        });

    });

    /* Paperio Licence - END CODE */

    /* Hide Licence Activation Message Cookie - START CODE */

    var PaperioSetCookie = function ( c_name, value, exdays ) {
        var exdate = new Date();
        exdate.setDate( exdate.getDate() + exdays );
        var c_value = encodeURIComponent( value ) + ((null === exdays) ? "" : "; expires=" + exdate.toUTCString());
        document.cookie = c_name + "=" + c_value;
    };
    $( document ).on( 'click', '.paperio-license-activation-message .notice-dismiss', function( event ) {
        event.preventDefault();
        PaperioSetCookie( 'paperio_hide_activation_message', 'hide', 30 );
    } );

    /* Hide Licence Activation Message Cookie - END CODE */

    /* Paperio Customizer Control For Multiple Checkbox Start */

    $( '.customize-control-paperio_checkbox_multiple input[type="checkbox"]' ).on( 'change', function() {

        var checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map( 
            function() {
                return this.value;
            }
        ).get().join( ',' );

        $( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
    });

    /* Paperio Customizer Control For Multiple Checkbox End */

    /* Add Customizer Control Custom Sidebars */ 

    if($('#paperio_field_add_sidebar').length >0){
        var current_val = $('#paperio_field_add_sidebar').find('input[type=hidden]').val();      
        if(current_val != ''){
            var count = current_val.split(",").length;            
            for(var i=0;i<count;i++){
                $('.add-custom-text-box').append('<li><input type="text" class="add-text-input" value="'+current_val.split(",")[i]+'"><input type="button" class="remove-text-box" value="Remove"></li>');
            }
        }
    }
    $( document ).on( 'click', '.add_more_sidebar', function() {     
        $('.add-custom-text-box').append('<li><input type="text" class="add-text-input"><input type="button" class="remove-text-box" value="'+paperioadmin.remove_button_text+'"></li>');
    });
    
    $('.add-text-input').live('keyup',function(){
        display();
    });

    $('.remove-text-box').live('click',function(){
        $(this).parent().remove();
        display();  
    });
    function display(){
        var array = [];
        if($('.add-custom-text-box li').length >0){                
            $('.add-text-input').each(function(index){
                array.push($(this).val());
                $(this).parents('#customize-control-paperio_custom_sidebars').find('input[type=hidden]').val(array).trigger("change");
            });
        }
        else{
            wp.customize.value('paperio_custom_sidebars')('');
        }
    }

    /* End Add Customizer Control Custom Sidebars */ 

    });
}(window.jQuery);