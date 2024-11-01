var smartphone_location_lookup_url = '';

function smartPhoneLocationLookupJSObj()
{
	this.handler = function(location, url)
	{
		var xmlhttp =  new XMLHttpRequest();
		xmlhttp.open('POST', smartphone_location_lookup_url, true);
		xmlhttp.onreadystatechange = function() 
		{
		    if (xmlhttp.readyState == 4) 
		    {
		    	if(xmlhttp.status == 200){}
		    }
		};
		xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		var content = 'location='+location.coords.latitude.toFixed(5)+','+location.coords.longitude.toFixed(5);
		xmlhttp.send(content);
	};
	
	this.run = function()
	{
		navigator.geolocation.getCurrentPosition(this.handler);
	};
}
smartPhoneLocationLookupJS = new smartPhoneLocationLookupJSObj;