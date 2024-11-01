=== Smartphone Location Lookup ===
Contributors: rgubby
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=rgubby%40googlemail%2ecom&lc=GB&item_name=Richard%20Gubby%20%2d%20WordPress%20plugins&currency_code=GBP&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: smartphone, gps lookup, location lookup, mobile GPS capabilities, google maps, bing maps
Requires at least: 3.0
Tested up to: 3.0.3
Stable tag: 1.0.1

This plugins displays a location based map on your sidebar. It tells visitors to your blog exactly where YOU are!

== Description ==

This plugin takes advantage of new GPS capabilities inside of the browser on your mobile phone.

If you've added the Smartphone Location Lookup widget to your page and if you have an iPhone, or something new like an HTC Dream, every time you refresh your site on your phone, you'll update a map in the sidebar telling your stalkers/readers where you are.

You can choose from either Google Maps, or Bing Maps to display where you are and have all the choices that these two map providers offer (marker labels, etc).

You can update your location manually from the Widget too if your phone doesn't support GPS, just expand the widget and amend your latitude/longitude.

In addition, most web browsers now have the same GPS capabilities, so if you allow Firefox/Chrome/etc to record your current location, it'll update the map.

== Installation ==

1. To install through WordPress Control Panel:
	* Click "Plugins", then "Add New"
	* Enter "Smartphone Location Lookup" as search term and click "Search Plugins"
	* Click the "Install" link on the right hand side against "Smartphone Location Lookup"
	* Click the red "Install Now" button
	* Click the "Activate Plugin" link
1. To download and install manually:
	* Upload the entire `smartphone-location-lookup` folder to the `/wp-content/plugins/` directory.
	* Activate the plugin through the `Plugins` menu in WordPress.

== Frequently Asked Questions ==

= I don't seem to have any map displaying on my site =

Have you added in the widget to your sidebar? Add it from the Widgets page in your WordPress dashboard.

= I'm not prompted every time I view my blog on my mobile to allow my location to be used! =

This is what you want to happen. Click the allow button, and you'll start letting people know where you are.

= My Map doesn't work =

Have you signed up to either Bing maps or Google Maps to get an API key? If not, you can get an API key for your Google map [here](http://code.google.com/apis/maps/signup.html), and a Bing API key [here](http://msdn.microsoft.com/en-us/library/ff428642.aspx) 

= My phone doesn't update where I am =

Not many phone currently have the GPS capabilities in the browser that you need to update the location. If it doesn't update your latitude/longitude, you can update your location manually from the Widget, just expand the widget and amend your latitude/longitude. 

= The widget is tracking the wrong user! =

You can change which user on your blog to track - just open the widget options and change the user option - then the next time that user logs in from the mobile phone, it'll track where they are.

= What if I'm using a mobile plugin? =

This plugin is fully compatible with [Wapple Architect Mobile Plugin for WordPress] (http://wordpress.org/extend/plugins/wapple-architect/) - install that to have a full mobile experience!

= Which pushpins can I use for Bing Maps? =

Take a look at [Pushin Icon Styles] (http://msdn.microsoft.com/en-us/library/ff701719.aspx) - then select that from the dropdown option
== Changelog ==

= 1.0.1 =
* Added compatibility with WordPress 3.0.3

= 1.0 =
* Added first version
