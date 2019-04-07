var federaldistricts = L.tileLayer.wms("http://localhost:8080/geoserver/TSNIGRI_map/wms", {
        layers: 'TSNIGRI_map:federaldistricts',
        format: 'image/png',
        transparent: true,
        version: "1.1.0",
        attribution: ""
        });