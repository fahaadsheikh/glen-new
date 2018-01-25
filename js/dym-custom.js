jQuery( document ).ready( function ($) {


	$.validator.addMethod("valueNotEquals", function(value, element, arg){
	 return arg !== value;
	}, "Please choose an option.");

	// Contact Form Validation
	$( ".contact-form" ).validate( {
		rules: {
			name: "required",
			phone: "required",
			email: {
				required: true,
				email: true
			},
		},
		messages: {
			name: "Please enter your Name",
			email: "Please enter a valid email address",
			phone: "Please enter a phone number"
		},
		errorElement: "div",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "invalid-feedback" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		}
	} );

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
			} else {
				error.insertAfter( element );
			}
		}
	} );

});