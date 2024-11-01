<?php
define('SMARTPHONELOCATIONLOOKUPSABSPATH', substr($_SERVER['SCRIPT_FILENAME'], 0, strpos($_SERVER['SCRIPT_FILENAME'], 'wp-content')).DIRECTORY_SEPARATOR);
require_once(SMARTPHONELOCATIONLOOKUPSABSPATH.'wp-load.php');

$options = get_option('widget_smartphone_location_lookup');

if(isset($_REQUEST['location']))
{
	$options['location'] = $_REQUEST['location'];
}
update_option('widget_smartphone_location_lookup', $options);