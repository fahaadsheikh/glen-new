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
            <h1>My Settings</h1>
            <form method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'dym_theme_options_group' );
                do_settings_sections( 'my-setting-admin' );
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
            'My Custom Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  

        add_settings_field(
            'primary_color', // ID
            'Primary Color', // Title 
            array( $this, 'primary_color_callback' ), // Callback
            'my-setting-admin', // Page
            'dym_theme_setting_section' // Section           
        );     

        add_settings_field(
            'secondary_color', // ID
            'Secondary Color', // Title 
            array( $this, 'secondary_color_callback' ), // Callback
            'my-setting-admin', // Page
            'dym_theme_setting_section' // Section           
        ); 

        add_settings_field(
            'background_color', // ID
            'Background Color', // Title 
            array( $this, 'background_color_callback' ), // Callback
            'my-setting-admin', // Page
            'dym_theme_setting_section' // Section           
        );  

        add_settings_field(
            'dym_admin_email', // ID
            'Admin Email', // Title 
            array( $this, 'dym_admin_email_callback' ), // Callback
            'my-setting-admin', // Page
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
        printf(
            '<input type="color" class="color-field" id="primary_color" name="dym_theme_options[primary_color]" value="%s" />',
            isset( $this->options['primary_color'] ) ? esc_attr( $this->options['primary_color']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function secondary_color_callback()
    {
        printf(
            '<input type="color" class="color-field" id="secondary_color" name="dym_theme_options[secondary_color]" value="%s" />',
            isset( $this->options['secondary_color'] ) ? esc_attr( $this->options['secondary_color']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function background_color_callback()
    {
        printf(
            '<input type="color" class="color-field" id="background_color" name="dym_theme_options[background_color]" value="%s" />',
            isset( $this->options['background_color'] ) ? esc_attr( $this->options['background_color']) : ''
        );
    }

    /** 
     * Get the settings option array and print one of its values
     */
    public function dym_admin_email_callback()
    {
        printf(
            '<input type="email" class="regular-text" id="dym_admin_email" name="dym_theme_options[dym_admin_email]" value="%s" />',
            isset( $this->options['dym_admin_email'] ) ? esc_attr( $this->options['dym_admin_email']) : ''
        );
    }

}

if( is_admin() )
    $my_settings_page = new MySettingsPage();