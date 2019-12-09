<?php

	/* Exit if accessed directly. */
	if ( !defined( 'ABSPATH' ) ) { exit; }

	if( class_exists( 'WP_Customize_Control' ) ) {

	    /* For Switch Control */
	    if( !class_exists( 'Paperio_Addons_Customize_switch_Control' ) ) {
	        class Paperio_Addons_Customize_switch_Control extends WP_Customize_Control {
	         
	            public function render_content() {

	                if ( empty( $this->choices ) )
	                    return;

	                $name = '_customize-radio-' . $this->id;

	                if ( ! empty( $this->label ) ) : ?>
	                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <?php endif;
	                if ( ! empty( $this->description ) ) : ?>
	                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
	                <?php endif;
	                ?>
	                <ul class="paperio-switch-option">
	                <?php
	                    $tz_switch_class = '';
	                    foreach ( $this->choices as $value => $label ) :
	                        $tz_switch_class = ( $value == 1 ) ? 'tz-switch-option switch-option-enable' : 'tz-switch-option switch-option-disable';
	                        ?>
	                        <li class="<?php echo esc_html($tz_switch_class); ?><?php echo ( $this->value() == $value ) ? ' active': '' ; ?>">
	                        <label>
	                            <?php echo esc_html( $label ); ?>
	                            <input type="radio" style="display:none" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
	                        </label>
	                        </li>
	                <?php
	                    endforeach;
	                ?>
	                </ul>
	                <?php
	            }
	        }
	    }
	}
	
	/* Set Under Construction page */

	$wp_customize->add_setting( 'tz_enable_under_maintenance', array(
		'default' 			=> 0,
		'sanitize_callback' => 'esc_attr'
	) );

	$wp_customize->add_control( new Paperio_Addons_Customize_switch_Control( $wp_customize, 'tz_enable_under_maintenance', array(
		'label'       		=> esc_attr__( 'Under Maintenance', 'paperio-addons' ),
		'section'     		=> 'tz_add_under_maintenance_section',
		'settings'			=> 'tz_enable_under_maintenance',
		'type'              => 'radio',
		'choices'           => array(
										'1' => esc_html__( 'Yes', 'paperio-addons' ),
									  	'0' => esc_html__( 'No', 'paperio-addons' ),
								   	),	
	) ) );

	$wp_customize->add_setting( 'tz_enable_under_maintenance_pages', array(
		'default' 			=> '0',
		'sanitize_callback' => 'esc_attr'
	) );


	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tz_enable_under_maintenance_pages', array(
		'label'       		=> esc_attr__( 'Select Page', 'paperio-addons' ),
		'section'     		=> 'tz_add_under_maintenance_section',
		'settings'			=> 'tz_enable_under_maintenance_pages',
		'type'             	=> 'dropdown-pages',
		'active_callback'   => 'paperio_under_construction_page_callback',
	) ));

	/* Custom Callback Functions */
	if ( ! function_exists( 'paperio_under_construction_page_callback' ) ) :
		function paperio_under_construction_page_callback( $control ) {
			if ( $control->manager->get_setting( 'tz_enable_under_maintenance' )->value() == '1' ) {
		        return true;
		    } else {
		    	return false;
		    }
		}
	endif;