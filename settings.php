<?php
if(!class_exists('Wood_Slider_Settings'))
{
	class Wood_Slider_Settings
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
			// register actions
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
		} // END public function __construct
		
        /**
         * hook into WP's admin_init action hook
         */
        public function admin_init()
        {
        	// register your plugin's settings
        	register_setting('Wood_Slider-group', 'setting_a');
        	register_setting('Wood_Slider-group', 'setting_b');

        	// add your settings section
        	add_settings_section(
        	    'Wood_Slider-section', 
        	    'Wood Slider Settings', 
        	    array(&$this, 'settings_section_Wood_Slider'), 
        	    'Wood_Slider'
        	);
        	
        	// add your setting's fields
            add_settings_field(
                'Wood_Slider-setting_a', 
                'Slide Animation Type', 
                array(&$this, 'settings_field_input_text'), 
                'Wood_Slider', 
                'Wood_Slider-section',
                array(
                    'field' => 'setting_a'
                )
            );
            add_settings_field(
                'Wood_Slider-setting_b', 
                'Slide Background Hex Value', 
                array(&$this, 'settings_field_input_text'), 
                'Wood_Slider', 
                'Wood_Slider-section',
                array(
                    'field' => 'setting_b'
                )
            );
            // Possibly do additional admin_init tasks
        } // END public static function activate
        
        public function settings_section_Wood_Slider()
        {
            // Think of this as help text for the section.
            echo 'These settings do things for the Wood Slider Plugin.';
        }
        
        /**
         * This function provides text inputs for settings fields
         */
        public function settings_field_input_text($args)
        {
            // Get the field name from the $args array
            $field = $args['field'];
            // Get the value of this setting
            $value = get_option($field);
            // echo a proper input type="text"
            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        } // END public function settings_field_input_text($args)
        
        /**
         * add a menu
         */		
        public function add_menu()
        {
            // Add a page to manage this plugin's settings
        	add_options_page(
        	    'Wood Slider Settings', 
        	    'Wood Slider', 
        	    'manage_options', 
        	    'Wood_Slider', 
        	    array(&$this, 'plugin_settings_page')
        	);
        } // END public function add_menu()
    
        /**
         * Menu Callback
         */		
        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__('You do not have sufficient permissions to access this page.'));
        	}
	
        	// Render the settings template
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()
    } // END class Wood_Slider_Settings
} // END if(!class_exists('Wood_Slider_Settings'))
