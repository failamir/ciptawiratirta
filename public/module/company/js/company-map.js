var mapEngine = new BravoMapEngine('map',{
    fitBounds:true,
    center: bravo_map_data.center,
    zoom:9,
    disableScripts:true,
    gmapOptions:{
        scrollwheel: true,
        mapTypeId: typeof google !== 'undefined' ? google.maps.MapTypeId.ROADMAP : '',
        zoomControl: false,
        mapTypeControl: false,
        scaleControl: false,
        panControl: false,
        navigationControl: false,
        streetViewControl: false,
        gestureHandling:$('#map').data('gesturehandling') || 'cooperative'
    },
    ready: function (engineMap) {
        if(bravo_map_data.markers){
            engineMap.addMarkers3(bravo_map_data.markers);
        }
    }
});
$('#map').on('update-markers',function(e,markers){
    mapEngine.clearMarkers();
    mapEngine.addMarkers3(markers);
});
