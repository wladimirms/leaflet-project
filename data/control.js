    var control;
    
    var L = window.L;
        
        L.Control.FileLayerLoad.LABEL = '<img class="icon" src="data/images/folder.png" alt="file icon"/>';
        control = L.Control.fileLayerLoad({
            position: 'topright',
            fitBounds: true,
            layerOptions: {
                style: style,
                pointToLayer: function (data, latlng) {
                    return L.circleMarker(
                        latlng,
                        { style: style }
                    );
                }
            }
        });
        control.addTo(map);
        control.loader.on('data:loaded', function (e) {
            var layer = e.layer;
            console.log(layer);
        });