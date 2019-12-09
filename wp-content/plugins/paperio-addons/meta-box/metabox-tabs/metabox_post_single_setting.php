<?php
/**
 * Metabox For Layout Setting.
 *
 * @package Paperio
 */
?>
<?php
paperio_meta_box_dropdown( 'tz_single_post_layout_setting_single',
	esc_html__('Sidebar Settings', 'paperio-addons'),
	array(
			'default' => esc_html__('Default', 'paperio-addons'),
			'paperio_layout_full_screen_12col' => esc_html__('One Column', 'paperio-addons'),
		  	'paperio_layout_left_sidebar' => esc_html__('Two Columns Left', 'paperio-addons'),
		  	'paperio_layout_right_sidebar' => esc_html__('Two Columns Right', 'paperio-addons'),
		  	'paperio_layout_both_sidebar' => esc_html__('Three Columns', 'paperio-addons'),
	)
);

$sidebar_array = paperio_register_sidebar_array();

paperio_meta_box_dropdown_sidebar(	'tz_single_post_left_sidebar_single',
	esc_html__('Left Sidebar', 'paperio-addons'),
	$sidebar_array,
	esc_html__('Select sidebar to display in left column of post', 'paperio-addons')
);

paperio_meta_box_dropdown_sidebar(	'tz_single_post_right_sidebar_single',
	esc_html__('Right Sidebar', 'paperio-addons'),
	$sidebar_array,
	esc_html__('Select sidebar to display in right column of post', 'paperio-addons')
);

paperio_meta_box_dropdown('tz_single_post_container_fluid_single',
	esc_html__('Enable Container Fluid', 'paperio-addons'),
	array(
		'default' => esc_html__('Default', 'paperio-addons'),
		'yes' => esc_html__('Yes', 'paperio-addons'),
		'no' => esc_html__('No', 'paperio-addons'),
	)
);
paperio_meta_box_dropdown( 'tz_hide_post_titlewrapper_single',
	esc_html__( 'Enable Post Title', 'paperio-addons' ),
	array(
  		'' => esc_html__( 'Default', 'paperio-addons' ),
  		0 => esc_html__( 'Yes', 'paperio-addons' ),
  		1 => esc_html__( 'No', 'paperio-addons' ),
	)
);
paperio_meta_box_upload('tz_post_title_bg_image',
	esc_html__( 'Post Title Background Image', 'paperio-addons' )
);