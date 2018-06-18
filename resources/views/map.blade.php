@extends('layouts.app')

@section('content')

<div class="flex-center position-ref full-height">
           <div id='map' style='width: 900px; height: 600px;'></div>
           <div class='calculation-box'>
                <p>Draw a polygon using the draw tools.</p>
                <div id='calculated-area'></div>
                <input type="range" min="50" max="150" value="75" class="slider" id="myRange">
                <p>Distance between points: <div id='pointDistance'></div><div>Meters</div></p>
            </div>
            <script>
            mapboxgl.accessToken = 'pk.eyJ1Ijoic2Ftc29udmUiLCJhIjoiY2pmbWt4eTAyMHJrYzJ4bzBsNWRsZXRtaiJ9.KxoUAJa5druf8SCVQaxzBw';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v9',
                zoom: 14.5,
                center: [4.490335, 51.914845]
            });

            var draw = new MapboxDraw({
                displayControlsDefault: false,
                controls: {
                    polygon: true,
                    trash: true
                }
            });

            $('#pointDistance').text($('#myRange').val());
            $('#myRange').on('change', () => {
                $('#pointDistance').text($('#myRange').val());
            })
            map.addControl(draw);

            map.on('draw.create', updateArea);
            map.on('draw.delete', removeMarkers);
            map.on('draw.update', updateArea);

            function updateArea(e) {
                
                removeMarkers();
                // console.log(data.features[0].geometry);
                var answer = document.getElementById('calculated-area');
                if (getDrawControlData().features.length > 0) {
                    // var data = getDrawControlData();
                    // console.log(getPointGrid());
                    addMarkers();
                } else {
                    answer.innerHTML = '';
                    if (e.type !== 'draw.delete') alert("Use the draw tools to draw a polygon!");
                }
                $('#pointDistance').text($('#myRange').val());
            }

            function getDrawControlData(){
                var data = draw.getAll();
                if (data.features.length > 0) {
                return data;
                }
                else {
                // map.addControl(draw);
                removeMarkers();
                throw new Error('No data in drawControl');
                }
            }

            function getBoundingBox(){
                return turf.bbox(getDrawControlData().features[0].geometry);
            }

            function getPointGrid(){
                var cellSide = $('#myRange').val();
                var options = {units: 'meters', mask: getDrawControlData().features[0].geometry};

                console.log(turf.bbox(getDrawControlData()), cellSide, options);
                return turf.pointGrid(
                turf.bbox(getDrawControlData()),
                cellSide,
                options);
            }

            function addMarkers(){
                getPointGrid().features.forEach(function(marker) {
                // console.log(marker);
                // create a DOM element for the marker
                // create a HTML element for each feature
                var el = document.createElement('div');
                el.className = 'marker';

                console.log(marker.geometry.coordinates)

                $.ajaxSetup({
                    headers:{
                        'access_token': "Z6j-_YLQkwfMoSPsG_c4"
                    }
                });
                var mark = new mapboxgl.Marker(el)
                        .setLngLat(marker.geometry.coordinates)
                        .addTo(map);
                $.get("https://api.onwater.io/api/v1/results/"+marker.geometry.coordinates[1]+","+marker.geometry.coordinates[0], function( data ) {
                    console.log(data);
                    
                    if(data.water !== true){
                        // make a marker for each feature and add to the map
                        mark.remove();
                    }
                });

                
                });
            }
            function removeMarkers(){
                $('.marker').remove();
            }
            </script>
        </div>
@endsection