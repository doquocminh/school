<?php
    if( !class_exists( 'Paperio_Require_Files_Class' ) ) {
        class Paperio_Require_Files_Class {
            /*
             * Includes all (require_once) php file(s) inside selected folder using class.
             */
            public function __construct() { }

            public static function Paperio_Theme_Require_Files( $fileName ) {

                if( is_array( $fileName ) ) {
                    foreach( $fileName as $name ) {
                        get_template_part( 'lib/'.$name );
                    }
                } else {
                    throw new Exception( esc_html__( 'File is not found in folder as you given', 'paperio' ) );
                }
                
            }

        }
    }
 
    $Paperio_Require_Files_Class = new Paperio_Require_Files_Class();


    /*
     *  Includes all required files for Paperio Theme.
     */
    Paperio_Require_Files_Class::Paperio_Theme_Require_Files(
        array(
            'paperio-enqueue-scripts-styles',
            'paperio-extra-functions',
            'paperio-licence-activation/paperio-licence-activation',
            'tgm/tgm-init',
            'customizer/paperio-customizer',
            'mega-menu/mega-menu',
            'paperio-breadcrumb',
            'paperio-excerpt',
            'paperio-googlefonts',
        )
    );