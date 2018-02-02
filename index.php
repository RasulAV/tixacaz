<?php 
	/*
// Include the main class file
require_once('wl/TeraWurfl.php');
  
// instantiate a new TeraWurfl object
$wurflObj = new TeraWurfl();
  
// Get the capabilities of the current client.
$wurflObj->getDeviceCapabilitiesFromRequest();
 
$is_wireless = $wurflObj->getDeviceCapability('is_wireless_device');
$is_smarttv = $wurflObj->getDeviceCapability('is_smarttv');
$is_tablet = $wurflObj->getDeviceCapability('is_tablet');
$is_phone = $wurflObj->getDeviceCapability('can_assign_phone_number');
$is_mobile_device = ($is_wireless || $is_tablet);
 
if ($is_tablet) {
         header('Location: http://m.tixac.az');
    } else if ($is_phone) {
        header('Location: http://m.tixac.az');
    }


*/
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Tixac Az</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        
        <!-- CSS'es -->
        <link rel="stylesheet" href="lib/lf/leaflet.css" />
        <link rel="stylesheet" href="lib/lsearch/leaflet-search.src.css" />
        <link rel="stylesheet" href="lib/minimap/Control.MiniMap.css" />
        <link type="text/css" rel="stylesheet" href="MyStyle.css" />
        <link rel="stylesheet" href="lib/label/leaflet.label.css" />
        <link rel="stylesheet" href="lib/conMenu/leaflet.contextmenu.css"/>
        <link rel="stylesheet" href="lib/magnify/leaflet.magnifyingglass.css" />

        <!-- Dynamic Info -->
        
        <script src="http://geo.caspiannavtel.com/tixac.js" type="text/javascript"></script>
        <script src="http://tile.caspiannavtel.com/scripts/DPOI.js" type="text/javascript"></script>
        
         <!-- Static info -->
        <script src="http://tile.caspiannavtel.com/scripts/radar.js" type="text/javascript"></script>
        <script src="http://tile.caspiannavtel.com/scripts/TS.js" type="text/javascript"></script>
        
        <!-- Leaflet  -->
        <script src="lib/lf/leaflet.js"></script>
        
        <!-- Leaflet Plugins -->
        <script src="lib/cluster/leaflet.markercluster-src.js"></script>
        <script src="lib/minimap/Control.MiniMap.js"></script>
        <script src="lib/lcontrol/leaflet.groupedlayercontrol.js"></script>
        <script src="lib/lsearch/leaflet-search.src.js"></script>
        <script src="lib/label/leaflet.label-src.js"></script>
        <script src="lib/conMenu/leaflet.contextmenu-src.js"></script>
        <script src="lib/hash/leaflet-hash.js"></script>
        <script src="lib/magnify/leaflet.magnifyingglass.js"></script>
        
        <!-- POI -->		
	    <script src="lib/POI/12/poi.js" ></script>
        
        
         <!-- JQuery -->	
        <script type='text/javascript' src="http://code.jquery.com/jquery-git2.js"></script>
        <script src="lib/jquery.transit.js"></script>
        
        
        <script>
            var vis = 0;

            function change(SceneName) {
                if (vis === 0) {
                
                   /* $("#Window").animate({ opacity: 'toggle' });*/
                   $("#Window").css({
                   "display":"block"
                   });
                   $("#Window").transition({ 
                   opacity: 1 
                   });     
                        
                    HYPE.documents['botMenu'].showSceneNamed(SceneName, HYPE.documents['botMenu'].kSceneTransitionInstant);
                    vis = 1;
                } else {
                    HYPE.documents['botMenu'].showSceneNamed(SceneName, HYPE.documents['botMenu'].kSceneTransitionInstant);
                }
            };

            function hide() {
                if (vis === 1) {
                   /* $("#Window").fadeOut();*/
                    $("#Window").transition({ opacity: 0 });
                    vis = 0;
                };
                 $("#Window").css({
                   "display":"none"
                   });  
            };
        </script>
    </head>
    
    <body>
        <div id="map" onclick="hide()">
            <div id="topPanel">
                <img src='pics/tixac_logo.png' id="tixLogo">
                <a href="http://www.fireoff.az/" target=_blank><img src='pics/fireoff.png' id="fireoff"> </a>
                <a href="http://www.investaz.az/" target=_blank><img src='pics/investaz.png' id="investaz"> </a>
                <a href="http://www.caspiannavtel.com/?/az/menu/tracking/" target=_blank><img src='pics/izleme.png' id="izleme"> </a>
                <!--Yollara nəzərət sistemi-->
            </div>
            <div id="lpanel"></div>
            <div id='Window'>
                <div id="botmenu_hype_container" style="position:relative;overflow:hidden;width:690px;height:649px;">
                    <script type="text/javascript" charset="utf-8" src="source/botMenu.hyperesources/botmenu_hype_generated_script.js?10501"></script>
                </div>
            </div>
        </div>
        <div id="botPanel">
         
			            <div id="botWrapLeft">
                <div id='Oyrenin'>Servisimizin təkmilləşdirilməsində iştirak edin -
                    <button id="butOyren" onclick="change('Komek')">Öyrənin necə</button>
                </div>
                <p id='botMenu'> <a onclick="change('Reklam')">Reklam</a> | <a onclick="change('Alaga')">Əlaqə</a> | <a onclick="change('Sarh')">Şərh yaz</a> | <a onclick="change('Layiha')">Layihə haqqında</a> | <a onclick="change('Sahvdan')">Xəbər et</a>

                </p>
            </div>
		           
			            <div id="botWrapRight">
                
                <p id='botNumber'><strong>Qaynar xətt :</strong>
                    <br> <b>(+99412) 408-21-70</b> 
                    <br>Azercell nömrə: <b>6986</b>

                </p>
                <p id='botStrt'><strong>Ünvan:</strong>
                    <br>Azadlıq pr. 228 E, Bakı, Azərbaycan
                    <br>Tel: <b> (+99412) 408-24-70</b>

                </p>
                <div class="mline"></div> <a href="http://www.caspiannavtel.com" target=_blank><img src='pics/logo.png' id="logo"></a>

            </div>
		         
        </div>
        
   
        
        
        <a href="https://itunes.apple.com/us/app/tixac-az/id984370466?l=ru&ls=1&mt=8" target="_blank"><img style="position:absolute; float:right; bottom:0; right:0" src="pics/appstore_download_icon.svg" width="120" height="60" alt="Download from AppStore" border="0" /></a>
        
        <script>
          /*  //Popup on objects	
            function PopUp(feature, layer) {
                if (feature.properties && feature.properties.popupContent) {
                    layer.bindPopup(feature.properties.popupContent);
                }
            }*/
            
             //Label on objects
             function onEachFeature(feature, layer) {
                 if (feature.properties && feature.properties.popupContent) {
                 layer.bindLabel(feature.properties.popupContent);
                   } }

            //Icons for DPOI start	
            var iPisYol = L.icon({
                iconUrl: "pics/badRoads.png",
                iconSize: [26, 24],
                iconAnchor: [15, 25],
            });
            
            var iQaza = L.icon({
                iconUrl: "pics/accident.png",
                iconSize: [30, 26],
                iconAnchor: [15, 25],
            });
            
            var iDang = L.icon({
                iconUrl: "pics/danger.png",
                iconSize: [26, 30],
                iconAnchor: [15, 25],
            });
            
            
            
            
            var iEvak = L.icon({
                iconUrl: "pics/evacuator.png",
                iconSize: [33, 29],
                iconAnchor: [15, 25],
            });
            
            var iYPX = L.icon({
                iconUrl: "pics/roadPolice.png",
                iconSize: [33, 29],
                iconAnchor: [15, 25],
            });
            


            var iRadar = L.icon({
                iconUrl: "pics/radar.png",
                iconSize: [24, 24],
                iconAnchor: [15, 25],
            });

            var iTS = L.icon({
                iconUrl: "pics/TS.png",
                iconSize: [24, 24],
                iconAnchor: [15, 25],
            });

            //Icons for DPOI stop

            var wei = 2.3,
                opa = 0.7;

            //Traffic Jam lines	
            // RED
            var redStyle = {
                "color": "#ff0200",
                    "weight": wei,
                    "opacity": opa
            };

            // GREEN    
            var grStyle = {
                "color": "#05a294",
                    "weight": wei,
                    "opacity": opa
            };

            // ORANGE     
            var orStyle = {
                "color": "#ffb921",
                    "weight": wei,
                    "opacity": opa
            };
            //for closed roads category       
            var ClosedSt = {
                "color": "#4c4c4c",
                    "weight": 4,
                    "opacity": 0.7
            };


            //CNT map layer setup
            
            var cntURL = 'http://tile.caspiannavtel.com/osm/{z}/{x}/{y}.png';
	    var cnt  = L.tileLayer(cntURL);

            //Traffic layer              
            var jam = new L.LayerGroup();

            L.geoJson(redLines, {
                onEachFeature: onEachFeature,
                style: redStyle
            }).addTo(jam),

            L.geoJson(orLines, {
                onEachFeature: onEachFeature,
                style: orStyle
            }).addTo(jam),

            L.geoJson(grLines, {
                onEachFeature: onEachFeature,
                style: grStyle
            }).addTo(jam);


            var clrd = L.geoJson(cRoads, {
                onEachFeature: onEachFeature,
                style: ClosedSt
            });




            //DPOI layers settings Start
            var mPisYol = L.geoJson(badRoads, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iPisYol
                    });
                },
                onEachFeature: onEachFeature
            });

            var mQaza = L.geoJson(accident, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iQaza
                    });
                },
                onEachFeature: onEachFeature
            });
            var mDang = L.geoJson(danger, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iDang
                    });
                },
                onEachFeature: onEachFeature
            });

            //DPOI layers settings Stop			       



            //DPOI Clusters Start

            //Evacuator Cluster	

            var EvacMark = new L.MarkerClusterGroup({

                iconCreateFunction: function(cluster) {
                    return L.divIcon({
                        html: '<b class=bCLuster>' + cluster.getChildCount() + '</b>',
                        className: 'evac',
                        iconSize: L.point(34, 26)
                    });
                },
                //spiderfyOnMaxZoom: false,
                showCoverageOnHover: false
            });


            EvacMark.addLayer(L.geoJson(evacuator, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iEvak
                    });
                },
                onEachFeature: onEachFeature
            }));

            //YPX Cluster	

            var YPXMark = new L.MarkerClusterGroup({

                iconCreateFunction: function(cluster) {
                    return L.divIcon({
                        html: '<b class=bCLuster>' + cluster.getChildCount() + '</b>',
                        className: 'YPX',
                        iconSize: L.point(30, 26)
                    });
                },

                showCoverageOnHover: false
            });


            YPXMark.addLayer(L.geoJson(road_police, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iYPX
                    });
                },
                onEachFeature: onEachFeature
            }));


            //Radar Cluster	       
            var mRadar = new L.MarkerClusterGroup({

                iconCreateFunction: function(cluster) {
                    return L.divIcon({
                        html: '<b class=bRadar>' + cluster.getChildCount() + '</b>',
                        className: 'Radar',
                        iconSize: L.point(22, 22)
                    });
                },

                showCoverageOnHover: false
            });


            mRadar.addLayer(L.geoJson(radar, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iRadar
                    });
                }
            }));
            //TS Cluster	

            var mTS = new L.MarkerClusterGroup({

                iconCreateFunction: function(cluster) {
                    return L.divIcon({
                        html: '<b class=bTS>' + cluster.getChildCount() + '</b>',
                        className: 'TS',
                        iconSize: L.point(22, 22)
                    });
                },

                showCoverageOnHover: false
            });


            mTS.addLayer(L.geoJson(TS, {
                pointToLayer: function(feature, latlng) {
                    return L.marker(latlng, {
                        icon: iTS
                    });
                },
                onEachFeature: onEachFeature
            }));
            //DPOI Clusters Stop		


      

            //Main map settings			       
            var map = L.map('map', {
				                center: [40.385, 49.860],
				                zoom: 13,
				                layers: [
					                cnt,
					                jam,
					                clrd,
					                mPisYol,
					                mQaza,
								    mDang,
								    YPXMark,
								    EvacMark
				                ],
				                maxBounds: new L.LatLngBounds([42.31792, 44.1431], [38.1086, 50.92166]),
				                minZoom: 9,
				         //Contex Menu       
				                contextmenu: true,
				                contextmenuWidth: 150,
				                contextmenuItems: [{
								        text: 'Yerləşdiyin Məkan',
								        icon: 'lib/conMenu/images/locate.png',
								        callback: Location
								    }, '-', {
								        text: 'Yaxınlaşdırmaq',
								        icon: 'lib/conMenu/images/zoom-in.png',
								        callback: zoomIn
								    }, {
								        text: 'Uzaqlaşdırmaq',
								        icon: 'lib/conMenu/images/zoom-out.png',
								        callback: zoomOut
								    }/*, '-', {
								        text: 'Böyüdücü',
								        icon: 'lib/conMenu/images/magnifying-glass-icon.png',
								        callback: Magnify
								    }*/
								]
                       });

            //Add to layer control settings
            var overlays = {
			                "<b>Yol Vəziyət</b>": { 
						    "<img id=Tixac src='pics/tixac.png' /> Hərəkət sürəti": jam,
						    "<img id=ClRd src='pics/closeRoad.png' /> Yol boyu bağlıdır": clrd	
						},
						"<b>Dinamik Maraq Nöqtələri</b>":  {
							"<img id=Ypis src='pics/SBbadRoads.png' /> Yol təmiri": mPisYol,
							"<img id=Dang src='pics/SBdanger.png' /> Təhlükə": mDang,
							"<img id=Qaza src='pics/SBaccident.png' /> Qəza": mQaza,
							"<img id=YPX src='pics/SBroadPolice.png' /> YPX": YPXMark,
							"<img id=Evac src='pics/SBevacuator.png' /> Evakuator": EvacMark
						},
						"<b>Qovluq</b>": {
						    "<img id=Radar src='pics/SBradar.png' /> Radarlar": mRadar,
						    "<img id=TS src='pics/SBTS.png' /> Təhlükəsiz Şəhər": mTS
						}
            };

         
            
            L.control.groupedLayers(null, overlays, {
                position: "topleft"
            }).addTo(map);
            
            //Address Search in OSM 	
		map.addControl( new L.Control.Search({
                 url: 'http://nominatim.openstreetmap.org/search?format=json&countrycodes=az&q={s}',
                 jsonpParam: 'json_callback',
                 propertyName: 'display_name',
                 propertyLoc: ['lat','lon'],
                 zoom:25
                 }));
        //Mini Map

        var cnt2 = new L.TileLayer(cntURL, {minZoom: 6, maxZoom: 13});
        var miniMap = new L.Control.MiniMap(cnt2,{position:'topright',width: 100,
		height: 100}).addTo(map);   
		
	
	//POI Appear at certain zoom lvl
        map.on('zoomend', 
          function(){ 
	           zoomLvl = map.getZoom();
	           if (zoomLvl > 13){
		            if(map.hasLayer(POI12))
		               {
	                   return;
	                    };
	                map.addLayer(POI12);    
	                             };
	           if (zoomLvl <= 13) {
		            map.removeLayer(POI12);
	                             };                
          }
      );
    
    

		    
    //Hash
        var hash = new L.Hash(map);
    //Contex Menu
    
    
    
    function onLocationFound(e) {
			var radius = e.accuracy / 2;
			L.marker(e.latlng).addTo(map)
				.bindPopup("Siz qeyd edilən nöqtədən " + radius + " metr məsafədəsiniz");
			L.circle(e.latlng, radius).addTo(map);
		}

   function onLocationError(e) {
			alert(e.message);
		}

   map.on('locationfound', onLocationFound);
   map.on('locationerror', onLocationError);


      function zoomIn (e) {
	      map.zoomIn();
      };

      function zoomOut (e) {
	      map.zoomOut();
      };
      
      
      function Location (e) {
          map.locate({setView: true, maxZoom: 18});
      };

     
    function Magnify(e) {
            if(map.hasLayer(magnifyingGlass)) {
			      return;
			    }
			 map.addLayer(magnifyingGlass);
			 magnifyingGlass.setLatLng(e.latlng);
			 
    
        };
    
        </script>
        
        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
		  ga('create', 'UA-44295829-1', 'tixac.az');
		  ga('send', 'pageview');

      </script>

        
    </body>

</html>