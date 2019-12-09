<?php
/**
 * Metabox For Layout Setting.
 *
 * @package Paperio
 */
?>
<?php
paperio_meta_box_dropdown( 'tz_page_layout_setting_single',
	esc_html__( 'Sidebar Settings', 'paperio-addons' ),
	array(
		'default' => esc_html__( 'Default', 'paperio-addons' ),
		'paperio_layout_full_screen_12col' => esc_html__( 'One Column', 'paperio-addons' ),
	  	'paperio_layout_left_sidebar' => esc_html__( 'Two Columns Left', 'paperio-addons' ),
	  	'paperio_layout_right_sidebar' => esc_html__( 'Two Columns Right', 'paperio-addons' ),
	)
);

$sidebar_array = paperio_register_sidebar_array();

paperio_meta_box_dropdown_sidebar( 'tz_page_left_sidebar_single',
	esc_html__( 'Left Sidebar', 'paperio-addons' ),
	$sidebar_array,
	esc_html__( 'Select sidebar to display in left column of page', 'paperio-addons' )
);

paperio_meta_box_dropdown_sidebar( 'tz_page_right_sidebar_single',
	esc_html__( 'Right Sidebar', 'paperio-addons' ),
	$sidebar_array,
	esc_html__( 'Select sidebar to display in right column of page', 'paperio-addons' )
);

paperio_meta_box_dropdown( 'tz_page_container_fluid_single',
	esc_html__( 'Enable Container Fluid', 'paperio-addons' ),
	array(
  		'default' => esc_html__( 'Default', 'paperio-addons' ),
  		'yes' => esc_html__( 'Yes', 'paperio-addons' ),
  		'no' => esc_html__( 'No', 'paperio-addons' ),
	)
);

paperio_meta_box_dropdown( 'tz_hide_page_titlewrapper_single',
	esc_html__( 'Enable Page Title', 'paperio-addons' ),
	array(
  		'' => esc_html__( 'Default', 'paperio-addons' ),
  		0 => esc_html__( 'Yes', 'paperio-addons' ),
  		1 => esc_html__( 'No', 'paperio-addons' ),
	)
);
paperio_meta_box_upload('tz_page_title_bg_image',
	esc_html__( 'Page Title Background Image', 'paperio-addons' )
);

paperio_meta_box_text('tz_page_breadcrumb_title_single',
	esc_html__( 'Page Title', 'paperio-addons' )
);
