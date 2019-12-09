(function() {

    tinymce.PluginManager.add( 'paperio_elements', function( editor, url ) {
        
        var image_path = url;// js folder path


        /** Start Promotional Block Script **/
      
        var style_one_image = image_path + '/preview-images/promotional_style1.jpg';  /** Default Image**/      
        var style_two_image = image_path + '/preview-images/promotional_style2.jpg';
        
        function promotional_style1(){    
 
            jQuery('.mce-container-image').find('.img-for-style').attr('src', style_one_image);       
        }
        function promotional_style2(){
           
            jQuery('.mce-container-image').find('.img-for-style').attr('src', style_two_image); 
        }
        /** End Promotional Block Script**/  

        /** Start Button Style Script**/  
        var button_style1_image = image_path + '/preview-images/style1.jpg'; /** Default Image**/
        var button_style2_image = image_path + '/preview-images/style2.jpg';
        var button_style3_image = image_path + '/preview-images/style3.jpg';
        var button_style4_image = image_path + '/preview-images/style4.jpg';
        var button_style5_image = image_path + '/preview-images/style5.jpg';
        var button_style6_image = image_path + '/preview-images/style6.jpg';
        var button_style7_image = image_path + '/preview-images/style7.jpg';
        
        function button_style1(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style1_image);       
        }
        function button_style2(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style2_image);       
        }
        function button_style3(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style3_image);       
        }
        function button_style4(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style4_image);      
        }
        function button_style5(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style5_image);       
        }
        function button_style6(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style6_image);       
        }
        function button_style7(){
            jQuery('.mce-button-container-image').find('.img-for-button-style').attr('src', button_style7_image);       
        }
        /** End Button Style Script **/ 

        /** Start Title Style Script **/  
        var title_style1_image = image_path + '/preview-images/heading-style1.jpg'; /** Default Image**/
        var title_style2_image = image_path + '/preview-images/heading-style2.jpg';
        var title_style3_image = image_path + '/preview-images/heading-style3.jpg';
        function title_style1(){     
 
            jQuery('.mce-title-container-image').find('.img-for-title-style').attr('src', title_style1_image);       
        }
        function title_style2(){     
 
            jQuery('.mce-title-container-image').find('.img-for-title-style').attr('src', title_style2_image);       
        }
        function title_style3(){     
 
            jQuery('.mce-title-container-image').find('.img-for-title-style').attr('src', title_style3_image);       
        }

        /** End Title Style Script **/ 


        editor.addButton( 'paperio_elements', {
            title: 'Insert Paperio Shortcode',
            type: 'menubutton',

            onselect: function() {
                editor.insertContent(this.value());
            },
            menu: [{ //Start Column
                text: 'Promotional Block',
                    onclick: function(e) {
                     
                        e.stopPropagation();
                        editor.windowManager.open({
                            title: 'Promotional Block',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;',                            
                            body: [{                           
                                type: 'listbox',
                                name: 'tz_style',
                                label: 'Promotional Block',
                                'values': [{
                                    text: 'Promotional Block Style1',
                                    value: 'promotional-style1',
                                     onclick: function( e ) {promotional_style1();},

                                },{
                                    text: 'Promotional Block Style2',
                                    value: 'promotional-style2',
                                    onclick: function( e ) {promotional_style2();},
                                }],
                                },{
                                    type: 'label',
                                    name: 'tz_style_help',
                                    text: 'Select syle of promotional block',
                                    style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                                },{
                                    type   : 'container',
                                    name   : 'tz_style_container_style',                                    
                                    html   : '<img class="img-for-style" src="' + style_one_image +'" style="height:200px;width:100%" />',
                                    classes: 'container-image'
                                },{
                                type: 'listbox',
                                name: 'tz_col_md',
                                label: 'MD Width',
                                value: 'col-md-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-md-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-md-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-md-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-md-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-md-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-md-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-md-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-md-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-md-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-md-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-md-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-md-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_md_help',
                                text: 'Select MD Width for promotional block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_col_sm',
                                label: 'SM Width',
                                value: 'col-sm-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-sm-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-sm-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-sm-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-sm-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-sm-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-sm-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-sm-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-sm-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-sm-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-sm-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-sm-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-sm-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_sm_help',
                                text: 'Select SM Width for promotional block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_col_xs',
                                label: 'XS Width',
                                value: 'col-xs-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-xs-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-xs-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-xs-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-xs-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-xs-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-xs-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-xs-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-xs-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-xs-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-xs-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-xs-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-xs-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_xs_help',
                                text: 'Select XS Width for promotional block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_bg_image_url',
                                label: 'Background image url'
                            },{
                                type: 'label',
                                name: 'tz_bg_image_url_help',
                                text: 'Set background image URL for promotional block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_title',
                                label: 'Title'
                            },{
                                type: 'label',
                                name: 'tz_title_help',
                                text: 'Add promotional block title',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_button_text',
                                label: 'Button Text'
                            },{
                                type: 'label',
                                name: 'tz_button_text_help',
                                text: 'Add promotional block button text',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_link_url',
                                label: 'Button Link Url'
                            },{
                                type: 'label',
                                name: 'tz_link_url_help',
                                text: 'Set the link URL for promotional block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_link_target',
                                label: 'Link Target',
                                value: '_self',
                                'values': [{
                                    text: 'Current Tab',
                                    value: '_self'
                                },{
                                    text: 'New Tab',
                                    value: '_blank'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_link_target_help',
                                text: 'Choose link target for promotional block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],

                                  


                            onsubmit: function(e) {
                                var tz_style = e.data.tz_style;                               
                                var tz_col_md = e.data.tz_col_md;
                                var tz_col_sm = e.data.tz_col_sm;
                                var tz_col_xs = e.data.tz_col_xs;
                                var tz_bg_image_url = e.data.tz_bg_image_url;
                                var tz_title = e.data.tz_title;
                                var tz_button_text = e.data.tz_button_text;
                                var tz_link_url = e.data.tz_link_url
                                var tz_link_target = e.data.tz_link_target;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                editor.execCommand( 'mceInsertContent', false, '[paperio_promotional_block tz_style="' + tz_style + '" tz_col_md="' + tz_col_md + '" tz_col_sm="' + tz_col_sm + '" tz_col_xs="' + tz_col_xs + '" tz_bg_image_url="' + tz_bg_image_url + '" tz_title="' + tz_title + '" tz_button_text="' + tz_button_text + '" tz_link_url="' + tz_link_url + '"  tz_link_target="' + tz_link_target + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"][/paperio_promotional_block]');
                            }

                            

                        }); //end editor.windowManager
                    }
                },{
                    text: 'Image with Caption',
                    onclick: function() {
                        editor.windowManager.open({

                            title: 'Image with Caption',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'textbox',
                                name: 'tz_image_url',                                
                                label: 'Background image URL'
                            },{
                                type: 'label',
                                name: 'tz_image_url_help',
                                text: 'Set background image URL',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',                               
                                value : '',
                            },               
                            {
                                type: 'textbox',
                                name: 'tz_image_alt_text',
                                label: 'Image alt'
                            },{
                                type: 'label',
                                name: 'tz_image_alt_text_help',
                                text: 'Add image alt Text',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_caption_text',
                                label: 'Caption Text'
                            },{
                                type: 'label',
                                name: 'tz_caption_text_help',
                                text: 'Add Caption Text',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_caption_position',
                                label: 'Image Caption Postion',
                                value: 'bottom',
                                'values': [{
                                    text: 'Bottom',
                                    value: 'bottom'
                                },{
                                    text: 'Top',
                                    value: 'top'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_caption_position_help',
                                text: 'Choose Caption Position',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_caption_align',
                                label: 'Caption Text Alignment',
                                value: 'text-left',
                                'values': [{
                                    text: 'Left',
                                    value: 'text-left'
                                },{
                                    text: 'Center',
                                    value: 'text-center'
                                },{
                                    text: 'Right',
                                    value: 'text-right'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_caption_align_help',
                                text: 'Choose Caption Text Alignment',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                value: 'width-290',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_image_url = e.data.tz_image_url;
                                var tz_image_alt_text = e.data.tz_image_alt_text;
                                var tz_caption_text = e.data.tz_caption_text;
                                var tz_caption_position = e.data.tz_caption_position;
                                var tz_caption_align = e.data.tz_caption_align;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                editor.execCommand( 'mceInsertContent', false, '[paperio_image_with_caption tz_image_url="' + tz_image_url + '" tz_image_alt_text="'+tz_image_alt_text+'" tz_caption_text="' + tz_caption_text + '" tz_caption_position="' + tz_caption_position + '" tz_caption_align="' + tz_caption_align + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"][/paperio_image_with_caption]');
                            }
                        }); //end editor.windowManager
                    }
                },
                /**** End Image with Caption*****/
                /**** Start Textblock*****/
                {
                    text: 'Text Block',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Text Block Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'listbox',
                                name: 'tz_col_md',
                                label: 'MD Width',
                                value: 'col-md-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-md-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-md-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-md-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-md-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-md-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-md-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-md-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-md-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-md-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-md-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-md-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-md-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_md_help',
                                text: 'Select MD width for text block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_col_sm',
                                label: 'SM Width',
                                value: 'col-sm-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-sm-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-sm-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-sm-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-sm-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-sm-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-sm-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-sm-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-sm-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-sm-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-sm-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-sm-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-sm-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_sm_help',
                                text: 'Select SM width for text block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_col_xs',
                                label: 'XS Width',
                                value: 'col-xs-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-xs-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-xs-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-xs-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-xs-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-xs-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-xs-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-xs-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-xs-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-xs-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-xs-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-xs-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-xs-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_xs_help',
                                text: 'Select XS width for text block',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_text_block_content',
                                label: 'Content',
                                value: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
                            },{
                                type: 'label',
                                name: 'tz_text_block_content_help',
                                text: 'Add text or shortcode',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'helpextraid',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],

                            onsubmit: function(e) {
                                var tz_col_md = e.data.tz_col_md;
                                var tz_col_sm = e.data.tz_col_sm;
                                var tz_col_xs = e.data.tz_col_xs;
                                var tz_text_block_content = e.data.tz_text_block_content;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;
                                content = '[paperio_text_block tz_col_md="' + tz_col_md + '" tz_col_sm="' + tz_col_sm + '" tz_col_xs="' + tz_col_xs + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"] ' + tz_text_block_content + ' [/paperio_text_block]';
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        }); //end editor.windowManager
                    }
                },
                /**** End Textblock*****/
                /**** Start Blockquote*****/
                {
                    text: 'Blockquote',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Blockquote Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'textbox',
                                name: 'tz_blockquote_title',
                                label: 'Blockquote Title'
                            },{
                                type: 'label',
                                name: 'tz_blockquote_title_help',
                                text: 'Add Blockquote Title',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_blockquote_content',
                                label: 'Blockquote Content',
                                value: 'Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work. And the only way to do great work is to love what you do.'
                            },{
                                type: 'label',
                                name: 'tz_blockquote_content_help',
                                text: 'Add Blockquote Content',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_blockquote_bg_color',
                                label: 'Background Color'
                            },{
                                type: 'label',
                                name: 'helpblockquotebgclr',
                                text: 'Set Background Color. e.g.#000000',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_blockquote_color',
                                label: 'Text Color'
                            },{
                                type: 'label',
                                name: 'helpblockquotetextclr',
                                text: 'Set Text Color. e.g.#000000',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'helpextraclass',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'helpextraid',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_blockquote_title = e.data.tz_blockquote_title;
                                var tz_blockquote_content = e.data.tz_blockquote_content;
                                var tz_blockquote_bg_color = e.data.tz_blockquote_bg_color;
                                var tz_blockquote_color = e.data.tz_blockquote_color;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                content = '[paperio_blockquote tz_blockquote_title="' + tz_blockquote_title + '" tz_blockquote_bg_color="' + tz_blockquote_bg_color + '" tz_blockquote_color="' + tz_blockquote_color + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"]' + tz_blockquote_content + '[/paperio_blockquote]';
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        }); //end editor.windowManager
                    }
                },
                /**** End Blockquote*****/
                /**** Start Dropcap*****/
                {
                    text: 'Dropcap',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Dropcap Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'listbox',
                                name: 'tz_col_md',
                                label: 'MD Width',
                                value: 'col-md-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-md-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-md-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-md-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-md-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-md-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-md-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-md-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-md-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-md-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-md-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-md-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-md-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_md_help',
                                text: 'Select MD width for dropcap',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_col_sm',
                                label: 'SM Width',
                                value: 'col-sm-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-sm-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-sm-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-sm-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-sm-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-sm-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-sm-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-sm-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-sm-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-sm-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-sm-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-sm-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-sm-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_sm_help',
                                text: 'Select SM width for dropcap',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_col_xs',
                                label: 'XS Width',
                                value: 'col-xs-12',
                                'values': [{
                                    text: 'Select Column Width',
                                    value: ''
                                },{
                                    text: '1 column - 1/12',
                                    value: 'col-xs-12'
                                },{
                                    text: '2 columns - 1/6',
                                    value: 'col-xs-2'
                                },{
                                    text: '3 columns - 1/4',
                                    value: 'col-xs-3'
                                },{
                                    text: '4 columns - 1/3',
                                    value: 'col-xs-4'
                                },{
                                    text: '5 columns - 5/12',
                                    value: 'col-xs-5'
                                },{
                                    text: '6 columns - 1/2',
                                    value: 'col-xs-6'
                                },{
                                    text: '7 columns - 7/12',
                                    value: 'col-xs-7'
                                },{
                                    text: '8 columns - 2/3',
                                    value: 'col-xs-8'
                                },{
                                    text: '9 columns - 3/4',
                                    value: 'col-xs-9'
                                },{
                                    text: '10 columns - 5/6',
                                    value: 'col-xs-10'
                                },{
                                    text: '11 columns - 11/12',
                                    value: 'col-xs-11'
                                },{
                                    text: '12 columns - 1/1',
                                    value: 'col-xs-12'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_col_xs_help',
                                text: 'Select xs width for dropcap',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_dropcap_content',
                                label: 'Content',
                                value: 'A Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
                            },{
                                type: 'label',
                                name: 'tz_dropcap_content_help',
                                text: 'Add Content for Dropcap',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_col_md = e.data.tz_col_md;
                                var tz_col_sm = e.data.tz_col_sm;
                                var tz_col_xs = e.data.tz_col_xs;
                                var tz_dropcap_content = e.data.tz_dropcap_content;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                content = '[paperio_dropcap tz_col_md="' + tz_col_md + '" tz_col_sm="' + tz_col_sm + '" tz_col_xs="' + tz_col_xs + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"]' + tz_dropcap_content + '[/paperio_dropcap]';
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        }); //end editor.windowManager
                    }
                },
                /**** End Dropcap*****/
                /**** Start Tag*****/
                {
                    text: 'Heading',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Heading Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'listbox',
                                name: 'tz_heading_tag',
                                label: 'Heading Tag',
                                value: 'h1',
                                'values': [{
                                    text: 'Select Heading Tag',
                                    value: ''
                                },{
                                    text: 'H1 Tag',
                                    value: 'h1'
                                },{
                                    text: 'H2 Tag',
                                    value: 'h2'
                                },{
                                    text: 'H3 Tag',
                                    value: 'h3'
                                },{
                                    text: 'H4 Tag',
                                    value: 'h4'
                                },{
                                    text: 'H5 Tag',
                                    value: 'h5'
                                },{
                                    text: 'H6 Tag',
                                    value: 'h6'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_heading_tag_help',
                                text: 'Select heading tag',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_heading_text',
                                label: 'Heading Text'
                            },{
                                type: 'label',
                                name: 'tz_heading_text_help',
                                text: 'Add heading text',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_heading_tag = e.data.tz_heading_tag;
                                var tz_heading_text = e.data.tz_heading_text;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                content = '[paperio_heading tz_heading_tag="' + tz_heading_tag + '" tz_heading_text="' + tz_heading_text + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"][/paperio_heading]';
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        }); //end editor.windowManager
                    }
                },
                /**** End Tag*****/

                /**** Start Separator*****/
                {
                    text: 'Separator',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Separator Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'textbox',
                                name: 'tz_background_color',
                                label: 'Background Color'
                            },{
                                type: 'label',
                                name: 'tz_background_color_helpe',
                                text: 'Add Background Color like #000000',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_height',
                                label: 'Height'
                            },{
                                type: 'label',
                                name: 'tz_height_help',
                                text: 'Define height like 2px',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_background_color = e.data.tz_background_color;
                                var tz_height = e.data.tz_height;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                content = '[paperio_separator tz_background_color="' + tz_background_color + '" tz_height="' + tz_height + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"][/paperio_separator]';
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        }); //end editor.windowManager
                    }
                },
                /**** End Separator*****/

                /**** Start Types of List*****/
                {
                    text: 'Types of List',
                    menu: [{
                        text: 'Unordered List',
                        onclick: function(e) {
                            editor.insertContent('<ul><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>When an unknown printer took a galley of type and scrambled it to make.</li><li>Letraset sheets containing Lorem Ipsum passages more recently with desktop publishing. </li><li>It has survived not only five centuries, but also the leap into electronic typesetting.</li></ul>');
                        }
                    },{
                        text: 'Ordered List',
                        onclick: function(e) {
                            editor.insertContent('<ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li>When an unknown printer took a galley of type and scrambled it to make.</li><li>Letraset sheets containing Lorem Ipsum passages more recently with desktop publishing. </li><li>It has survived not only five centuries, but also the leap into electronic typesetting.</li></ol>');
                        }
                    }]
                },
                /**** Start Title Style*****/
                {
                    text: 'Title Style',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Title Style Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'listbox',
                                name: 'tz_title_style',
                                label: 'Title Style',
                                value: 'style-one',
                                'values': [{
                                    text: 'Select Title Style',
                                    value: ''
                                },{
                                    text: 'Title Style1',
                                    value: 'style-one',
                                    onclick: function( e ) {title_style1();},
                                },{
                                    text: 'Title Style2',
                                    value: 'style-two',
                                    onclick: function( e ) {title_style2();},
                                },{
                                    text: 'Title Style3',
                                    value: 'style-three',
                                    onclick: function( e ) {title_style3();},
                                }]
                            },{
                                type: 'label',
                                name: 'tz_title_style_help',
                                text: 'Select title style',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type   : 'container',
                                name   : 'tz_title_style_container',                               
                                html   : '<img class="img-for-title-style" src="' + title_style1_image +'" style="height:200px;width:100%"/>',
                                classes: 'title-container-image'
                            },{
                                type: 'textbox',
                                name: 'tz_title_text',
                                label: 'Title Text'
                            },{
                                type: 'label',
                                name: 'tz_title_text_help',
                                text: 'Add Title Text',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_title_color',
                                label: 'Title Color'
                            },{
                                type: 'label',
                                name: 'tz_title_color_help',
                                text: 'Define title color like #000000',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_title_style = e.data.tz_title_style;
                                var tz_title_text = e.data.tz_title_text;
                                var tz_title_color = e.data.tz_title_color;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;

                                content = '[paperio_title_style tz_title_style="' + tz_title_style + '" tz_title_text="' + tz_title_text + '" tz_title_color="' + tz_title_color + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '"][/paperio_title_style]';
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        });
                    }
                },
                /**** End Title Style*****/
                /**** Start Button Style*****/
                {
                    text: 'Button',
                    onclick: function() {
                        editor.windowManager.open({
                            title: 'Button Shortcode',
                            style: 'overflow-y:auto;overflow-x:hidden;max-height:70%;', 
                            body: [{
                                type: 'listbox',
                                name: 'tz_button_style',
                                label: 'Button Style',
                                value: 'button-style1',
                                'values': [{
                                    text: 'Select Button Style',
                                    value: ''
                                },{
                                    text: 'Style 1',
                                    value: 'button-style1',
                                    onclick: function( e ) {button_style1();},
                                },{
                                    text: 'Style 2',
                                    value: 'button-style2',
                                    onclick: function( e ) {button_style2();},
                                },{
                                    text: 'Style 3',
                                    value: 'button-style3',
                                    onclick: function( e ) {button_style3();},
                                },{
                                    text: 'Style 4',
                                    value: 'button-style4',
                                    onclick: function( e ) {button_style4();},
                                },{
                                    text: 'Style 5',
                                    value: 'button-style5',
                                    onclick: function( e ) {button_style5();},
                                },{
                                    text: 'Style 6',
                                    value: 'button-style6',
                                    onclick: function( e ) {button_style6();},
                                },{
                                    text: 'Style 7',
                                    value: 'button-style7',
                                    onclick: function( e ) {button_style7();},
                                }]
                            },{
                                type: 'label',
                                name: 'tz_button_style_help',
                                text: 'Select button style',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type   : 'container',
                                name   : 'tz_button_style_container',                               
                                html   : '<img class="img-for-button-style" src="' + button_style1_image +'" style="height:200px;width:100%"/>',
                                classes: 'button-container-image'
                            },{
                                type: 'listbox',
                                name: 'tz_button_size',
                                label: 'Button Size',
                                value: 'btn-large',
                                'values': [{
                                    text: 'Select Button Size',
                                    value: ''
                                },{
                                    text: 'Large',
                                    value: 'btn-large'
                                },{
                                    text: 'Medium',
                                    value: 'btn-medium'
                                },{
                                    text: 'Small',
                                    value: 'btn-small'
                                },{
                                    text: 'Very Small',
                                    value: 'btn-very-small'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_button_size_help',
                                text: 'Select Button Size',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_button_text',
                                label: 'Button Text'
                            },{
                                type: 'label',
                                name: 'tz_button_text_help',
                                text: 'Add Button Text',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_button_url',
                                label: 'Button URL',
                                value: '#'
                            },{
                                type: 'label',
                                name: 'tz_button_url_help',
                                text: 'Enter the destination URL',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_button_rel_nofollow',
                                label: 'Button Relation',
                                value: '',
                                'values': [{
                                    text: 'Select Relation',
                                    value: ''
                                },{
                                    text: 'Nofollow',
                                    value: 'nofollow'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_button_nofollow',
                                text: 'Select Relation Nofollow',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'listbox',
                                name: 'tz_button_link_target',
                                label: 'Link Target',
                                value: '_self',
                                'values': [{
                                    text: 'Current Tab',
                                    value: '_self'
                                },{
                                    text: 'New Tab',
                                    value: '_blank'
                                }]
                            },{
                                type: 'label',
                                name: 'tz_button_link_target_help',
                                text: 'Select the link target',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_class',
                                label: 'Extra Class'
                            },{
                                type: 'label',
                                name: 'tz_extra_class_help',
                                text: 'Optional - add additional CSS class to this element, you can define multiple CSS class with use of space like (Class1 Class2)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            },{
                                type: 'textbox',
                                name: 'tz_extra_id',
                                label: 'Extra ID'
                            },{
                                type: 'label',
                                name: 'tz_extra_id_help',
                                text: 'Optional - Define element id (The id attribute specifies a unique id for an HTML element)',
                                style: 'font-size:11px; text-align:right; color:#999; font-style:italic',
                            }],
                            onsubmit: function(e) {
                                var tz_button_style = e.data.tz_button_style;
                                var tz_button_size = e.data.tz_button_size;
                                var tz_button_text = e.data.tz_button_text;
                                var tz_button_url = e.data.tz_button_url;
                                var tz_button_link_target = e.data.tz_button_link_target;
                                var tz_extra_class = e.data.tz_extra_class;
                                var tz_extra_id = e.data.tz_extra_id;
                                var tz_button_rel_nofollow = e.data.tz_button_rel_nofollow;

content = '[paperio_button tz_button_style="' + tz_button_style + '" tz_button_size="' + tz_button_size + '" tz_button_text="' + tz_button_text + '" tz_button_url="' + tz_button_url + '" tz_button_link_target="' + tz_button_link_target + '" tz_extra_class="' + tz_extra_class + '" tz_extra_id="' + tz_extra_id + '" tz_button_rel_nofollow="' + tz_button_rel_nofollow + '"][/paperio_button]';[]
                                editor.execCommand( 'mceInsertContent', false, content );
                            }
                        }); //end editor.windowManager
                    }
            }] //End of Menu
        }); //End of editor.addButton
    }); //End of PluginManager
})(jQuery);
