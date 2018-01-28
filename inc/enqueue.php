<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'understrap-styles', get_template_directory_uri() . '/css/theme.min.css', array(), $the_theme->get( 'Version' ), false );
		wp_enqueue_style( 'theme-styles', get_template_directory_uri() . '/css/theme_styles.css' );

		/* Add styles from themeoptions css*/
		$theme_options = get_option( 'dym_theme_options' );
		$primary_color = $theme_options['primary_color'];
		$secondary_color = $theme_options['secondary_color'];
		$background_color = $theme_options['background_color'];

		$custom_css = "
		        body{
		            background-color: {$background_color};
		        }
		        .btn, .consult-box, #wrapper-footer {
		        	background-color: {$primary_color};
		        	border-color: {$primary_color};
		        }
		        .sep:after {
		        	background-color: {$secondary_color};
		        }
		        a, .light, p.term, .modal-title, .feature-icon, .feature-title  {
		        	color: {$primary_color};
		        }
		        .dark, .loader, .section-title, .section-subtitle, .sep {
		        	color: {$secondary_color};
		        }

		        ";
		wp_add_inline_style( 'understrap-styles', $custom_css );

		
		wp_enqueue_script( 'jquery');
		wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), true);
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		if (is_page_template( 'template_enquiry-form.php' ) || is_page_template( 'template_contact-form.php' )) {
			wp_enqueue_script( 'jquery-form-js', get_template_directory_uri() . '/js/jquery.form.js', array(), $the_theme->get( 'Version' ), true );
			wp_enqueue_script( 'jquery-validation', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery-form-js'), $the_theme->get( 'Version' ), true );
			wp_enqueue_script( 'dym-custom-js', get_template_directory_uri() . '/js/dym-custom.js', array('jquery-form-js','jquery-validation'), $the_theme->get( 'Version' ), true );
			// in JavaScript, object properties are accessed as ajax_object.ajax_url, ajax_object.we_value
			wp_localize_script( 'dym-custom-js', 'ajax_object',
				array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => 1234 ) );
		}

		
		
	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );
