
if($('#oepl_map').length != 0){
var Maps 		= null;
var Paps 		= null;
var gmarkers 	= [];
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
var propertymap 	= {
	setup   : function(config) {

		this.init();
		this.setMarkers(config.marker);
		//this.setMapTypeId(config.marker);
	},

	init : function() {
		var mapOptions = {
	        zoom: parseInt(5),
	         streetViewControl:false,
	        center: new google.maps.LatLng(34.0609763,-118.4170805),
	        /*mapTypeControl:true,
	        scrollwheel: false,
	        scaleControl:true,
	        streetViewControl:true,
	        zoomControlOptions: { position: google.maps.ControlPosition.RIGHT_TOP },
	       
	        mapTypeControlOptions: {
		      mapTypeIds: [
		        google.maps.MapTypeId.ROADMAP,
		        google.maps.MapTypeId.SATELLITE
		      ],
		      style: google.maps.MapTypeControlStyle.DEFAULT,
		    },
		    //streetViewControlOptions: { position: google.maps.ControlPosition.LEFT_TOP },
	        scrollwheel: true,
	        scaleControl:true,
		    
		    
		    overviewMapControl:true,
		    rotateControl:true,*/
	    }
		Maps = new google.maps.Map(document.getElementById('oepl_map'), mapOptions);
		

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
	setMarkers : function(markers,reset = '') {
		if(reset){
			this.resetMarkers();
		}
	  	var _this 	= this;
	  	bounds 		= new google.maps.LatLngBounds();
	    var ss = jQuery.parseJSON(markers);

	  	//console.log(markers.lat);
    	var myLatLng  = new google.maps.LatLng(ss.latitude,ss.longitude);
	    var marker = new google.maps.Marker({  
	    	id 		: 1,
           	map 	: Maps,
            title 	: ss.title, 
            position: myLatLng,
        });	   
        Maps.setCenter(new google.maps.LatLng(ss.latitude,ss.longitude));
        Maps.setZoom(10);
	},
	setMapTypeId : function(markers){
		var ss = jQuery.parseJSON(markers);
		
		var myLatLng  = new google.maps.LatLng(ss.latitude,ss.longitude);
		//var myLatLng  = new google.maps.LatLng(42.345573,-71.098326);
		var panorama = new google.maps.StreetViewPanorama(
		    document.getElementById('oepl_panorama'), {
		      	position: myLatLng,
		      	zoomControlOptions : { position : google.maps.ControlPosition.TOP_RIGHT},
		      	addressControlOptions : { position : google.maps.ControlPosition.TOP_LEFT},
		      	panControlOptions: {position: google.maps.ControlPosition.TOP_LEFT},
			}
		);
		///Maps.setStreetView(panorama);
	},

	mapBound : function(){
		
		
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