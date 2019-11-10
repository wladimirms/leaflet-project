var federalsubjects = L.tileLayer.wms("http://192.168.1.70:8080/geoserver/TOP/wms", {
        layers: 'TOP:federalsubjects, TOP:rfborders',
        format: 'image/png',
        transparent: true,
        version: "1.1.0",
        attribution: ""
        });