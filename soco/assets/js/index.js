if($('#map_canvas').length != 0){
var Maps 		= null;
var Paps 		= null;
var pot 		= null;
var gmarkers 	= [];
var smarkers 	= [];
var infowindow = new google.maps.InfoWindow();
var poi_cats = [
            {"id":"restaurant","label":"Restaurant"},
            {"id":"supermarket","label":"Supermarket"},
            {"id":"airport","label":"Airport"},
            {"id":"bus_station","label":"Bus Station"},
            {"id":"train_station","label":"Train Station"},
            {"id":"gym","label":"Gym"},
            {"id":"hospital","label":"Hospital"},
        ];
var bounds 		= new google.maps.LatLngBounds();
var mcluster 	= null;
var drawingManager 	= null;
var nkf_circle  = null;
var circle_point  = true;
var panoramaOptions = {
    addressControlOptions : { position : google.maps.ControlPosition.TOP_LEFT},
    zoomControlOptions : { position : google.maps.ControlPosition.RIGHT_TOP},
    panControlOptions: {position: google.maps.ControlPosition.RIGHT_BOTTOM},
    enableCloseButton : true,
    visible: false //set to false so streetview is not triggered on the initial map load
};
//var panorama = new google.maps.StreetViewPanorama(document.getElementById("propertymap"), panoramaOptions);
var propertymap = {
	setup   : function(config) {
		pot = config.pot;
		this.init();
		this.getNearbyPlaces(pot);
		this.mapBound();
		var pot_z  = new google.maps.LatLng(pot.lat,pot.lng);
		var ss = {
				'position'	: pot_z,
				'title'		: pot.title,
				'content'	: pot.title,
				'icon'		: home_url+'/wp-content/themes/soco/assets/img/dots/marker_location (2).png',
		}
		smarkers.push(ss);
		//this.setMapTypeId(config.marker);
	},

	init : function() {
		
		var mapOptions = {
	        zoom: parseInt(15),
	        streetViewControl:false,
	        center: new google.maps.LatLng(33.698450,-117.918860),
	        mapTypeControl: !1,
            scrollwheel: !1,
            scaleControl: !1,
            streetViewControl: !1,
            zoomControl: !1,
            panControl: !1,
            fullscreenControl: !1,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                featureType: "water",
                elementType: "geometry",
                stylers: [{
                    color: "#c1d9e2"
                }, {
                    lightness: 17
                }]
            }, {
                featureType: "landscape",
                elementType: "geometry",
                stylers: [{
                    color: "#f2f2f2"
                }]
            }, {
                featureType: "road.highway",
                elementType: "geometry.fill",
                stylers: [{
                    color: "#f6cf65"
                }, {
                    lightness: 17
                }]
            }, {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#ffffff"
                }, {
                    lightness: 29
                }, {
                    weight: .2
                }, {
                    visibility: "simplified"
                }]
            }, {
                featureType: "road.arterial",
                elementType: "geometry",
                stylers: [{
                    color: "#ffffff"
                }, {
                    lightness: 18
                }]
            }, {
                featureType: "road.local",
                elementType: "geometry",
                stylers: [{
                    color: "#ffffff"
                }, {
                    lightness: 16
                }]
            }, {
                featureType: "poi",
                elementType: "geometry",
                stylers: [{
                    color: "#f5f5f5"
                }, {
                    lightness: 21
                }]
            }, {
                featureType: "poi.park",
                elementType: "geometry",
                stylers: [{
                    color: "#dedede"
                }, {
                    lightness: 21
                }]
            }, {
                elementType: "labels.text.stroke",
                stylers: [{
                    visibility: "on"
                }, {
                    color: "#ffffff"
                }, {
                    lightness: 16
                }]
            }, {
                elementType: "labels.text.fill",
                stylers: [{
                    saturation: 36
                }, {
                    color: "#333333"
                }, {
                    lightness: 40
                }]
            }, {
                elementType: "labels.icon",
                stylers: [{
                    visibility: "off"
                }]
            }, {
                featureType: "transit",
                elementType: "geometry",
                stylers: [{
                    color: "#f2f2f2"
                }, {
                    lightness: 19
                }]
            }, {
                featureType: "administrative",
                elementType: "geometry.fill",
                stylers: [{
                    color: "#fefefe"
                }, {
                    lightness: 20
                }]
            }, {
                featureType: "administrative",
                elementType: "geometry.stroke",
                stylers: [{
                    color: "#fefefe"
                }, {
                    lightness: 17
                }, {
                    weight: 1.2
                }]
            }, {
                featureType: "administrative",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#444444"
                }]
            }],
	    }
		Maps = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
		

		/*drawingManager = new google.maps.drawing.DrawingManager({
		    drawingMode: null,
		    drawingControl: false,
		    drawingControlOptions: {
		      	position: google.maps.ControlPosition.TOP_CENTER,
		      	 drawingModes : [ google.maps.drawing.OverlayType.CIRCLE ]
		    },
	    	circleOptions: {
	      		fillColor: '#000F9F',
		      	strokeWeight: 1,
		      	clickable: false,
		      	editable: false,
	    	}
	  	});
	  	drawingManager.setMap(Maps);*/
		
	},
	getNearbyPlaces : function(position){
		//$(poi_cats).each(function(index,element ){
		   let request = {
		        location: position,
		        rankBy: google.maps.places.RankBy.DISTANCE,
		        //keyword: '(shopping) OR (restaurant) OR (coffee)'
		        type: 'restaurant'
		      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request, this.setMarkers);

	      let request1 = {
	        location: position,
	        rankBy: google.maps.places.RankBy.DISTANCE,
	        //keyword: '(shopping) OR (restaurant) OR (coffee)'
	        type: 'supermarket'
	      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request1, this.setMarkers);

	      let request2 = {
	        location: position,
	        rankBy: google.maps.places.RankBy.DISTANCE,
	        //keyword: '(shopping) OR (restaurant) OR (coffee)'
	        type: 'airport'
	      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request2, this.setMarkers);

	      let request3 = {
	        location: position,
	        rankBy: google.maps.places.RankBy.DISTANCE,
	        //keyword: '(shopping) OR (restaurant) OR (coffee)'
	        type: 'bus_station'
	      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request3, this.setMarkers);


	      let request5 = {
	        location: position,
	        rankBy: google.maps.places.RankBy.DISTANCE,
	        //keyword: '(shopping) OR (restaurant) OR (coffee)'
	        type: 'train_station'
	      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request5, this.setMarkers);

	      let request6 = {
	        location: position,
	        rankBy: google.maps.places.RankBy.DISTANCE,
	        //keyword: '(shopping) OR (restaurant) OR (coffee)'
	        type: 'gym'
	      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request6, this.setMarkers);

	      let request7 = {
	        location: position,
	        rankBy: google.maps.places.RankBy.DISTANCE,
	        //keyword: '(shopping) OR (restaurant) OR (coffee)'
	        type: 'hospital'
	      };
	      service = new google.maps.places.PlacesService(Maps);
	      service.nearbySearch(request7, this.setMarkers);
	      
	      this.setMarkersData();

	},
	nearbyCallback : function(results, status){
		this.setMarkers(results);
	},

	setMarkersData : function() {
		var infowindow = new google.maps.InfoWindow();
		setTimeout(function(){ 

			for(var i =0; i < smarkers.length; i++){
				//console.log(smarkers[i].icon);
				var marker = new google.maps.Marker({  
			    	id 		: i,
	               	map 	: Maps,
	               	icon 	: smarkers[i].icon,
		        	title 	: smarkers[i].title, 
		        	name 	: smarkers[i].name, 
	                position: smarkers[i].position,
	                content : smarkers[i].title ,
	            });

				gmarkers.push(marker);
			    bounds.extend(marker.getPosition());
				
				google.maps.event.addListener(marker,'click', (function(_marker){ 
					return function() {
		               	infowindow.setContent(_marker.content);
		               	infowindow.open(Map, this);
		               	Maps.setCenter(this.position);
		            };
		        })(marker));
			}
	        //Maps.fitBounds(bounds);
	        Maps.setZoom(15);
		}, 4000);

		
	},
	setMarkers : function(places,reset = '') {
		if(reset){
			//this.resetMarkers();
		}
		
		
		places.forEach(place => {
			//console.log(place);

			var ss = {
				'position'	: place.geometry.location,
				'title'		: place.name,
				'name'		: place.types[0],
				'content'	: place.name,
				'icon'		: home_url+'/wp-content/themes/soco/assets/img/dots/'+place.types[0]+'.png'
			}
			smarkers.push(ss);

	       /* gmarkers.push(marker);
	        bounds.extend(place.geometry.location);*/
	   	});
	    
	},


	setMapTypeId : function(markers){
		var ss = jQuery.parseJSON(markers);
		//console.log(ss);
		var myLatLng  = new google.maps.LatLng(ss.latitude,ss.longitude);
		//var myLatLng  = new google.maps.LatLng(42.345573,-71.098326);
		var panorama = new google.maps.StreetViewPanorama(
		    document.getElementById('map_Stree_view'), {
		      	position: myLatLng,
		      	zoomControlOptions : { position : google.maps.ControlPosition.TOP_RIGHT},
		      	addressControlOptions : { position : google.maps.ControlPosition.TOP_LEFT},
		      	panControlOptions: {position: google.maps.ControlPosition.TOP_LEFT},
			}
		);
		Maps.setStreetView(panorama);
	},

	mapBound : function(){
		if(document.getElementById('map-categories')) {
			$("#map-categories li").click(function(){
				infowindow.close();
				if($(this).hasClass('active')){
					$(this).removeClass('active');
					var name = $(this).attr('data-id');
					for (var i = 0; i < gmarkers.length; i++) {
						if(gmarkers[i].name == name){
				          	gmarkers[i].setVisible(false);
						}
					}

				}else{
					$(this).addClass('active');
					var name = $(this).attr('data-id');
					for (var i = 0; i < gmarkers.length; i++) {
						if(gmarkers[i].name == name){
				          	gmarkers[i].setVisible(true);
						}
					}
				}
			});

			$(".map-type").click(function() {
				infowindow.close();
				if($(this).hasClass("open")){
					$(this).removeClass("open");
				}else{
					$(this).addClass("open");
				}
			});

			$(".map-type ul li").click(function(t) {
				t.preventDefault();
				infowindow.close();
	            var i = $(this).find("a").attr("map-type");
	            switch (i) {
	                case "terrain":
	                    i = google.maps.MapTypeId.TERRAIN;
	                    break;
	                case "default":
	                    i = google.maps.MapTypeId.ROADMAP;
	                    break;
	                case "satellite":
	                    i = google.maps.MapTypeId.SATELLITE;
	                    break
	            }
	            Maps.setMapTypeId(i);
			});
		}
		$("#zoom-slider").slider({
            min: 10,
            max: 20,
            step: 1,
            range: "min",
            value: $("#map_canvas").data("zoom"),
            slide: function(t, i) {
                Maps.setZoom(i.value)
           }
         });

	    $(".zoom-control .zoom-in").click(function() {
	    	var i = $("#zoom-slider").slider("value") + 1;
	    	
            $("#zoom-slider").slider("value", i)
            Maps.setZoom(i);
	    });

	    $(".zoom-control .zoom-out").click(function() {
	    	var i = $("#zoom-slider").slider("value") - 1;
            $("#zoom-slider").slider("value", i)
            Maps.setZoom(i);
	    });

	    $("#enter-full-screen").click(function(t) {
	    	t.preventDefault();
	    	if($("body").hasClass("map-full-screen")){
	    		$("body").removeClass("map-full-screen");
	    		$(".zoom-control .button").removeClass("active");
	    		$("#map_canvas").removeClass("fullscreen");
	    		$("#map-tooltip").css("position", "absolute");
	    	}else{
	    		$(".zoom-control #enter-full-screen").addClass("active");
	    		$("#map_canvas").addClass("fullscreen");
	    		$("body").addClass("map-full-screen");
	    		$("#map-tooltip").css("position", "fixed");
	    		setTimeout((function() {
		            google.maps.event.trigger(self.Maps, "resize")
		        }), 500);
	    	}
	    });
		
	},
	SatelliteMap : function(controlDiv,map){

		const controlUI = document.createElement("div");
		controlUI.style.cursor = "pointer";
		controlUI.title = "Draw Radius";
		controlUI.style.padding = "5px";
		controlUI.innerHTML = "<div class='oeplDrawCircle'><img src='"+plugins_url+"/img/draw.svg'/></div>";
		controlDiv.appendChild(controlUI);
		this.CenterControl(controlDiv, map, drawingManager);
		controlUI.addEventListener("click", () => {
			drawingManager.setDrawingMode(google.maps.drawing.OverlayType.CIRCLE);
			
			google.maps.event.addListener(drawingManager, 'circlecomplete', function (circle) {
				$(".oeplDrawCircle").hide();
				$("#CLEARCIRCLE").show();
				set_drw = '';
				circle_point = false;
			});
		});

	  // Setup the click event listeners: simply set the map to Chicago.
	  /*controlUI.addEventListener("click", () => {
	    map.setCenter(chicago);
	  });*/
	  	//Maps.constontrols[google.maps.ControlPosition.TOP_LEFT].push(controlDiv);
	},

	CenterControl: function(controlDiv, map, drawingManager){
		const controlUI = document.createElement("div");
		controlUI.style.cursor = "pointer";
	  	controlUI.title = "Remove Radius";
	  	controlUI.style.padding = "5px";
	  	controlUI.innerHTML = "<div id='CLEARCIRCLE' class='mapCancelButton' style='display: none;'><img src='"+plugins_url+"/img/quit.svg'/></div>";
	  	controlDiv.appendChild(controlUI);
	  	controlUI.addEventListener("click", () => {
	    	current_lat = '';
			current_long = '';
			newlat = 38.4773695;
			newlnt = -100.5639457;
			newzoom = 4;
			circle_point = true;
			$("#CLEARCIRCLE").hide();
			$(".oeplDrawCircle").show();
			nkf_circle.setMap(null);
			set_drw = 1;
			ajaxCall();
			//get_property_list(propertytype, propertystatus, propertysearch, oeplclear=true, current_lat, current_long);

	  	});
	},

	resetMarkers : function() {
		if(gmarkers) {
			for (var i = 0; i < gmarkers.length; i++) {
				gmarkers[i].setMap(null);
			}
		}

		gmarkers 		= [];
	},
}
;
}