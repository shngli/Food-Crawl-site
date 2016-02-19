function init_map(){
	var styles = [{

	}]

	var var_location = new google.maps.LatLng(37.7879938, -122.4096315);

	var var_mapoptions = {
		center:var_location,
		zoom: 14,
		disableDefaultUI: true,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		}
	};

	// Create a new StyledMapType object, passing it the array of styles,
 	// as well as the name to be displayed on the map type control.
 	var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});

	var var_marker = new google.maps.Marker({
		position:var_location,
		map:var_map,
		title:"Restaurant Crawl",
		stylers:[
		    { "saturation": -100 },
		    { "lightness": -7 },
		    { "gamma": 0.8 }
		],
		url:"https://www.google.com/maps/place/Union+Square/@37.7879938,-122.4096315,17z/data=!3m1!4b1!4m2!3m1!1s0x8085808ed6bba927:0xbc80f78c80624c89"
	});

	var var_map = new google.maps.Map(document.getElementById("map-container"), var_mapoptions);

	var_map.mapTypes.set('map_style', styledMap);
	var_map.setMapTypeId('map_style');
	var_marker.setMap(var_map);

	google.maps.event.addListener(var_marker, 'click', function(){
		window.open(this.url,"_blank");
	});
}

google.maps.event.addDomListener(window, 'load', init_map);