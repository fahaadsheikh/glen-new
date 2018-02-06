jQuery( document ).ready( function ($) {


	$.validator.addMethod("valueNotEquals", function(value, element, arg){
	 return arg !== value;
	}, "Please choose an option.");


	// Enquiry Form Validaton
	$( ".enquiry-form" ).validate( {
		rules: {
			property_type: { 
				valueNotEquals: "-1" 
			},
			street: "required",
			bedrooms: { 
				valueNotEquals: "-1" 
			},
			street_name: "required",
			bathrooms: { 
				valueNotEquals: "-1" 
			},
			suburbs: "required",
			condition: { 
				valueNotEquals: "-1" 
			},
			state: "required",
			property_relationship: "required",
			parking: { 
				valueNotEquals: "-1" 
			},
			purpose_of_request: "required",
			currently_listed: "required",
			first_name : "required",
			surname: "required",
			termsagree: "required",
			email: {
				required: true,
				email: true
			},
			confirm_email: {
				required: true,
				email: true,
				equalTo: "#email"
			},
			telephone: "required",
			
		},
		messages: {
			property_type: "Please enter a Property Type",
			street: "Please enter a Street Number",
			bedrooms: "Please choose Bedrooms",
			street_name: "Please enter a Street Name",
			bathrooms: "Please choose Bathrooms",
			suburbs: "Please enter Suburbs",
			condition: "Please choose Condition",
			state: "Please enter a State",
			property_relationship: "Please enter a Relationship to Property",
			parking: "Please choose Parking",
			purpose_of_request: "Please choose a Purpose of Request",
			currently_listed: "Please choose Currently Listed",
			first_name : "Please enter a First Name",
			surname: "Please enter a Surname",
			email: "Please enter a valid email address",
			confirm_email: {
				required: "Please enter a valid email address",
            	equalTo: "Your emails do not match",
        	},
			termsagree: "Please check to agree to the terms and conditions"
		},
		errorElement: "div",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "invalid-feedback" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if(element.prop( "type" ) === "radio") {
				error.appendTo( element.parent().parent() );
			} else {
				error.insertAfter( element );
			}
		},
		submitHandler: function(form) {
			$(form).ajaxSubmit();
			send_enquiry();
		}
	} );

	function send_enquiry() {

	    var form = jQuery(this);

	    if ( form.data('requestRunning') ) {
	        return;
	    }

	    form.data('requestRunning', true);

	    jQuery.ajax({
			url : ajax_object.ajax_url,
			type : 'post',
			dataType : 'text',
			data : {
				action 					: 'dym_send_and_save_enquiry',
				property_type 			: $("#property_type").val(),
				unit 					: $("#unit").val(),
				street 					: $("#street").val(),
				bedrooms 				: $("#bedrooms").val(),
				street_name 			: $("#street_name").val(),
				bathrooms 				: $("#bathrooms").val(),
				suburbs 				: $("#suburbs").val(),
				conditions 				: $("#condition").val(),
				state 					: $("#state").val(),
				est_size 				: $("#est_size").val(),
				property_relationship 	: $("#property_relationship").val(),
				parking 				: $("#parking").val(),
				purpose_of_request 		: $("#purpose_of_request").val(),
				special_features 		: $("#special_features").val(),
				currently_listed 		: $("#input[name=currently_listed]:checked").val(),
				other 					: $("#other").val(),
				first_name 				: $("#first_name").val(),
				surname 				: $("#surname").val(),
				telephone 				: $("#telephone").val(),
				email 					: $("#email").val(),
				confirm_email			: $("#confirm_email").val(),
				nonce 					: $("#enquiry_nonce").val(),
			},
			beforeSend: function () {
				// Show Loader
				$('.btn').prop('disabled', true);
				$(".loader").css('display', 'inline-block');
				$(".loader").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
			},
			success: function( response ) {
				$('.btn').prop('disabled', false);
				$(".loader").css('display', 'none');
				$(".loader").html('');
				$('#enf-modal').modal('show');
			},
			error: function(xhr, ajaxOptions, thrownError) {				
				$( '.response-message' ).removeClass('alert-success');
				$( '.response-message' ).addClass('alert-danger');
				$( '.response-message' ).text( 'There was an Error. Please Try Again' );
			},
			complete: function() {
			    form.data('requestRunning', false);
			}
		});

	    return false;
	};

	// Contact Form Validaton
	$( ".contact-form" ).validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			},
			phone: "required",
			text_message: "required",
		},
		messages: {
			name: "Please enter your name",
			email: "Please enter a valid email address",
			phone: "Please enter your phone number",
			text_message: "Please enter a message.",
		},
		errorElement: "div",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "invalid-feedback" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if(element.prop( "type" ) === "radio") {
				error.appendTo( element.parent().parent() );
			} else {
				error.insertAfter( element );
			}
		},
		submitHandler: function(form) {
			$(form).ajaxSubmit();
			send_contact_request();
		}
	});

	function send_contact_request() {

	    var form = jQuery(this);

	    if ( form.data('requestRunning') ) {
	        return;
	    }

	    form.data('requestRunning', true);

	    jQuery.ajax({
			url : ajax_object.ajax_url,
			type : 'post',
			dataType : 'text',
			data : {
				action 	: 'dym_send_contact_request',
				name 	: $("#name").val(),
				email 	: $("#email").val(),
				phone 	: $("#phone").val(),
				message : $("#text_message").val(),
				address : $("#address").val()	
			},
			beforeSend: function () {
				// Show Loader
				$('.btn').prop('disabled', true);
				$(".loader").css('display', 'inline-block');
				$(".loader").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
			},
			success: function( response ) {
				console.log(response);
				$('.btn').prop('disabled', false);
				$(".loader").css('display', 'none');
				$(".loader").html('');
				$('#cf-modal').modal('show');
			},
			error: function(xhr, ajaxOptions, thrownError) {				
				$( '.response-message' ).removeClass('alert-success');
				$( '.response-message' ).addClass('alert-danger');
				$( '.response-message' ).text( 'There was an Error. Please Try Again' );
			},
			complete: function() {
			    form.data('requestRunning', false);
			}
		});

	    return false;
	};

	// Front page Modal

	$( ".get_my_report" ).click(function() {
		$('#fp-modal').modal('show');
	});

	// Contact Form Validaton
	$( ".consult-form" ).validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			},
			telephone: "required",
		},
		messages: {
			name: "Please enter your name",
			email: "Please enter a valid email address",
			telephone: "Please enter your phone number"
		},
		errorElement: "div",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "invalid-feedback" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else if(element.prop( "type" ) === "radio") {
				error.appendTo( element.parent().parent() );
			} else {
				error.insertAfter( element );
			}
		},
		submitHandler: function(form) {
			$(form).ajaxSubmit();
			send_consult_request();
		}
	});

	function send_consult_request() {

	    var form = jQuery(this);

	    if ( form.data('requestRunning') ) {
	        return;
	    }

	    form.data('requestRunning', true);

	    jQuery.ajax({
			url : ajax_object.ajax_url,
			type : 'post',
			dataType : 'text',
			data : {
				action 	: 'dym_send_consult_request',
				name 	: $("#name").val(),
				email 	: $("#email").val(),
				phone 	: $("#phone").val()
			},
			beforeSend: function () {
				// Show Loader
				$('.btn').prop('disabled', true);
				$(".loader").css('display', 'inline-block');
				$(".loader").html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
			},
			success: function( response ) {
				console.log(response);
				$('.btn').prop('disabled', false);
				$(".loader").html('<p>Your Message was sent successfully</p>');
				$(".loader").css({
					'display': 'block',
					'width': '100%',
					'height': 'auto'
				});;
			},
			error: function(xhr, ajaxOptions, thrownError) {				
				$( '.response-message' ).removeClass('alert-success');
				$( '.response-message' ).addClass('alert-danger');
				$( '.response-message' ).text( 'There was an Error. Please Try Again' );
			},
			complete: function() {
			    form.data('requestRunning', false);
			}
		});

	    return false;
	};

});