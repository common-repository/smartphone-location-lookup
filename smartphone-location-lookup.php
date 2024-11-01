<?php
/*
Plugin Name: Smartphone Location Lookup
Plugin URI: http://redyellow.co.uk/plugins/smartphone-location-lookup/
Description: Display a location based map on your sidebar. If you have a smartphone with GPS capabilities, you can have it update your location dynamically!
Author: Rich Gubby
Version: 1.0.1
Author URI: http://redyellow.co.uk
*/

require_once('functions.php');

add_action('plugins_loaded', 'smartphoneLocationLookupInit');