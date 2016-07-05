<?php

class JhjCrtc_Metabox {

	public $fileurl;

	function __construct() {
		self::set_actions();
	}
	function set_actions() {
		add_action( 'add_meta_boxes', array( $this, 'set_metabox' ) );
		add_action( 'save_post', array( $this, 'save_post' ) );
	}
	function set_metabox() {
		add_meta_box(
			'jhj_crtc_meta_box', //unique identifier for the meta box (it does not have to match the function name)
			__( 'CRTC Notice Details', 'myplugin_textdomain' ), //The title of the meta box (visible to users)
			array( $this, 'get_content' ), //The function which will display the contents of the box,
			'crtc', //The post type the meta box belongs to,
			'normal',//The placement of the meta box
			'high' // The priority of the meta box (determines “how high” it is placed).
			);
	}
	function get_content( $post ) {
		// Set up nounce
		wp_nonce_field( 'jhj_crtc_nonce_action', 'jhj_crtc_nonce_field' );
		 //Get Variables
		$this->fileurl = get_post_meta( $post->ID, 'jhj_ctrc_file_url', true );
		//display Content
		$this->display_content();
	}

	function display_content() {
		//set up nounce
		wp_nonce_field( 'ncc_news_nonce_action', 'ncc_news_nonce_field' );
		//Create Metabox String
		$contentStr = '<table class="form-table">';
		//FILE UPLOAD
		$contentStr .= '<tr valign="top" class="alternate">';
		$contentStr .= '<td scope="row"><label for="jhj_crtc_pdf_url">PDF Upload</label></td>';
		$contentStr .= '<td>';
		$contentStr .= '<input class="jhj_crtc_pdf_url regular-text" type="text" name="jhj_crtc_pdf_url" size="60" value="'. $this->fileurl .'">';
		$contentStr .= '<a href="#" class="jhj_crtc_pdf_upload">Upload PDF</a>';
		if( strlen( $this->fileurl )!=0 ) {
			$contentStr .='<a href="'. $this->fileurl . '">Open PDF</a>';
		}
		$contentStr .= '</td>';
		$contentStr .= '</tr>';
		$contentStr .= '</table>';

		//Display Metabox
		echo $contentStr;
	}

	function save_post( $post_id ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

	    //ensure the save request is coming from the site
		if ( isset( $_POST['jhj_crtc_nonce_field'] ) && ! wp_verify_nonce( $_POST['jhj_crtc_nonce_field'], 'jhj_crtc_nonce_action' ) ) {
			return;
		}

		if ( isset($_POST['post_type']) && 'crtc' == $_POST['post_type'] ) {
			if ( !current_user_can( 'edit_page', $post_id ) ){
				return;
			} else {
				if ( !current_user_can( 'edit_post', $post_id ) ){
					return;
				}
			}
			//sanitize
			$this->fileurl = ! empty( $_POST['jhj_crtc_pdf_url'] ) ? sanitize_text_field( $_POST['jhj_crtc_pdf_url'] ) : '';
			//update
			update_post_meta( $post_id, 'jhj_ctrc_file_url', $this->fileurl );
		}
	}
}
