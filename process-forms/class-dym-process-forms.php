<?php

/**
* Class to to process form data
*/
class dym_process_forms
{
	
	function __construct()
	{
		add_action( 'after_switch_theme', array($this, 'dym_create_tables') ); 

		// Contact Form
		add_action('wp_ajax_dym_send_contact_request', array($this, 'dym_send_contact_request') );
		add_action('wp_ajax_nopriv_dym_send_contact_request', array($this, 'dym_send_contact_request') );

		// Enquiry Form
		add_action('wp_ajax_dym_send_and_save_enquiry', array($this, 'dym_send_and_save_enquiry') );
		add_action('wp_ajax_nopriv_dym_send_and_save_enquiry', array($this, 'dym_send_and_save_enquiry') );
	}

	/**
	 * Create Necessary Tables
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_create_tables()
	{
		global $wpdb;

		$table_name = $wpdb->prefix . 'dym_form_entries';
		
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			site_id INT(10) NOT NULL,
			property_type tinytext NOT NULL,
			unit tinytext,
			street tinytext NOT NULL,
			bedrooms tinytext NOT NULL,
			street_name tinytext NOT NULL,
			bathrooms tinytext NOT NULL,
			suburbs tinytext NOT NULL,
			conditions tinytext NOT NULL,
			state tinytext NOT NULL,
			est_size tinytext,
			property_relationship tinytext NOT NULL,
			parking tinytext NOT NULL,
			purpose_of_request tinytext NOT NULL,
			special_features tinytext,
			currently_listed tinytext NOT NULL,
			other tinytext,
			first_name tinytext NOT NULL,
			surname tinytext NOT NULL,
			telephone tinytext NOT NULL,
			email tinytext NOT NULL,
			confirm_email tinytext NOT NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		add_option( 'jal_db_version', '1.0' );
	}

	/**
	 * Insert Entries into the dym_form_entries tables
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_insert_entries($property_type, $unit, $street, $bedrooms, $street_name, $bathrooms, $suburbs, $conditions, $state, $est_size, $property_relationship, $parking, $purpose_of_request, $special_features, $currently_listed, $other, $first_name, $surname, $telephone, $email, $confirm_email)
	{
		global $wpdb;

		$table_name = $wpdb->prefix . 'dym_form_entries';

		$insert = $wpdb->insert( 
			$table_name, 
			array( 
				'time' 					=> current_time( 'mysql' ),
				'site_id' 				=> get_current_blog_id(),
				'property_type' 		=> $property_type,
				'unit' 					=> $unit,
				'street' 				=> $street,
				'bedrooms' 				=> $bedrooms,
				'street_name' 			=> $street_name,
				'bathrooms' 			=> $bathrooms,
				'suburbs' 				=> $suburbs,
				'conditions' 			=> $conditions,
				'state' 				=> $state,
				'est_size' 				=> $est_size,
				'property_relationship' => $property_relationship,
				'parking' 				=> $parking,
				'purpose_of_request' 	=> $purpose_of_request,
				'special_features' 		=> $special_features,
				'currently_listed' 		=> $currently_listed,
				'other' 				=> $other,
				'first_name' 			=> $first_name,
				'surname' 				=> $surname,
				'telephone' 			=> $telephone,
				'email' 				=> $email,
				'confirm_email' 		=> $confirm_email,
			) 
		);

		if ($insert > 0) {
			return true;
		}
		else {
			return false;
		}



	}

	/**
	 * Send and Save Enquiry Emails
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_send_and_save_enquiry()
	{
		$property_type 			= sanitize_text_field( $_POST['property_type'] );
		$unit 					= sanitize_text_field( $_POST['unit'] );
		$street 				= sanitize_text_field( $_POST['street']);
		$bedrooms 				= sanitize_text_field( $_POST['bedrooms']);
		$street_name 			= sanitize_text_field( $_POST['street_name'] );
		$bathrooms 				= sanitize_text_field( $_POST['bathrooms']);
		$suburbs 				= sanitize_text_field( $_POST['suburbs'] );
		$conditions 			= sanitize_text_field( $_POST['conditions'] );
		$state 					= sanitize_text_field( $_POST['state'] );
		$est_size 				= sanitize_text_field( $_POST['est_size'] );
		$property_relationship 	= sanitize_text_field( $_POST['property_relationship'] );
		$parking 				= sanitize_text_field( $_POST['parking'] );
		$purpose_of_request 	= sanitize_text_field( $_POST['purpose_of_request'] );
		$special_features 		= sanitize_text_field( $_POST['special_features'] );
		$currently_listed 		= sanitize_text_field( $_POST['currently_listed'] );
		$other 					= sanitize_text_field( $_POST['other'] );
		$first_name 			= sanitize_text_field( $_POST['first_name'] );
		$surname 				= sanitize_text_field( $_POST['surname'] );
		$telephone 				= sanitize_text_field( $_POST['telephone'] );
		$email 					= sanitize_text_field( $_POST['email'] );
		$confirm_email			= sanitize_text_field( $_POST['confirm_email'] );

		$insert = $this->dym_insert_entries($property_type, $unit, $street, $bedrooms, $street_name, $bathrooms, $suburbs, $conditions, $state, $est_size, $property_relationship, $parking, $purpose_of_request, $special_features, $currently_listed, $other, $first_name, $surname, $telephone, $email, $confirm_email);

		if ($insert) {
			$dym_send_enquiry_email = $this->dym_send_enquiry_email($property_type, $unit, $street, $bedrooms, $street_name, $bathrooms, $suburbs, $conditions, $state, $est_size, $property_relationship, $parking, $purpose_of_request, $special_features, $currently_listed, $other, $first_name, $surname, $telephone, $email, $confirm_email);
		}

		if ($dym_send_enquiry_email) {
			$dym_send_thankyou_email = $this->dym_send_thankyou_email($email, 'Enquiry');
		}

		if ($dym_send_thankyou_email) {
			echo "All Done";
		}
		else {
			echo "Not Done";
		}
		wp_die();
	}

	/**
	 * Send Enquiry Email
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_send_enquiry_email($property_type, $unit, $street, $bedrooms, $street_name, $bathrooms, $suburbs, $conditions, $state, $est_size, $property_relationship, $parking, $purpose_of_request, $special_features, $currently_listed, $other, $first_name, $surname, $telephone, $email) 
	{

		$form_entries = array( 
			'Property Type' 			=> $property_type,
			'Unit' 						=> $unit,
			'Street' 					=> $street,
			'Bedrooms' 					=> $bedrooms,
			'Street Name' 				=> $street_name,
			'Bathrooms' 				=> $bathrooms,
			'Suburbs' 					=> $suburbs,
			'Conditions' 				=> $conditions,
			'State' 					=> $state,
			'Est Size(sqm)' 			=> $est_size,
			'Relationship to Property' 	=> $property_relationship,
			'Parking' 					=> $parking,
			'Purpose of Request' 		=> $purpose_of_request,
			'Special Features' 			=> $special_features,
			'Currently Listed' 			=> $currently_listed,
			'Other' 					=> $other,
			'First Name' 				=> $first_name,
			'Surname' 					=> $surname,
			'Telephone' 				=> $telephone,
			'Email' 					=> $email,
		);

		$theme_options = get_option( 'dym_theme_options' ); 

		$to = $theme_options['dym_admin_email'];
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$subject = get_bloginfo( 'name' ) .  '- New Enquiry ';
		$message = '<html><body>';
		$message .= '<h3 align="center"> User Enquiry Information</h3>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10" align="center">';
		foreach ($form_entries as $key => $value) {
			$message .= "<tr style='background: #eee;'><td>". $key ."</td><td>". $value ."</td></tr>";
		}
		$message .= "</table>";
		$message .= '<h4 align="center">This e-mail was sent from the enquiry form on '. get_bloginfo( 'name' ) .'('. get_bloginfo('url') .')</h4>';
		$message .= '</body></html>';
		$sent_message = wp_mail( $to , $subject, $message, $headers );  

		return $sent_message;
	}

	/**
	 * Send Contact Request
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_send_contact_request()
	{
		$name 		= sanitize_text_field( $_POST['name'] );
		$email 		= sanitize_text_field( $_POST['email'] );
		$phone 		= sanitize_text_field( $_POST['phone'] );
		$address 	= sanitize_text_field( $_POST['address'] );
		$message 	= sanitize_text_field( $_POST['message'] );

		$dym_send_contact_email = $this->dym_send_contact_email($name, $email, $phone, $address, $message);


		if ($dym_send_contact_email) {
			$dym_send_thankyou_email = $this->dym_send_thankyou_email($email, 'Contact');
		}

		if ($dym_send_thankyou_email) {
			echo "All Done";
		}
		else {
			echo "Not Done";
		}
		wp_die();
	}

	/**
	 * Send Contact Email
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_send_contact_email($name, $email, $phone, $address, $message)
	{
		$theme_options = get_option( 'dym_theme_options' ); 

		$form_entries = array( 
			'Name' 		=> $name,
			'Email' 	=> $email,
			'Phone' 	=> $phone,
			'Address' 	=> $address,
			'Message'	=> $message
		);

		$to = $email;
		$subject = get_bloginfo('name') . ' ' . $type . ' Submission Recieved';
		$message .= '<h3 align="center"> Contact Enquiry Information</h3>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10" align="center">';
		foreach ($form_entries as $key => $value) {
			$message .= "<tr style='background: #eee;'><td>". $key ."</td><td>". $value ."</td></tr>";
		}
		$message .= "</table>";
		$message .= '<h4 align="center">This e-mail was sent from the enquiry form on '. get_bloginfo( 'name' ) .'('. get_bloginfo('url') .')</h4>';
		$message .= "<br><br><br>";
		$reply_message = wp_mail( $to , $subject, $message, $headers ); 

		return $reply_message;
	}

	/**
	 * Send Thankyou Email
	 *
	 * @return void
	 * @author 
	 **/
	public function dym_send_thankyou_email($email, $type)
	{
		$theme_options = get_option( 'dym_theme_options' ); 

		$to = $theme_options['dym_admin_email'];
		$subject = get_bloginfo('name') . ' ' . $type . ' Submission Recieved';
		$message = "Thankyou for your request for information from ". get_bloginfo('name') . ".<br>"; 
		$message .= "We will be responding to this request within the next 48 hours.<br>";
		$message .= "<br><br><br>";
		$message .= "Regards:<br>";
		$message .= get_bloginfo('name') . "<br>";
		$message .= get_bloginfo('url') . "<br>";
		$message .= $theme_options['dym_admin_email'] . "<br>";
		$reply_message = wp_mail( $to , $subject, $message, $headers ); 

		return $reply_message;
	}
}

$dym_process_forms = new dym_process_forms();