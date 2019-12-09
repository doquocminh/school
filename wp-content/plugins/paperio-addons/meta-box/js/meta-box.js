!function($) {

	$( document ).ready( function(){
	"use strict";

		/* Metabox Image Upload Button Click*/

		$('.paperio_upload_button').click(function (event) {
	        var file_frame;
		  	var button = $(this);

		    var button_parent = $(this).parent();
			var id = button.attr('id').replace('_button', '');
		    event.preventDefault();
		    

		    // If the media frame already exists, reopen it.
		    if ( file_frame ) {
		      file_frame.open();
		      return;
		    }

		    // Create the media frame.
		    file_frame = wp.media.frames.file_frame = wp.media({
		      title: $( this ).data( 'uploader_title' ),
		      button: {
		        text: $( this ).data( 'uploader_button_text' ),
		      },
		      multiple: false  // Set to true to allow multiple files to be selected
		    });

		    // When an image is selected, run a callback.
		    file_frame.on( 'select', function() {
		      // We set multiple to false so only get one image from the uploader
		      var full_attachment = file_frame.state().get('selection').first().toJSON();

		      var attachment = file_frame.state().get('selection').first();

		      var thumburl = attachment.attributes.sizes.thumbnail;
		      var thumb_hidden = button_parent.find('.upload_field').attr('name');

		      if ( thumburl || full_attachment ) {
					button_parent.find("#"+id).val(full_attachment.url);
					button_parent.find("."+thumb_hidden+"_thumb").val(full_attachment.url);
					
					button_parent.find(".upload_image_screenshort").attr("src", full_attachment.url);
					//button_parent.find(".upload_image_screenshort").show();
					button_parent.find(".upload_image_screenshort").slideDown();
				}
		    });

		    // Finally, open the modal
		    file_frame.open();
		});
		
		// Remove button function to remove attach image and hide screenshort Div.
		$('.paperio_remove_button').click(function () {
			var remove_parent = $(this).parent();
			remove_parent.find('.upload_field').val('');
			remove_parent.find('input[type="hidden"]').val('');
			remove_parent.find('.upload_image_screenshort').slideUp();
		});

		// On page load add all image url to show in screenshort.
		$('.upload_field').each(function(){
			if($(this).val()){
				$(this).parent().find('.upload_image_screenshort').attr("src", $(this).parent().find('input[type="hidden"]').val());
			}else{
				$(this).parent().find('.upload_image_screenshort').hide();
			}
		});

		if( $('body').hasClass('block-editor-page') ){

			/* multiple image upload */
			
			$('.paperio_upload_button_multiple').click(function (event) {
		        var file_frame;
			  	var button = $(this);

			    var button_parent = $(this).parent();
				var id = button.attr('id').replace('_button', '');
				var app = [];
			    event.preventDefault();
			    

			    // If the media frame already exists, reopen it.
			    if ( file_frame ) {
			      file_frame.open();
			      return;
			    }

			    // Create the media frame.
			    file_frame = wp.media.frames.file_frame = wp.media({
			      title: $( this ).data( 'uploader_title' ),
			      button: {
			        text: $( this ).data( 'uploader_button_text' ),
			      },
			      multiple: true  // Set to true to allow multiple files to be selected
			    });

			    // When an image is selected, run a callback.
			    file_frame.on( 'select', function() {

			      var thumb_hidden = button_parent.find('.upload_field').attr('name');
			     
					var selection = file_frame.state().get('selection');
					var app = [];
						selection.map( function( attachment ) {
						var attachment = attachment.toJSON();

						button_parent.find('.multiple_images').append( '<div id="'+attachment.id+'"><img src="'+attachment.url+'" class="upload_image_screenshort_multiple" alt="" style="width:100px;"/><a href="javascript:void(0)" class="remove">remove</a></div>' );
						$('.multiple_images').each(function(){
							if($(this).children().length > 0){
								var attach_id = [];
								var pr_div = $(this).parent();
								$(this).children('div').each(function(){
										attach_id.push($(this).attr('id'));						
								});

								pr_div.find('.upload_field').val(attach_id);
							}else{
								$(this).parent().find('.upload_field').val('');
							}
						});
					});
			    });
			    // Finally, open the modal
			    file_frame.open();
			});

			$(".multiple_images").on('click','.remove', function() {
				var remove_Item = $(this).parent().attr('id');
				$('.multiple_images').each(function(){
					if($(this).children().length > 0){
						var attach_id = [];
						var pr_div = $(this).parent();
						$(this).children('div').each(function(){
								attach_id.push($(this).attr('id'));						
						});
						attach_id = $.grep(attach_id, function(value) {
						  return value != remove_Item;
						});
						pr_div.find('.upload_field').val(attach_id);
					}else{
						$(this).parent().find('.upload_field').val('');
					}
				});

				$(this).parent().slideUp();
				$(this).parent().remove();
			});

			/* multiple image upload End */

			/*==============================================================*/
			// Post Format Meta Start
			/*==============================================================*/
			function post_format_selection_options( format_val ) {
				
				$('body.post-type-post #paperio_post_single_meta_box').hide();
				$('.tz_image_single_box').show();
			        if ( format_val == 'gallery') {
			        	$('body.post-type-post #paperio_post_single_meta_box').show();
			            $('.tz_gallery_single_box').fadeIn();
			            $('.tz_lightbox_image_single_box').fadeIn();
			            $('.tz_lightbox_image_column_single_box').fadeIn();
			            $('.tz_quote_single_box').hide();
			            $('.tz_audio_type_single_box').hide();
			            $('.tz_video_mp4_single_box').hide();
			            $('.tz_video_ogg_single_box').hide();
			            $('.tz_video_webm_single_box').hide();
			            $('.tz_video_single_box').hide();
			            $('.tz_video_type_single_box').hide();
			            $('.tz_enable_mute_single_box').hide();
			            $('.tz_subtitle_single_box').fadeIn();

			        } else if ( format_val == 'video' ) {
			        	$('body.post-type-post #paperio_post_single_meta_box').show();
			            $('.tz_gallery_single_box').hide();
			            $('.tz_lightbox_image_single_box').hide();
			            $('.tz_lightbox_image_column_single_box').hide();
			            $('.tz_quote_single_box').hide();
			            $('.tz_audio_type_single_box').hide();
			            $('.tz_video_mp4_single_box').fadeIn();
			            $('.tz_video_ogg_single_box').fadeIn();
			            $('.tz_video_webm_single_box').fadeIn();
			            $('.tz_video_single_box').fadeIn();
			            $('.tz_video_type_single_box').fadeIn();
			            $('.tz_enable_mute_single_box').fadeIn();
			            $('.tz_subtitle_single_box').fadeIn();


			        }else if ( format_val == 'quote' ) {
			        	$('body.post-type-post #paperio_post_single_meta_box').show();
			            $('.tz_gallery_single_box').hide();
			            $('.tz_lightbox_image_single_box').hide();
			            $('.tz_lightbox_image_column_single_box').hide();
			            $('.tz_quote_single_box').fadeIn();
			            $('.tz_audio_type_single_box').hide();
			            $('.tz_video_mp4_single_box').hide();
			            $('.tz_video_ogg_single_box').hide();
			            $('.tz_video_webm_single_box').hide();
			            $('.tz_video_single_box').hide();
			            $('.tz_video_type_single_box').hide();
			            $('.tz_enable_mute_single_box').hide();
			            $('.tz_subtitle_single_box').fadeIn();
			            
			        } else if ( format_val == 'audio' ) {
			        	$('body.post-type-post #paperio_post_single_meta_box').show();
			            $('.tz_gallery_single_box').hide();
			            $('.tz_lightbox_image_single_box').hide();
			            $('.tz_lightbox_image_column_single_box').hide();
			            $('.tz_quote_single_box').hide();
			            $('.tz_audio_type_single_box').fadeIn();
			            $('.tz_video_mp4_single_box').hide();
			            $('.tz_video_ogg_single_box').hide();
			            $('.tz_video_webm_single_box').hide();
			            $('.tz_video_single_box').hide();
			            $('.tz_video_type_single_box').hide();
			            $('.tz_enable_mute_single_box').hide();
			            $('.tz_subtitle_single_box').fadeIn();
			            
			        }else if ( format_val == 'image' ) {
			        	$('body.post-type-post #paperio_post_single_meta_box').show();
			            $('.tz_gallery_single_box').hide();
			            $('.tz_lightbox_image_single_box').hide();
			            $('.tz_lightbox_image_column_single_box').hide();
			            $('.tz_quote_single_box').hide();
			            $('.tz_image_single_box').fadeIn();
			            $('.tz_audio_type_single_box').hide();
			            $('.tz_video_mp4_single_box').hide();
			            $('.tz_video_ogg_single_box').hide();
			            $('.tz_video_webm_single_box').hide();
			            $('.tz_video_single_box').hide();
			            $('.tz_video_type_single_box').hide();
			            $('.tz_enable_mute_single_box').hide();
			            $('.tz_subtitle_single_box').fadeIn();
			            
			        }else {
			        	$('body.post-type-post #paperio_post_single_meta_box').hide();
			            $('.tz_gallery_single_box').hide();
			            $('.tz_lightbox_image_single_box').hide();
			            $('.tz_lightbox_image_column_single_box').hide();
			            $('.tz_quote_single_box').hide();
			            $('.tz_audio_type_single_box').hide();
			            $('.tz_video_mp4_single_box').hide();
			            $('.tz_video_ogg_single_box').hide();
			            $('.tz_video_webm_single_box').hide();
			            $('.tz_video_single_box').hide();
			            $('.tz_video_type_single_box').hide();
			            $('.tz_enable_mute_single_box').hide();
			            $('.tz_image_single_box').hide();
			            $('.tz_subtitle_single_box').fadeIn();
			        }
		    }

		    post_format_selection_options( $( "#post-format-selector-0" ).val() );

		    var select_type = $('#post-format-selector-0');
		    
			setTimeout(function(){
			    $('#post-format-selector-0').change(function() {
			        post_format_selection_options( this.value );
			    });
			    post_format_selection_options( $( "#post-format-selector-0" ).val() );
			}, 500);

		    // Remove unselected type meta data for post.
		    $('.editor-post-publish-button').click(function(){
		    	post_submit( $( "#post-format-selector-0" ).val() );
		    });
		    // 
		    function post_submit( format_val ){

	        	if ( format_val == 'gallery' ) {
		            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');

	        	}if ( format_val == 'video' ) {
		            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
		            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
					$('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');

	        	}if ( format_val == 'quote' ) {
		            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
					$('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
		            
	            
	        	}if ( format_val == 'audio' ) {
		            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
		            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
	            
	        	}if ( format_val == 'image' ) {
		            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
		            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
	            
	        	}if ($('#post-format-0').is(':checked')) {
		            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
		            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
		            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
	        	}

		    }
		}else{

			/* multiple image upload */

			$('.paperio_upload_button_multiple').click(function (event) {
		        var file_frame;
			  	var button = $(this);

			    var button_parent = $(this).parent();
				var id = button.attr('id').replace('_button', '');
				var app = [];
			    event.preventDefault();
			    

			    // If the media frame already exists, reopen it.
			    if ( file_frame ) {
			      file_frame.open();
			      return;
			    }

			    // Create the media frame.
			    file_frame = wp.media.frames.file_frame = wp.media({
			      title: $( this ).data( 'uploader_title' ),
			      button: {
			        text: $( this ).data( 'uploader_button_text' ),
			      },
			      multiple: true  // Set to true to allow multiple files to be selected
			    });

			    // When an image is selected, run a callback.
			    file_frame.on( 'select', function() {

			      var thumb_hidden = button_parent.find('.upload_field').attr('name');
			     
					var selection = file_frame.state().get('selection');
					var app = [];
						selection.map( function( attachment ) {
						var attachment = attachment.toJSON();
						button_parent.find('.multiple_images').append( '<div id="'+attachment.id+'"><img src="'+attachment.url+'" class="upload_image_screenshort_multiple" alt="" style="width:100px;"/><a href="javascript:void(0)" class="remove">remove</a></div>' );
					});
			    });
			    // Finally, open the modal
			    file_frame.open();
			});

			$(".button-primary").on('click',function(){
				var pr_div;
				$('.multiple_images').each(function(){
					if($(this).children().length > 0){
						var attach_id = [];
						var pr_div = $(this).parent();
						$(this).children('div').each(function(){
								attach_id.push($(this).attr('id'));						
						});
						
						pr_div.find('.upload_field').val(attach_id);
					}else{
						$(this).parent().find('.upload_field').val('');
					}
				});		
			});

			$(".multiple_images").on('click','.remove', function() {
				$(this).parent().slideUp();
				$(this).parent().remove();
			});

			/* multiple image upload End */


			/*==============================================================*/
			// Post Format Meta Start
			/*==============================================================*/
			function post_format_selection_options() {
				
				$('body.post-type-post #paperio_post_single_meta_box').hide();

		        if ($('#post-format-gallery').is(':checked')) {
		        	$('body.post-type-post #paperio_post_single_meta_box').show();
		            $('.tz_gallery_single_box').fadeIn();
		            $('.tz_lightbox_image_single_box').fadeIn();
		            $('.tz_lightbox_image_column_single_box').fadeIn();
		            $('.tz_quote_single_box').hide();
		            $('.tz_audio_type_single_box').hide();
		            $('.tz_video_mp4_single_box').hide();
		            $('.tz_video_ogg_single_box').hide();
		            $('.tz_video_webm_single_box').hide();
		            $('.tz_video_single_box').hide();
		            $('.tz_video_type_single_box').hide();
		            $('.tz_enable_mute_single_box').hide();
		            $('.tz_subtitle_single_box').fadeIn();

		        } else if ($('#post-format-video').is(':checked')) {
		        	$('body.post-type-post #paperio_post_single_meta_box').show();
		            $('.tz_gallery_single_box').hide();
		            $('.tz_lightbox_image_single_box').hide();
		            $('.tz_lightbox_image_column_single_box').hide();
		            $('.tz_quote_single_box').hide();
		            $('.tz_audio_type_single_box').hide();
		            $('.tz_video_mp4_single_box').fadeIn();
		            $('.tz_video_ogg_single_box').fadeIn();
		            $('.tz_video_webm_single_box').fadeIn();
		            $('.tz_video_single_box').fadeIn();
		            $('.tz_video_type_single_box').fadeIn();
		            $('.tz_enable_mute_single_box').fadeIn();
		            $('.tz_subtitle_single_box').fadeIn();


		        }else if ($('#post-format-quote').is(':checked')) {
		        	$('body.post-type-post #paperio_post_single_meta_box').show();
		            $('.tz_gallery_single_box').hide();
		            $('.tz_lightbox_image_single_box').hide();
		            $('.tz_lightbox_image_column_single_box').hide();
		            $('.tz_quote_single_box').fadeIn();
		            $('.tz_audio_type_single_box').hide();
		            $('.tz_video_mp4_single_box').hide();
		            $('.tz_video_ogg_single_box').hide();
		            $('.tz_video_webm_single_box').hide();
		            $('.tz_video_single_box').hide();
		            $('.tz_video_type_single_box').hide();
		            $('.tz_enable_mute_single_box').hide();
		            $('.tz_subtitle_single_box').fadeIn();
		            
		        } else if ($('#post-format-audio').is(':checked')) {
		        	$('body.post-type-post #paperio_post_single_meta_box').show();
		            $('.tz_gallery_single_box').hide();
		            $('.tz_lightbox_image_single_box').hide();
		            $('.tz_lightbox_image_column_single_box').hide();
		            $('.tz_quote_single_box').hide();
		            $('.tz_audio_type_single_box').fadeIn();
		            $('.tz_video_mp4_single_box').hide();
		            $('.tz_video_ogg_single_box').hide();
		            $('.tz_video_webm_single_box').hide();
		            $('.tz_video_single_box').hide();
		            $('.tz_video_type_single_box').hide();
		            $('.tz_enable_mute_single_box').hide();
		            $('.tz_subtitle_single_box').fadeIn();
		            
		        }else if ($('#post-format-image').is(':checked')) {
		        	$('body.post-type-post #paperio_post_single_meta_box').show();
		            $('.tz_gallery_single_box').hide();
		            $('.tz_lightbox_image_single_box').hide();
		            $('.tz_lightbox_image_column_single_box').hide();
		            $('.tz_quote_single_box').hide();
		            $('.tz_image_single_box').fadeIn();
		            $('.tz_audio_type_single_box').hide();
		            $('.tz_video_mp4_single_box').hide();
		            $('.tz_video_ogg_single_box').hide();
		            $('.tz_video_webm_single_box').hide();
		            $('.tz_video_single_box').hide();
		            $('.tz_video_type_single_box').hide();
		            $('.tz_enable_mute_single_box').hide();
		            $('.tz_subtitle_single_box').fadeIn();
		            
		        }else {
		        	$('body.post-type-post #paperio_post_single_meta_box').hide();
		            $('.tz_gallery_single_box').hide();
		            $('.tz_lightbox_image_single_box').hide();
		            $('.tz_lightbox_image_column_single_box').hide();
		            $('.tz_quote_single_box').hide();
		            $('.tz_audio_type_single_box').hide();
		            $('.tz_video_mp4_single_box').hide();
		            $('.tz_video_ogg_single_box').hide();
		            $('.tz_video_webm_single_box').hide();
		            $('.tz_video_single_box').hide();
		            $('.tz_video_type_single_box').hide();
		            $('.tz_enable_mute_single_box').hide();
		            $('.tz_image_single_box').hide();
		            $('.tz_subtitle_single_box').fadeIn();

		        }
		    }
		    post_format_selection_options();

		    var select_type = $('#post-formats-select input');
		    

		    $(this).change(function() {
		        post_format_selection_options();
		    });

		    // Remove unselected type meta data for post.
		    post_submit();
		    function post_submit(){
		        $('#publish').click(function(){
		        	if ($('#post-format-gallery').is(':checked')) {
			            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');

		        	}if ($('#post-format-video').is(':checked')) {
			            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
			            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
						$('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');

		        	}if ($('#post-format-quote').is(':checked')) {
			            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
						$('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
			            
		            
		        	}if ($('#post-format-audio').is(':checked')) {
			            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
			            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
		            
		        	}if ($('#post-format-image').is(':checked')) {
			            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
			            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
		            
		        	}if ($('#post-format-0').is(':checked')) {
			            $('#paperio_post_single_meta_box .paperio_meta_box_tab_content_single .upload_field').val('');
			            $('.paperio_meta_box_tab_content_single .paperio_quote_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_audio_type_single_box').find("textarea").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_mp4_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_ogg_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_webm_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_single_box').find("input:first-child").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_video_type_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_enable_mute_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_image_single_box').find("select option").val('');
			            $('.paperio_meta_box_tab_content_single .paperio_lightbox_image_single_box').find("select option").val('');
		        	}
		        });
		    }
		}
		/*==============================================================*/
		// Post Format Meta End
		/*==============================================================*/
	});

}(window.jQuery);