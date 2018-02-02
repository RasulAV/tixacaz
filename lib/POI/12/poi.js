function onPopUp(feature, layer) {
                  if (feature.properties && feature.properties.popupContent) {
                  layer.bindPopup(feature.properties.popupContent);
                  } };

   //-------------------------------------Companies-------------------------------------

// CaspianNavTel start

var icaspiannavtel = L.icon({
                     iconUrl: "/lib/POI/12/caspiannavtel/caspiannavtel.png",
                     iconSize: [26, 27],
                     iconAnchor: [11, 2],
                     });


var caspiannavtel = {
    "type": "Feature",
    "properties": {
        "popupContent": "<img src='/lib/POI/12/caspiannavtel/caspian_logo.jpg'/> <p><b>E-mail:</b> info@caspiannavtel.com<br><b>Ünvan:</b> Sabit Rəhman küç. 50, Bakı, Azərbaycan<br><b>Tel:</b> (+99412) 408 01 72/ 408 01 73<br><b>Qaynar xətt:</b> (+99412) 408-21-70<br><b>Azercell nömrə:</b> 6986</p>"
    },
    "geometry": {
        "type": "Point",
        "coordinates": [49.84405, 40.40219]
    }
};

var caspiannavteld = {
    "type": "Feature",
    "properties": {
        "popupContent": "<img src='/lib/POI/12/caspiannavtel/dukan.jpg' style='border-radius: 15px'/><p><b>CaspianNavTel Səlahiyyətli satış mərkəzi</b></p><p><b>Ünvan:</b> Azadlıq pr. 228 E, Bakı ş., Azərbaycan<br> <b>Tel:</b> (+99412) 408 24 70 </p> "
    },
    "geometry": {
        "type": "Point",
        "coordinates": [49.837117, 40.403826]
    }
};

// CaspianNavTel stop


var POI12 = new L.LayerGroup();
           
           L.geoJson(caspiannavtel, {
			       pointToLayer: function (feature, latlng) 
			       {
				   return L.marker(latlng, {icon: icaspiannavtel});
			       },
			       onEachFeature: onPopUp
			       }).addTo(POI12)
			       ,
			       
		  L.geoJson(caspiannavteld, {
			       pointToLayer: function (feature, latlng) 
			       {
				   return L.marker(latlng, {icon: icaspiannavtel});
			       },
			       onEachFeature: onPopUp
			       }).addTo(POI12)
			       ;