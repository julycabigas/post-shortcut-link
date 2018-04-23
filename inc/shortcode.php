<?php


Class Shortcode_Post {


	public function __constructor() {


		$this->get_shortcode();


	}


	function generate_shortcode( $atts ) {

		$atts = shortcode_atts(

					array(
						'link' => get_permalink(),
						'hash' => '',
						'title' => '',
						'icon' => false,
					),
					$atts, 
					'db_shortcut_link'
			 	);

			$link = $this->generate_template($atts);

			return $link;

	}


	/**
	*  Generate template for the shortcode
	*  
	*  @param $atts from shortcode - link, title & hash
	**/
	private function generate_template($atts) {

		$output = '';

		$output .= '<div class="db-section-link" id="'.  $atts['hash'] .'">';
		$output .= '<a href="dalebeaumont.com'. get_permalink() . '#' . $atts['hash'] .'" target="_blank" class="'. ( ( $atts['title'] == false) ? 'has_icon' :  '') .'">' . ( ( $atts['title'] ) ? $atts['title'] :  '<span class="fa fa-link"></span>') . '</a>';
		$output .= '<input type="hidden" /></div>';

		$output .= '<div class="db-link-copy" id="dbpopup-'. $atts['hash'].'"><div><span class="fa fa-close"></span><span class="text">Copied!</span><span class="link">dalebeaumont.com' . get_permalink() . '#'. $atts['hash'].'</span></div> </div>';

		return $output;

	}

	function get_shortcode() {


		return add_shortcode( 'db_shortcut_link', array( $this, 'generate_shortcode' ) );
	}


}