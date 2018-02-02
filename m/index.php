<?php 
// Include the main class file
require_once('../wl/TeraWurfl.php');
  
// instantiate a new TeraWurfl object
$wurflObj = new TeraWurfl();
  
// Get the capabilities of the current client.
$wurflObj->getDeviceCapabilitiesFromRequest();
 
$is_wireless = $wurflObj->getDeviceCapability('is_wireless_device');
$is_tablet = $wurflObj->getDeviceCapability('is_tablet');
$is_mobile_device = ($is_wireless || $is_tablet);
 
if (!$is_mobile_device) {
    header('Location: http://tixac.az');
    exit;
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Tixac.Az Mobile</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" href="/lf/leaflet.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="/lf/leaflet.ie.css" /><![endif]-->
	
	<link rel="stylesheet" href="/lf/locate/L.Control.Locate.css" />
	<link type="text/css" rel="stylesheet" href="MyStyle.css" />

    <script src="http://geo.caspiannavtel.com/tixac.js" type="text/javascript"></script>
    <script src="http://tile.caspiannavtel.com/scripts/DPOI.js" type="text/javascript"></script>
    

	<script src="/lf/leaflet.js"></script>
	<script src="/lf/cluster/leaflet.markercluster-src.js"></script>
	<script src="/lf/locate/L.Control.Locate.js" ></script>
	<script src="/lf/hash/leaflet-hash.js"></script>


	
</head>
<body>
	<div id="map"></div>

	<script>
//Popup on objects	
	function onEachFeature(feature, layer) {
    if (feature.properties && feature.properties.popupContent) {
        layer.bindPopup(feature.properties.popupContent);
        }
      }
	
//DPOI icons setup	
	 var iYPX =  L.icon({
                     iconUrl: "pics/road_police.png",
                     iconSize: [30, 26],
                     iconAnchor: [15, 25],
                     }); 
                     
     var iEvak = L.icon({
                     iconUrl: "pics/evacuator.png",
                     iconSize: [34, 26],
                     iconAnchor: [15, 25],
                     }); 

		var wei = 7,
	        opa = 0.4;
	        
//Traffic Jam lines	
    // RED
    var redStyle = {
       "color": "#ff2600",
       "weight": wei,
       "opacity": opa
        };
        
  
	//for closed roads category       
        var ClosedSt = {
            "color": "#4c4c4c",
            "weight": wei,
            "opacity": 0.7
            }; 
	
	
//CNT map layer setup
		var cnt = L.tileLayer('http://tile.caspiannavtel.com/osm/{z}/{x}/{y}.png');
		
//Traffic layer              
        var jam = new L.LayerGroup();
             
            L.geoJson(redLines,{ 
		              onEachFeature: onEachFeature ,
                      style: redStyle
                      }).addTo(jam);
         
          
           var clrd  =L.geoJson(cRoads, {
                      onEachFeature: onEachFeature ,
                      style: ClosedSt
                      });
    
    
//YPX Cluster	
		       
		var mYPX= new L.MarkerClusterGroup({
                  
                 iconCreateFunction: function (cluster) {
				 return L.divIcon({ html:'<b id=cluster>' + cluster.getChildCount() + '</b>', className: 'YPX', iconSize: L.point(30, 26)});
			},
                
                 showCoverageOnHover: false});

	
	        mYPX.addLayer(L.geoJson(road_police, {
			       pointToLayer: function (feature, latlng) {
				   return L.marker(latlng, {icon: iYPX});
			       },
			       onEachFeature: onEachFeature
			       })); 	
   
   	 
//Evacuator Cluster DPOI	
   var mEvac = new L.MarkerClusterGroup({
                  
                 iconCreateFunction: function (cluster) {
				return L.divIcon({ html:'<b id=cluster>' + cluster.getChildCount() + '</b>', className: 'evac', iconSize: L.point(34, 26)});
			},
                 spiderfyOnMaxZoom: false,
                 showCoverageOnHover: false});

	
	mEvac.addLayer(L.geoJson(evacuator, {
			       pointToLayer: function (feature, latlng) {
				   return L.marker(latlng, {icon: iEvak});
			       },
			       onEachFeature: onEachFeature
			       })); 
			       
//Main map settings			       
	var map = L.map('map', {
			center: [40.385, 49.860],
			zoom: 12,
			layers:[
			cnt,
			jam,
			clrd,
			mYPX,
			mEvac
			],
			maxBounds: new L.LatLngBounds([42.31792, 44.1431], [38.1086, 50.92166]),
			minZoom:10	
		});	
			       
//Add to layer control settings
		var overlays = {
			"<img id=Tixac src='pics/jam.png' /><b>Tixac (1-19 km/h)</b>": jam,
			"<img id=ClRd src='pics/cl_rd.png' /><b>Yol boyu baglidir</b>": clrd,
			"<img id=YPX src='pics/road_police.png' /><b>YPX<b/>":mYPX,
			"<img id=Evac src='pics/evacuator.png' /><b>Evakuator</b>": mEvac
			};

		L.control.layers(null, overlays,{position:"topright"}).addTo(map);
	
//Location finder		                      
        L.control.locate().addTo(map);  


//hold finger -zoom out
map.on('contextmenu',function(){map.zoomOut(1)});


//Hash
        var hash = new L.Hash(map);

	</script>
	
	
<script>
	
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44295829-2', 'tixac.az');
  ga('send', 'pageview');

</script>

</body>
</html>

