<?php
/*
Plugin Name: Wood Slider
Plugin URI: http://MyNameisPageWood.com
Description: Responsive WordPress Slider based on Flexslider Script
Version: 1.0
Author: Page Wood
Author URI: http://MyNameisPageWood.com
License: GPL2
*/
/*
Copyright 2013  Page Wood  (email : page@pdubmedia.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('Wood_Slider'))
	{
	class Wood_Slider
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{
        	// Initialize Settings
            require_once(sprintf("%s/settings.php", dirname(__FILE__)));
            $Wood_Slider_Settings = new Wood_Slider_Settings();
        	
        	// Register custom post types
            require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
            $Post_Type_Template = new Post_Type_Template();


		} // END public function __construct
	    
		/**
		 * Activate the plugin
		 */
		public static function activate()
			{
				// Do nothing
			} // END public static function activate
	
		/**
		 * Deactivate the plugin
		 */		
		public static function deactivate()
			{
				// Do nothing
			} // END public static function deactivate
	} // END class Wood_Slider

} // END if(!class_exists('Wood_Slider'))

if(class_exists('Wood_Slider'))
	{
		// Installation and uninstallation hooks
		register_activation_hook(__FILE__, array('Wood_Slider', 'activate'));
		register_deactivation_hook(__FILE__, array('Wood_Slider', 'deactivate'));

		// instantiate the plugin class
		$Wood_Slider = new Wood_Slider();
		
	    // Add a link to the settings page onto the plugin page
	    if(isset($Wood_Slider))
			    {
			        // Add the settings link to the plugins page
			        function plugin_settings_link($links)
			        	{ 
				            $settings_link = '<a href="options-general.php?page=Wood_Slider">Settings</a>'; 
				            array_unshift($links, $settings_link); 
				            return $links; 
			        	}

			        $plugin = plugin_basename(__FILE__); 
			        add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
} // END if(!class_exists('Wood_slider'))


if(class_exists('Wood_Slider'))
		{
			// Register some javascript files, because we love javascript files. Enqueue a couple as well
				function wood_slider_load_javascript_files() {
				 
								//url to jquery flexslider

								$flexslider_jquery = WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)). '/assets/jquery.flexslider.js'; 
								$flexslider_code = WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)). '/assets/flexslider.js';

								wp_register_script( 'jquery.flexslider', $flexslider_jquery, array('jquery'));
								wp_register_script( 'flexslider-init', $flexslider_code);
								 

								wp_enqueue_script('jquery.flexslider');
								wp_enqueue_script('flexslider-init');

				 
				} //end wood_slider_load_javascript_files

				add_action( 'wp_enqueue_scripts', 'wood_slider_load_javascript_files' );
} // if class_exists


if(class_exists('Wood_Slider'))
	{
			// Register some CSS files, because we love CSS files. Enqueue a couple as well
			 
			function wood_slider_load_css() {
			 
			 //url to stylesheet
				$flexslider_css_url = WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)). '/assets/flexslider.css';
			 
			//
			wp_register_style( 'flexslider-style', $flexslider_css_url );
			wp_enqueue_style('flexslider-style');
			
			} //end wood_slider_load_javascript_files

			add_action( 'wp_print_styles', 'wood_slider_load_css' );
} // if class_exists


if(class_exists('Wood_Slider'))
	{
	function load_wood_slider(){

		$slider='<div class="flexslider"><ul class="slides">';
		$wood_query='post_type=wood-slider';
		query_posts($wood_query);

			if(have_posts()) : while (have_posts()) : the_post();
	     		$img = get_the_post_thumbnail ($post->ID,'full');
	     
	    		 $slider.='<li>'.$img.'</li>';
	     		endwhile; endif; wp_reset_query();
				$slider.='</ul></div>';
				
				return $slider;
	
	}

	/** add the shortcode **/

	function insert_wood_slider($atts, $content=null) {
		$slider= load_wood_slider();
		return $slider;
	}

	add_shortcode ('wood_slider', 'insert_wood_slider');
	/** add template tag for themes **/

	function use_wood_slider(){
		print load_wood_slider();
		}
} // If Class Exists


}