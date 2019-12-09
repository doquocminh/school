<?php
/**
 * Metabox For Post Setting.
 *
 * @package Paperio
 */
?>
<?php
paperio_meta_box_dropdown('tz_image_single',
				esc_html__('Featured Image in Post Page', 'paperio-addons'),
				array('1' => esc_html__('Yes', 'paperio-addons'),
					  '0' => esc_html__('No', 'paperio-addons'),
					),
				esc_html__('Select No if you do not want to show featured image in the post detail page', 'paperio-addons')
			);
paperio_meta_box_textarea('tz_quote_single',
				esc_html__('Blockquote', 'paperio-addons'),
				esc_html__('Add block quote content', 'paperio-addons')
			);
paperio_meta_box_dropdown('tz_lightbox_image_single',
				esc_html__('List Type', 'paperio-addons'),
				array('1' => esc_html__('Lightbox', 'paperio-addons'),
					  '0' => esc_html__('Slider', 'paperio-addons'),
					),
				esc_html__('Select listing type', 'paperio-addons')
			);
paperio_meta_box_dropdown('tz_lightbox_image_column_single',
				esc_html__('Column Type', 'paperio-addons'),
				array(
						'' => esc_html__('Select Column', 'paperio-addons'),
						'two' => esc_html__('2 Column', 'paperio-addons'),
					  	'three' => esc_html__('3 Column', 'paperio-addons'),
					  	'four' => esc_html__('4 Column', 'paperio-addons'),
					),
				esc_html__('Select listing column type', 'paperio-addons')
			);
paperio_meta_box_upload_multiple('tz_gallery_single', 
				esc_html__('Images', 'paperio-addons'),
				esc_html__('Upload / select multiple images to build a gallery', 'paperio-addons')
			);
paperio_meta_box_textarea('tz_audio_type_single',
				esc_html__('AUDIO URL (OEMBED) OR EMBED CODE', 'paperio-addons'),
				esc_html__('Add content', 'paperio-addons')
			);
paperio_meta_box_dropdown('tz_video_type_single',
				esc_html__('Video Type', 'paperio-addons'),
				array('self' => esc_html__('Self Hosted', 'paperio-addons'),
					  'external' => esc_html__('External Url', 'paperio-addons'),
					),
				esc_html__('Select video type', 'paperio-addons')
			);
paperio_meta_box_dropdown('tz_enable_mute_single',
				esc_html__('Enable Video Mute', 'paperio-addons'),
				array('0' => esc_html__('No', 'paperio-addons'),
					  '1' => esc_html__('Yes', 'paperio-addons'),
					),
				esc_html__('Select yes to mute background video sound.', 'paperio-addons')
			);
paperio_meta_box_text('tz_video_mp4_single',
				esc_html__('MP4 Video URL', 'paperio-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'paperio-addons'),
				esc_html__('', 'paperio-addons')
			);
paperio_meta_box_text('tz_video_ogg_single',
				esc_html__('OGG Video URL', 'paperio-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'paperio-addons'),
				esc_html__('', 'paperio-addons')
			);
paperio_meta_box_text('tz_video_webm_single',
				esc_html__('WEBM Video URL', 'paperio-addons'),
				esc_html__('Video url is required here if self hosted option is selected', 'paperio-addons'),
				esc_html__('', 'paperio-addons')
			);
paperio_meta_box_text('tz_video_single',
				esc_html__('Add Youtube/Vimeo Embed Url', 'paperio-addons'),
				'Video url is required here if external url option is selected.',
				esc_html__('Add YOUTUBE VIDEO EMBED URL like https://www.youtube.com/embed/xxxxxxxxxx, you will get this from youtube embed iframe src code. or add VIMEO VIDEO EMBED URL like https://player.vimeo.com/video/xxxxxxxx, you will get this from vimeo embed iframe src code.', 'paperio-addons')
			);