<?php

class JhjCrtc_Shortcode{

	private $fileurl;

	function __construct() {
		$this->add_shortcodes();
	}

	function add_shortcodes() {
		add_shortcode( 'display_crtc', array( $this, 'get_crtc_list' ) );
	}

	function get_crtc_list() {
		$crtc_str = '';
		$crtc_terms = get_terms( 'Category' );

		foreach ( $crtc_terms as $crtc_term ) {
		    $crtc_term_query = new WP_Query( array(
		        'post_type' => 'crtc',
		        'posts_per_page' => -1,
		        'tax_query' => array(
		            array(
		                'taxonomy' => 'category',
		                'field' => 'slug',
		                'terms' => array( $crtc_term->slug ),
		                'operator' => 'IN'
		            )
		        )
		    ) );
		    //ensure category before appending
		    if ( 'Uncategorized' !== $crtc_term->name ) {

				$crtc_str .= '<h2>'. $crtc_term->name . '</h2>';
				$crtc_str .= '<ul>';
				if ( $crtc_term_query->have_posts() ) : while ( $crtc_term_query->have_posts() ) : $crtc_term_query->the_post();
						// get the url for the file
						$this->fileurl = get_post_meta( get_the_ID(), 'jhj_ctrc_file_url', true );
						//append to string
						$crtc_str .= '<li><a href="'. $this->fileurl.'" target="_blank">' . get_the_title() . '</a></li>';
				endwhile; endif;

				$crtc_str .= '</ul>';
			}

			// Reset things
			$member_group_query = null;
			wp_reset_postdata();
		}
		return $crtc_str;
	}
}
