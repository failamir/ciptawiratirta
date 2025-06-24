@if($row->map_lat && $row->map_lng)
    <h4 class="widget-title mb-md-4 mb-2">{{ __("Job Location") }}</h4>
    <div class="widget-content">
        <!-- Map Widget -->
        <div class="map-outer">
            <div class="map-canvas" id="map-canvas"></div>
        </div>
    </div>
@endif
