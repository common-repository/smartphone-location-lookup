<?php
if(!function_exists('smartphoneLocationLookupInit'))
{
	/**
	 * Setup the Admin Page
	 * @access public
	 * @author Rich Gubby
	 * @since 1.0
	 * @return void
	 */
	function smartphoneLocationLookupInit()
	{
		if ( !function_exists('register_sidebar_widget') )
		return;
		
		function smartphoneLocationLookup($args) 
		{
			extract($args);
			$options = get_option('widget_smartphone_location_lookup');
			
			if(!isset($options['title'])) $options['title'] = 'Smartphone Location Lookup';
			if(!isset($options['location'])) $options['location'] = '0,0';
			if(!isset($options['width'])) $options['width'] = '150';
			if(!isset($options['provider'])) $options['provider'] = 'google';

			echo $before_widget . $before_title . $options['title'] . $after_title;
			
			// Which map provider are we using?
			switch($options['provider'])
			{
				case 'google':
			
					// Google Settings
					if(!isset($options['googleZoom'])) $options['googleZoom'] = '14';
					if(!isset($options['googleMapType'])) $options['googleMapType'] = 'roadmap';
					if(!isset($options['googleMarkerColor'])) $options['googleMarkerColor'] = 'blue';
					if(!isset($options['googleMarkerLabel'])) $options['googleMarkerLabel'] = 'H';
					if(!isset($options['googleApiKey'])) $options['googleApiKey'] = '';
							
					if($location != '0,0')
					{
						$url = 'http://maps.google.com/maps/api/staticmap?center='.$options['location'].'&zoom='.$options['googleZoom'].'&size='.$options['width'].'x'.$options['width'].'&maptype='.$options['googleMapType'].'&markers=color:'.$options['googleMarkerColor'].'|label:'.$options['googleMarkerLabel'].'|'.$options['location'].'&key='.$options['googleApiKey'].'&sensor=false';
						echo '<p><img src="'.$url.'" alt="SmartPhone Location Lookup Powered by Google Maps" title="SmartPhone Location Lookup Powered by Google Maps" /></p>';
					} else
					{
						echo '<p>unknown...</p>';
					}
					
					break;
				case 'bing':
					if(isset($options['bingApiKey']) AND $options['bingApiKey'] != '' AND $options['location'] != '0,0' AND $options['location'] != '')
					{
						if(!isset($options['bingZoom'])) $options['bingZoom'] = '15';
						if(!isset($options['bingMapType'])) $options['bingMapType'] = 'Road';
						if(!isset($options['bingPushpinLabel'])) $options['bingPushpinLabel'] = '';
						if(!isset($options['bingPushpinStyle'])) $options['bingPushpinStyle'] = '1';
						
						$url = 'http://dev.virtualearth.net/REST/v1/Imagery/Map/'.$options['bingMapType'].'/'.$options['location'].'/'.$options['bingZoom'].'?mapSize='.$options['width'].','.$options['width'];
						$url .= '&pp='.$options['location'].';'.$options['bingPushpinStyle'].';'.$options['bingPushpinLabel'];
						$url .= '&key='.$options['bingApiKey'];
						
						echo '<p><img src="'.$url.'" alt="SmartPhone Location Lookup Powered by Bing Maps" title="SmartPhone Location Lookup Powered by Bing Maps" /></p>';
					} else
					{
						echo '<p>unknown...</p>';
					}
					
					break;
			}
			
			echo $after_widget;
		}
		
		function smartphoneLocationLookupControl() 
		{
			$options = get_option('widget_smartphone_location_lookup');
			
			if(!is_array($options))
			{
				$options = array(
					'title'=>'Smartphone Location Lookup',
					'user' => '', 
					'location'=>'0,0', 
					'width' => '150',
					'provider' => 'google',
					'googleApiKey' => '',
					'googleZoom' => '14', 
					'googleMapType' => 'roadmap', 
					'googleMarkerColor' => 'blue', 
					'bingApiKey' => '',
					'bingZoom' => '15',
					'bingMapType' => 'Road',
					'bingPushpinLabel' => '',
					'bingPushpinStyle' => '1'
				);
			}
			
			if(!isset($options['title'])) $options['title'] = 'Smartphone Location Lookup';
			if(!isset($options['user'])) $options['user'] = '';
			if(!isset($options['location'])) $options['location'] = '0,0';
			if(!isset($options['width'])) $options['width'] = '150';
			if(!isset($options['provider'])) $options['provider'] = 'google';
			if(!isset($options['googleApiKey'])) $options['googleApiKey'] = '';
			if(!isset($options['googleZoom'])) $options['googleZoom'] = '14';
			if(!isset($options['googleMapType'])) $options['googleMapType'] = 'roadmap';
			if(!isset($options['googleMarkerColor'])) $options['googleMarkerColor'] = 'blue';
			if(!isset($options['googleMarkerLabel'])) $options['googleMarkerLabel'] = 'H';
			if(!isset($options['bingApiKey'])) $options['bingApiKey'] = '';
			if(!isset($options['bingZoom'])) $options['bingZoom'] = '15';
			if(!isset($options['bingMapType'])) $options['bingMapType'] = 'Road';
			if(!isset($options['bingPushpinLabel'])) $options['bingPushpinLabel'] = '';
			if(!isset($options['bingPushpinStyle'])) $options['bingPushpinStyle'] = '1';
			
			if($_POST['smartphone-location-lookup-submit']) 
			{
				$options['title'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['title']));
				$options['location'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['location']));
				$options['width'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['width']));
				$options['provider'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['provider']));
				$options['user'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['user']));
				$options['googleApiKey'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['googleApiKey']));
				$options['googleZoom'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['googleZoom']));
				$options['googleMapType'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['googleMapType']));
				$options['googleMarkerColor'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['googleMarkerColor']));
				$options['googleMarkerLabel'] = strtoupper(strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['googleMarkerLabel'])));
				$options['bingApiKey'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['bingApiKey']));
				$options['bingZoom'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['bingZoom']));
				if($options['bingZoom'] == '') $options['bingZoom'] = '15';
				$options['bingMapType'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['bingMapType']));
				$options['bingPushpinLabel'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['bingPushpinLabel']));
				$options['bingPushpinStyle'] = strip_tags(stripslashes($_POST['widget_smartphone_location_lookup']['bingPushpinStyle']));
				
				update_option('widget_smartphone_location_lookup', $options);
			}
			
			$title = htmlspecialchars($options['title'], ENT_QUOTES);
			$location = htmlspecialchars($options['location'], ENT_QUOTES);
			$width = htmlspecialchars($options['width'], ENT_QUOTES);
			$provider = htmlspecialchars($options['provider'], ENT_QUOTES);
			$user = htmlspecialchars($options['user'], ENT_QUOTES);
			
			// Google Map Settings
			$googleApiKey = htmlspecialchars($options['googleApiKey'], ENT_QUOTES);
			$googleZoom = htmlspecialchars($options['googleZoom'], ENT_QUOTES);
			$googleMapType = htmlspecialchars($options['googleMapType'], ENT_QUOTES);
			$googleMarkerColor = htmlspecialchars($options['googleMarkerColor'], ENT_QUOTES);
			$googleMarkerLabel = htmlspecialchars($options['googleMarkerLabel'], ENT_QUOTES);
					
			// Bing Map Settings
			$bingApiKey = htmlspecialchars($options['bingApiKey'], ENT_QUOTES);
			$bingZoom = htmlspecialchars($options['bingZoom'], ENT_QUOTES);
			$bingMapType = htmlspecialchars($options['bingMapType'], ENT_QUOTES);
			$bingPushpinLabel = htmlspecialchars($options['bingPushpinLabel'], ENT_QUOTES);
			$bingPushpinStyle = htmlspecialchars($options['bingPushpinStyle'], ENT_QUOTES);
					
			// Widget Title
			echo '<p><label><strong>Title:</strong></label><br /><input style="width:100%;" name="widget_smartphone_location_lookup[title]" type="text" value="'.$title.'" /></p>';
			
			// Which user are we stalking... following...?
			echo '<p><label><strong>User to track:</strong></label><br /><select style="width:100%;" name="widget_smartphone_location_lookup[user]">';
			$wp_user_search = new WP_User_Search('', '', '');
			cache_users($wp_user_search->get_results());
			foreach($wp_user_search->get_results() as $userid)
			{
				$user_object = new WP_User($userid);
				echo '<option value="'.$user_object->data->ID.'" '.selected($user, $userid).'>'.$user_object->data->user_login.'</option>';
			}
			echo '</select></p>';
			
			// Users current location
			echo '<p><label><strong>Current Location:</strong></label><br /><input style="width:100%;" name="widget_smartphone_location_lookup[location]" type="text" value="'.$location.'" /></p>';
			
			// Map width
			echo '<p><label><strong>Image Width (in px):</strong></label><br /><input name="widget_smartphone_location_lookup[width]" type="text" value="'.$width.'" /></p>';
			
			// Which map provider are we using?
			echo '<p><label><strong>Map Provider:</strong></label><br /><select style="width:100%;" name="widget_smartphone_location_lookup[provider]">';
			foreach(array('google' => 'Google Maps', 'bing' => 'Bing Maps') as $key => $val)
			{
				echo '<option value="'.$key.'" '.selected($provider, $key).'>'.$val.'</option>';
			}
			echo '</select></p>';
			
			switch($provider)
			{
				case 'google':
					echo '<h4>Google Map Settings</h4>';

					// API Key
					echo '<p><label><strong>API Key:</strong></label><br /><input style="width:100%;" name="widget_smartphone_location_lookup[googleApiKey]" type="text" value="'.$googleApiKey.'" /></p>';
					echo '<p><span class="small">Get one from here:<a href="http://code.google.com/apis/maps/signup.html" target="_new">http://code.google.com/apis/maps/signup.html</a></span></p>';
					
					// Zoom level
					echo '<p><label><strong>Zoom Level:</strong></label><br /><input name="widget_smartphone_location_lookup[googleZoom]" type="text" value="'.$googleZoom.'" /></p>';
					
					// Map type
					echo '<p><label><strong>Map Type:</strong></label><br /><select style="width:100%;" name="widget_smartphone_location_lookup[googleMapType]">';
					foreach(array('roadmap' => 'Roadmap', 'satellite' => 'Satellite', 'terrain' => 'Terrain', 'hybrid' => 'Hybrid') as $key => $val)
					{
						echo '<option value="'.$key.'" '.selected($googleMapType, $key).'>'.$val.'</option>';
					}
					echo '</select></p>';
					
					// Marker color
					echo '<p><label><strong>Marker Color:</strong></label><br /><select style="width:100%;" name="widget_smartphone_location_lookup[googleMarkerColor]">';
					foreach(array('black', 'brown', 'green', 'purple', 'yellow', 'blue', 'gray', 'orange', 'red', 'white') as $val)
					{
						echo '<option value="'.$val.'" '.selected($googleMarkerColor,$val).'>'.ucwords($val).'</option>';
					}
					echo '</select></p>';
					
					// Marker label
					echo '<p><label><strong>Marker Label (one uppercase digit):</strong></label><br /><input name=widget_smartphone_location_lookup[googleMarkerLabel]" type="text" value="'.$googleMarkerLabel.'" /></p>';
					
					// Show any hidden bing map variables
					echo '<input type="hidden" name="widget_smartphone_location_lookup[bingApiKey]" value="'.$bingApiKey.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[bingZoom]" value="'.$bingZoom.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[bingMapType]" value="'.$bingMapType.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[bingPushpinLabel]" value="'.$bingPushpinLabel.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[bingPushpinStyle]" value="'.$bingPushpinStyle.'" />';
					
					break;
					
				case 'bing':
					echo '<h4>Bing Map Settings</h4>';
					
					// API Key
					echo '<p><label><strong>API Key:</strong></label><br /><input style="width:100%;" name="widget_smartphone_location_lookup[bingApiKey]" type="text" value="'.$bingApiKey.'" /></p>';
					echo '<p><span class="small">Get one from here:<a href="http://msdn.microsoft.com/en-us/library/ff428642.aspx" target="_new">http://msdn.microsoft.com/en-us/library/ff428642.aspx</a></span></p>';
					
					// Zoom level
					echo '<p><label><strong>Zoom Level:</strong></label><br /><input name="widget_smartphone_location_lookup[bingZoom]" type="text" value="'.$bingZoom.'" /></p>';
					
					// Map type
					echo '<p><label><strong>Map Type:</strong></label><br /><select style="width:100%;" name="widget_smartphone_location_lookup[bingMapType]">';
					foreach(array('Aerial' => 'Aerial', 'AerialWithLabels' => 'Aerial With Road Labels', 'Road' => 'Road') as $key => $val)
					{
						echo '<option value="'.$key.'" '.selected($bingMapType, $key).'>'.$val.'</option>';
					}
					echo '</select></p>';
					
					// Pushpin Style
					echo '<p><label><strong>Pushpin Style:</strong></label><br /><select name="widget_smartphone_location_lookup[bingPushpinStyle]">';
					for($i = 0; $i <= 36;$i++)
					{
						echo '<option value="'.$i.'" '.selected($bingPushpinStyle, $i).'>'.$i.'</option>';
					}
					echo '</select></p>';
					
					
					// Pushpin label
					echo '<p><label><strong>Pushpin Label (two digits):</strong></label><br /><input name=widget_smartphone_location_lookup[bingPushpinLabel]" type="text" value="'.$bingPushpinLabel.'" /></p>';
					
					// Show any hidden google map variables
					echo '<input type="hidden" name="widget_smartphone_location_lookup[googleApiKey]" value="'.$googleApiKey.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[googleZoom]" value="'.$googleZoom.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[googleMapType]" value="'.$googleMapType.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[googleMarkerColor]" value="'.$googleMarkerColor.'" />';
					echo '<input type="hidden" name="widget_smartphone_location_lookup[googleMarkerLabel]" value="'.$googleMarkerLabel.'" />';
					break;
			}
			
			echo '<input type="hidden" id="smartphone-location-lookup-submit" name="smartphone-location-lookup-submit" value="1" />';
		}
		
		wp_register_sidebar_widget('smartphone-location-lookup', 'Smartphone Location Lookup', 'smartphoneLocationLookup');
		wp_register_widget_control('smartphone-location-lookup', 'Smartphone Location Lookup', 'smartphoneLocationLookupControl', array('width' => 100, 'height' =>  100));
		
		// Only run if we're not in the admin panel
		if(!is_admin())
		{
			// Only run if the iPhone Google Maps is in the sidebar
			$sidebars = wp_get_sidebars_widgets();
			$sidebar = array_flip($sidebars['sidebar-1']);
	
			if(isset($sidebar['smartphone-location-lookup']))
			{
				// iPhone Google Map Options
				$options = get_option('widget_smartphone_location_lookup');
				
				// Get logged in user
				global $current_user;
				$current_user = wp_get_current_user();
				
				if($current_user->data->ID == $options['user'])
				{
					add_action('wp_footer', 'smartPhoneLocationLookupJS');
					add_action('wp_head', 'smartPhoneLocationLookupHead');
				}
			}
		}
	}
}

if(!function_exists('smartPhoneLocationLookupJS'))
{
	function smartPhoneLocationLookupJS($returnCode = false)
	{
		$code = '<script type="text/javascript">smartphone_location_lookup_url = "'.WP_PLUGIN_URL.'/'.basename(dirname(__FILE__)).'/ajaxupdater.php";smartPhoneLocationLookupJS.run();</script>';
		
		if($returnCode) return $code;
		echo $code;
	}
}

if(!function_exists('smartPhoneLocationLookupHead'))
{
	function smartPhoneLocationLookupHead($returnFile = false)
	{
		$file = WP_PLUGIN_URL.'/'.basename(dirname(__FILE__)).'/smartphone_location_lookup.js';
		
		if($returnFile) return $file;
		
		echo '<script src="'.$file.'" text="text/javascript"></script>';
	}
}