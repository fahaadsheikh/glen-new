<?php
class MySettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /** 
     * Generic Function to generate printf
     */
    private function dym_generate_output($type, $key, $defaulvalue)
    {
        if ($type == 'textarea') {
            printf(
                '<textarea id="'.$key.'" name="dym_theme_options['.$key.']" rows="7" cols="80"/>%s</textarea>',
                isset( $this->options[''.$key.''] ) ? esc_attr( $this->options[''.$key.'']) : $defaulvalue
            );
        }
        elseif ($type == 'color') {
            printf(
                '<input type="text" class="color-field" id="'.$key.'" name="dym_theme_options['.$key.']" value="%s" />',
                isset( $this->options[''.$key.''] ) ? esc_attr( $this->options[''.$key.'']) : $defaulvalue
            );
        }
        else {
            printf(
                '<input type="'.$type.'" class="regular-text" id="'.$key.'" name="dym_theme_options['.$key.']" value="%s" />',
                isset( $this->options[''.$key.''] ) ? esc_attr( $this->options[''.$key.'']) : $defaulvalue
            );
        }
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin', 
            'Theme Settings', 
            'manage_options', 
            'theme-setting-admin', 
            array( $this, 'create_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option( 'dym_theme_options' );
        ?>
        <div class="wrap">
            <h1>Theme Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                
                settings_fields( 'dym_theme_options_group' );
                do_settings_sections( 'theme_options' );

                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'dym_theme_options_group', // Option group
            'dym_theme_options', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

        add_settings_section(
            'dym_theme_setting_section', // ID
            'Theme Options', // Title
            array( $this, 'print_section_info' ), // Callback
            'theme_options' // Page
        );  

        add_settings_field(
            'primary_color', // ID
            'Primary Color', // Title 
            array( $this, 'primary_color_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );     

        add_settings_field(
            'secondary_color', // ID
            'Secondary Color', // Title 
            array( $this, 'secondary_color_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        ); 

        add_settings_field(
            'background_color', // ID
            'Background Color', // Title 
            array( $this, 'background_color_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );  

        add_settings_field(
            'dym_admin_email', // ID
            'Admin Email', // Title 
            array( $this, 'dym_admin_email_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        /* Homepage Settings Section */

        add_settings_field(
            'dym_homepage_banner_tagline', // ID
            'Homepage Banner Tagline', // Title 
            array( $this, 'dym_homepage_banner_tagline_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_homepage_report_box_text', // ID
            'Homepage Report Box Text', // Title 
            array( $this, 'dym_homepage_report_box_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_homepage_report_button_text', // ID
            'Homepage Report Button Text', // Title 
            array( $this, 'dym_homepage_report_button_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_homepage_consult_box_text', // ID
            'Homepage Consult Box Text', // Title 
            array( $this, 'dym_homepage_consult_box_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_homepage_consult_button_text', // ID
            'Homepage Consult Button Text', // Title 
            array( $this, 'dym_homepage_consult_button_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_homepage_section_title_text', // ID
            'Homepage Section Title Text', // Title 
            array( $this, 'dym_homepage_section_title_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_homepage_section_subtitle_text', // ID
            'Homepage Section Subtitle Text', // Title 
            array( $this, 'dym_homepage_section_subtitle_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        // Feature 1
        add_settings_field(
            'dym_homepage_section_feature_one_icon', // ID
            'Feature One Icon', // Title 
            array( $this, 'dym_homepage_section_feature_one_icon_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
        add_settings_field(
            'dym_homepage_section_feature_one_heading', // ID
            'Feature One Heading', // Title 
            array( $this, 'dym_homepage_section_feature_one_heading_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
        add_settings_field(
            'dym_homepage_section_feature_one_text', // ID
            'Feature One Text', // Title 
            array( $this, 'dym_homepage_section_feature_one_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );


        // Feature 2
        add_settings_field(
            'dym_homepage_section_feature_two_icon', // ID
            'Feature Two Icon', // Title 
            array( $this, 'dym_homepage_section_feature_two_icon_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
        add_settings_field(
            'dym_homepage_section_feature_two_heading', // ID
            'Feature Two Heading', // Title 
            array( $this, 'dym_homepage_section_feature_two_heading_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
        add_settings_field(
            'dym_homepage_section_feature_two_text', // ID
            'Feature Two Text', // Title 
            array( $this, 'dym_homepage_section_feature_two_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        // Feature 3
        add_settings_field(
            'dym_homepage_section_feature_three_icon', // ID
            'Feature Three Icon', // Title 
            array( $this, 'dym_homepage_section_feature_three_icon_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
        add_settings_field(
            'dym_homepage_section_feature_three_heading', // ID
            'Feature Three Heading', // Title 
            array( $this, 'dym_homepage_section_feature_three_heading_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
        add_settings_field(
            'dym_homepage_section_feature_three_text', // ID
            'Feature Three Text', // Title 
            array( $this, 'dym_homepage_section_feature_three_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        /* Enquiry Form Section */

        add_settings_field(
            'dym_enquiry_intro_one', // ID
            'Enquiry Intro One', // Title 
            array( $this, 'dym_enquiry_intro_one_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_enquiry_intro_two', // ID
            'Enquiry Intro Two', // Title 
            array( $this, 'dym_enquiry_intro_two_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_enquiry_heading_one', // ID
            'Enquiry Heading One', // Title 
            array( $this, 'dym_enquiry_heading_one_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_enquiry_heading_two', // ID
            'Enquiry Heading Two', // Title 
            array( $this, 'dym_enquiry_heading_two_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );

        add_settings_field(
            'dym_enquiry_terms_text', // ID
            'Enquiry Terms Text', // Title 
            array( $this, 'dym_enquiry_terms_text_callback' ), // Callback
            'theme_options', // Page
            'dym_theme_setting_section' // Section           
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {   

        $new_input = array();
        if( isset( $input['primary_color'] ) )
            $new_input['primary_color'] = sanitize_text_field( $input['primary_color'] );
        if( isset( $input['secondary_color'] ) )
            $new_input['secondary_color'] = sanitize_text_field( $input['secondary_color'] );
        if( isset( $input['background_color'] ) )
            $new_input['background_color'] = sanitize_text_field( $input['background_color'] );
        if( isset( $input['dym_admin_email'] ) )
            $new_input['dym_admin_email'] = sanitize_text_field( $input['dym_admin_email'] );
        /* Homepage Options */
        if( isset( $input['dym_homepage_banner_tagline'] ) )
            $new_input['dym_homepage_banner_tagline'] = sanitize_text_field( $input['dym_homepage_banner_tagline'] );

        if( isset( $input['dym_homepage_report_box_text'] ) )
            $new_input['dym_homepage_report_box_text'] =  $input['dym_homepage_report_box_text'] ;
        if( isset( $input['dym_homepage_report_button_text'] ) )
            $new_input['dym_homepage_report_button_text'] =  sanitize_text_field( $input['dym_homepage_report_button_text']);

        if( isset( $input['dym_homepage_consult_box_text'] ) )
            $new_input['dym_homepage_consult_box_text'] =  $input['dym_homepage_consult_box_text'] ;
        if( isset( $input['dym_homepage_consult_button_text'] ) )
            $new_input['dym_homepage_consult_button_text'] =  sanitize_text_field( $input['dym_homepage_consult_button_text'] );
        
        if( isset( $input['dym_homepage_section_title'] ) )
            $new_input['dym_homepage_section_title'] =  sanitize_text_field( $input['dym_homepage_section_title'] );
        if( isset( $input['dym_homepage_section_subtitle'] ) )
            $new_input['dym_homepage_section_subtitle'] =  sanitize_text_field( $input['dym_homepage_section_subtitle'] );

        // Feature 1
        if( isset( $input['dym_homepage_section_feature_one_icon'] ) )
            $new_input['dym_homepage_section_feature_one_icon'] =  sanitize_text_field( $input['dym_homepage_section_feature_one_icon'] );
        if( isset( $input['dym_homepage_section_feature_one_heading'] ) )
            $new_input['dym_homepage_section_feature_one_heading'] =  sanitize_text_field( $input['dym_homepage_section_feature_one_heading'] );
        if( isset( $input['dym_homepage_section_feature_one_text'] ) )
            $new_input['dym_homepage_section_feature_one_text'] =  sanitize_text_field( $input['dym_homepage_section_feature_one_text'] );

        // Feature 2
        if( isset( $input['dym_homepage_section_feature_two_icon'] ) )
            $new_input['dym_homepage_section_feature_two_icon'] =  sanitize_text_field( $input['dym_homepage_section_feature_two_icon'] );
        if( isset( $input['dym_homepage_section_feature_two_heading'] ) )
            $new_input['dym_homepage_section_feature_two_heading'] =  sanitize_text_field( $input['dym_homepage_section_feature_two_heading'] );
        if( isset( $input['dym_homepage_section_feature_two_text'] ) )
            $new_input['dym_homepage_section_feature_two_text'] =  sanitize_text_field( $input['dym_homepage_section_feature_two_text'] );

        // Feature 3
        if( isset( $input['dym_homepage_section_feature_three_icon'] ) )
            $new_input['dym_homepage_section_feature_three_icon'] =  sanitize_text_field( $input['dym_homepage_section_feature_three_icon'] );
        if( isset( $input['dym_homepage_section_feature_three_heading'] ) )
            $new_input['dym_homepage_section_feature_three_heading'] =  sanitize_text_field( $input['dym_homepage_section_feature_three_heading'] );
        if( isset( $input['dym_homepage_section_feature_three_text'] ) )
            $new_input['dym_homepage_section_feature_three_text'] =  sanitize_text_field( $input['dym_homepage_section_feature_three_text'] );

        /* Enquiry Form  */
        if( isset( $input['dym_enquiry_intro_one'] ) )
            $new_input['dym_enquiry_intro_one'] =  sanitize_text_field( $input['dym_enquiry_intro_one'] );
        if( isset( $input['dym_enquiry_intro_two'] ) )
            $new_input['dym_enquiry_intro_two'] =  sanitize_text_field( $input['dym_enquiry_intro_two'] );
        if( isset( $input['dym_enquiry_heading_one'] ) )
            $new_input['dym_enquiry_heading_one'] =  sanitize_text_field( $input['dym_enquiry_heading_one'] );
        if( isset( $input['dym_enquiry_heading_two'] ) )
            $new_input['dym_enquiry_heading_two'] =  sanitize_text_field( $input['dym_enquiry_heading_two'] );
        if( isset( $input['dym_enquiry_terms_text'] ) )
            $new_input['dym_enquiry_terms_text'] =  sanitize_text_field( $input['dym_enquiry_terms_text'] );



        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function primary_color_callback()
    {
        $this->dym_generate_output('color', 'primary_color', '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function secondary_color_callback()
    {
        $this->dym_generate_output('color', 'secondary_color', '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function background_color_callback()
    {
        $this->dym_generate_output('color', 'background_color', '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_admin_email_callback()
    {
        $this->dym_generate_output('email', 'dym_admin_email', '');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_banner_tagline_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_banner_tagline', 'Find Out What Your House is Worth For Free');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_report_box_text_callback()
    {
        $this->dym_generate_output('textarea', 'dym_homepage_report_box_text', 'Get your <strong class="light">free report</strong>from your area expert on todays market Conditions');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_report_button_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_report_button_text', 'Get My Report Now');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_consult_box_text_callback()
    {
        $this->dym_generate_output('textarea', 'dym_homepage_consult_box_text', 'Get a free<strong class="dark">30 minute consult</strong><strong>From your Expert</strong>on todays market Conditions');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_consult_button_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_consult_button_text', 'Get My Report Now');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_title_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_title', 'WHATS INCLUDED');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_subtitle_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_subtitle', 'We will also provide you');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_feature_one_icon_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_one_icon', 'fa-bolt');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_feature_one_heading_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_one_heading', 'Speed up Development');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_feature_one_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_one_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_feature_two_icon_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_two_icon', 'fa-bolt');
    }

    /** 
     * Get the settings option array and print two of its values
     */
    public function dym_homepage_section_feature_two_heading_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_two_heading', 'Speed up Development');
    }

    /** 
     * Get the settings option array and print two of its values
     */
    public function dym_homepage_section_feature_two_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_two_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_homepage_section_feature_three_icon_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_three_icon', 'fa-bolt');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_homepage_section_feature_three_heading_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_three_heading', 'Speed up Development');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_homepage_section_feature_three_text_callback()
    {
        $this->dym_generate_output('text', 'dym_homepage_section_feature_three_text', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_enquiry_intro_one_callback()
    {
        $this->dym_generate_output('textarea', 'dym_enquiry_intro_one', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_enquiry_intro_two_callback()
    {
        $this->dym_generate_output('textarea', 'dym_enquiry_intro_two', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_enquiry_heading_one_callback()
    {
        $this->dym_generate_output('text', 'dym_enquiry_heading_one', 'About Your Property');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_enquiry_heading_two_callback()
    {
        $this->dym_generate_output('text', 'dym_enquiry_heading_two', 'About Your Property');
    }

    /** 
     * Get the settings option array and print three of its values
     */
    public function dym_enquiry_terms_text_callback()
    {
        $this->dym_generate_output('textarea', 'dym_enquiry_terms_text', 'collects your information to provide our services and may use it to provide you with information about other valuable related services. If you dont provide your information you may not be able to access our products or services. Our Privacy Policy contains full details on how your information is used, how you may access or correct your information held and our privacy complaints process.');
    }
    





}

if( is_admin() )
    $my_settings_page = new MySettingsPage();