<?php

class AIO_Builder_Module_PDF_Embedder extends ET_Builder_Module {
    
    function init() {
        
        $this->name       = esc_html__( 'PDF Embedder', 'divi-pdf-embedder' );
		$this->plural     = esc_html__( 'PDFs Embedder', 'divi-pdf-embedder' );
		$this->slug       = 'et_pb_aio_pdf_embedder';
		$this->vb_support = 'off';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'PDF', 'divi-pdf-embedder' ),
					'size' => esc_html__( 'Size', 'divi-pdf-embedder' ),
					'toolbar' => esc_html__( 'Toolbar', 'divi-pdf-embedder' ),
				)
			)
		);

		$this->advanced_fields = array();

		$this->help_videos = array();

	}

	function get_fields() {
		$fields = array(
			
			'url' => array(
				'type'               => 'upload',
				'data_type'          => 'video',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an PDF', 'divi-pdf-embedder' ),
				'choose_text'        => esc_attr__( 'Choose an PDF', 'divi-pdf-embedder' ),
				'update_text'        => esc_attr__( 'Set As PDF', 'divi-pdf-embedder' ),
				'hide_metadata'      => true,
				'description'        => esc_html__( 'Upload your desired PDF, or type in the URL to the PDF you would like to display.', 'divi-pdf-embedder' ),
				'toggle_slug'        => 'main_content',
			),
			'size_height' => array(
				'label'             => esc_html__( 'Height', 'divi-pdf-embedder' ),
				'type'              => 'text',
				'option_category'   => 'basic_option',
				'description'       => esc_html__( 'Here you can choose a height (Default: max)', 'divi-pdf-embedder' ),
				'toggle_slug'       => 'size',
			),
			'size_width' => array(
				'label'             => esc_html__( 'Width', 'divi-pdf-embedder' ),
				'type'              => 'text',
				'option_category'   => 'basic_option',
				'description'       => esc_html__( 'Here you can choose a width (Default: max)', 'divi-pdf-embedder' ),
				'toggle_slug'       => 'size',
			),
			'toolbar_state' => array(
				'label'             => esc_html__( 'State', 'divi-pdf-embedder' ),
				'type'              => 'select',
				'option_category'   => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'Hover', 'divi-pdf-embedder' ),
					'on'  => esc_html__( 'Fixed', 'divi-pdf-embedder' ),
				),
				'default_on_front'=> 'on',
				'description'       => esc_html__( 'Keep the toolbar open at all times rather than only when the user hovers over the document. Note this extends the length of your embedded area.', 'divi-pdf-embedder' ),
				'toggle_slug'       => 'toolbar',
			),
			'toolbar_location' => array(
				'label'             => esc_html__( 'Location', 'divi-pdf-embedder' ),
				'type'              => 'select',
				'option_category'   => 'basic_option',
				'options'         => array(
					'top' => esc_html__( 'Top', 'divi-pdf-embedder' ),
					'bottom'  => esc_html__( 'Bottom', 'divi-pdf-embedder' ),
					'both'  => esc_html__( 'Both', 'divi-pdf-embedder' ),
				),
				'default_on_front'=> 'bottom',
				'description'       => esc_html__( 'Select the location where the toolbar will appear.', 'divi-pdf-embedder' ),
				'toggle_slug'       => 'toolbar',
			),

		);

		return $fields;
	}

	function render( $attrs, $content = null, $render_slug ) {
		
		$shortcode = sprintf(
			'[pdf-embedder url="%s" height="%s" width="%s" toolbar="%s" toolbarfixed="%s"]',
			$this->props['url'],
			$this->props['size_height'],
			$this->props['size_width'],
			$this->props['toolbar_location'],
			$this->props['toolbar_state']
		);

		$output = do_shortcode($shortcode);
	
		return $output;

	}

}

new AIO_Builder_Module_PDF_Embedder;

?>
