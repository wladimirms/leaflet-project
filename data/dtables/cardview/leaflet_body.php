<!DOCTYPE html>
<script type="text/javascript">
    console.log(<?php echo ($mainFeatCol); ?>);
    console.log(<?php echo ($linqFeatCol); ?>);
    //let myGeoJSONsource = JSON.parse(<?php echo ($mainFeatCol); ?>);
    var myGeoJSONsource = (<?php echo ($mainFeatCol); ?>);
    var linqGeoJSONsource = (<?php echo ($linqFeatCol); ?>);
    console.log(myGeoJSONsource);
    console.log(linqGeoJSONsource);

    var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
    });

    var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
    });

    var PKK5_Basemap = L.tileLayer('https://pkk5.rosreestr.ru/arcgis/rest/services/BaseMaps/BaseMap/MapServer/tile/{z}/{y}/{x}', {
        minZoom: 1,
        maxZoom: 20,
        attribution: 'Данные: &copy; <a href="https://rosreestr.ru/site">Росреестр</a> 2010, ЕЭКО',
        className: 'Базовая карта Росреестра'
    });

    var Stamen_Toner = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 0,
        maxZoom: 20,
        ext: 'png'
    });

    var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    });

    var prov_OSM = L.tileLayer.provider('OpenStreetMap');

    var PKK5_Anno = L.tileLayer('https://pkk5.rosreestr.ru/arcgis/rest/services/BaseMaps/Anno/MapServer/tile/{z}/{y}/{x}', {
        minZoom: 1,
        maxZoom: 20,
        attribution: 'Данные: &copy; <a href="https://rosreestr.ru/site">Росреестр</a> 2010, ЕЭКО',
        className: 'Аннотации к Базовой карте Росреестра'
    });


    var Ya_map = L.yandex();
    var Ya_sat = L.yandex({ type: 'satellite' });
    var Ya_hybrid = L.yandex('hybrid');
    var Ya_skeleton = L.yandex('skeleton');
    var Ya_vector = L.yandex('map~vector');



    var detailmap = L.map('cardmap', {
        fullscreenControl: true,
        zoominfoControl: false,
        zoomControl: true,
        fullscreenControlOptions: {
        position: 'topleft'
        }
    }).setView([60, 100], 5);


    var ZoomViewer = L.Control.extend({
        onAdd: function(){
            var gauge = L.DomUtil.create('div');
            gauge.style.width = '100px';
            gauge.style.background = 'rgba(255,255,255,0.5)';
            gauge.style.textAlign = 'center';
            gauge.style.color = 'black';
            gauge.style.fontSize = '16px';
            detailmap.on('zoomstart zoom zoomend', function(ev){
                gauge.innerHTML = 'Зум: ' + detailmap.getZoom();
            });
            return gauge;
        }
    });

    new ZoomViewer({position: 'bottomright'}).addTo(detailmap);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(detailmap);

    var baseMaps = {
        "ЕЭКО Росреестра": PKK5_Basemap,
        "OpenStreetMap": prov_OSM,
        "OpenTopoMap": OpenTopoMap,
        "Esri World Imagery": Esri_WorldImagery,
        "Яндекс.Vector": Ya_vector,
        //"Яндекс.Карты": Ya_map,
        "Яндекс.Гибрид": Ya_hybrid,
        "Яндекс.Спутник": Ya_sat
        //"Stamen": Stamen_Toner,
        //"DarkMatter": CartoDB_DarkMatter
    };


//OpenTopoMap.addTo(detailmap);
//Esri_WorldImagery.addTo(detailmap);
    //PKK5_Basemap.addTo(detailmap);
    //PKK5_Anno.addTo(detailmap);
    OpenTopoMap.addTo(detailmap);

    var MiniMapSource = L.tileLayer.provider('OpenStreetMap');
    //var MiniMapSource = { ...prov_OSM };
    var CardMiniMap = new L.Control.MiniMap(MiniMapSource, { toggleDisplay: true, position: "bottomleft" }).addTo(detailmap);

    var mainPolyStyle = {
        "color": "#bddfff",
        "fill": true,
        "fillColor": "#5800ff",
        "fillOpacity": 0.8,
        "weight": 2,
        "opacity": 0.99
    };

    var mainLinqStyle = {
        "color": "#bddfff",
        "fill": true,
        "fillColor": "#0f4c81",
        "fillOpacity": 0.8,
        "weight": 1,
        "opacity": 0.99
    };


    var mainMarkerOptions = {
        radius: 10,
        fillColor: "#5800ff",
        color: "#b2cbdf",
        weight: 2,
        opacity: 1,
        fillOpacity: 0.8
    };

    var mainMarkerOptions1 = {
        fillColor: "#5800ff",
        color: "#b2cbdf",
        weight: 2,
        opacity: 1,
        fillOpacity: 0.8
    };

    var linqMarkerOptions = {
        radius: 8,
        fillColor: "#0f4c81",
        color: "#bddfff",
        weight: 1,
        opacity: 1,
        fillOpacity: 0.8
    };

    var mainFaIcon = L.icon.fontAwesome({
            //iconClasses: 'fa fa-info-circle fa-spin',
            iconClasses: 'fas fa-jedi fa-spin',
            markerColor: 'red',
            iconColor: '#FFF',
            iconXOffset: -1.6,
            iconYOffset: -9,
        });

    var linqFaIcon = L.icon.fontAwesome({
        //iconClasses: 'fas fa-spinner fa-spin',
        iconClasses: 'fab fa-old-republic fa-spin',
        markerColor: 'black',
        iconColor: '#FFF',
        iconXOffset: -1.6,
        iconYOffset: -9,
    });



    function pointToLayerMain (feature, latlng) {
        return L.circleMarker(latlng, mainMarkerOptions);
    };

/*    function pointToLayerMain1 (feature, latlng) {
        return L.marker(latlng, mainMarkerOptions1);
    };*/

    function pointToLayerLinq (feature, latlng) {
        return L.circleMarker(latlng, linqMarkerOptions);
    };

    function buildPopup(feat) {
      var popupHTML = '';
      popupHTML +='<table class="table-striped table-bordered compact table-dark table-popup-custom">' +
          '<thead>' +
          '<tr class="table-light">' +
          '<th align="center" colspan="2"><h6 align="center" class="text-info">Информация</h6></th>' +
          '</tr>' +
          '</thead>';
        popupHTML +='<tr><td align="center">OID</td><td align="center">';
        popupHTML += feat.properties.oid;
        popupHTML +='</td></tr>';
        popupHTML +='<tr><td align="center">Авторы</td><td align="center">';
        popupHTML += feat.properties.obj_authors;
        popupHTML +='</td></tr>';
        popupHTML +='<tr><td align="center">Название</td><td align="center">';
        popupHTML += feat.properties.obj_name;
        popupHTML +='</td></tr>';
        popupHTML +='<tr><td align="center">Год</td><td align="center">';
        popupHTML += feat.properties.obj_year;
        popupHTML +='</td></tr>';
        popupHTML +='<tr><td align="center">Путь</td><td align="center">';
        popupHTML += '<a href="' + feat.properties.path_cloud + '" target="_blank">' + '<div style="color: cornflowerblue;">'+ feat.properties.path_cloud + '</div>' + '</a>';
        popupHTML +='</td></tr>';
        popupHTML += '</table>';
    return popupHTML;
    };

    var customPopupOptions =
        {
            'maxWidth': '440',
            'width': '200',
            'className' : 'leaflet-popup-customized'
        }


    let centroidsLayer = L.layerGroup();

    function onEachFeaturePopupMain(feature, layer) {
        // Создаем попап
        if (feature.properties) {
            //layer.bindPopup('<h6 align="center">'+feature.properties.obj_name+'</h6>');
            var marker = L.marker(layer.getBounds().getCenter(), {icon: mainFaIcon, zIndexOffset: 0});
            marker.bindPopup(buildPopup(feature), customPopupOptions);
            centroidsLayer.addLayer(marker);
            layer.bindPopup(buildPopup(feature), customPopupOptions);
        }
    };

    function onEachFeaturePopupLinq(feature, layer) {
        // Создаем попап
        if (feature.properties) {
            //layer.bindPopup('<h6 align="center">'+feature.properties.obj_name+'</h6>');
            var marker = L.marker(layer.getBounds().getCenter(), {icon: linqFaIcon, zIndexOffset : 0});
            marker.bindPopup(buildPopup(feature), customPopupOptions);
            centroidsLayer.addLayer(marker);
            layer.bindPopup(buildPopup(feature), customPopupOptions);
        }
    };

    var overlayMaps = {};
    var pair = {};
    var currMainBounds = null;
    var currLinqBounds = null;

    //var gjsn = L.geoJSON(myGeoJSONsource).addTo(detailmap);
    if (myGeoJSONsource.features !== null) {
        var gjsn = L.geoJSON(myGeoJSONsource, {style: mainPolyStyle, pointToLayer: pointToLayerMain, onEachFeature: onEachFeaturePopupMain}).addTo(detailmap);
        pair = {"Объекты основные": gjsn};
        currMainBounds = gjsn.getBounds();
        overlayMaps = {...overlayMaps, ...pair};
    };

    if (linqGeoJSONsource.features !== null) {
        var linqgjsn = L.geoJSON(linqGeoJSONsource, {style: mainLinqStyle, pointToLayer: pointToLayerLinq, onEachFeature: onEachFeaturePopupLinq}).addTo(detailmap);
        pair = {"Связанные объекты": linqgjsn};
        currLinqBounds = linqgjsn.getBounds();
        overlayMaps = {...overlayMaps, ...pair};
    };

    if (centroidsLayer.getLayers().length > 0) {
        pair = {"Маркеры": centroidsLayer};
        overlayMaps = {...overlayMaps, ...pair};
    };

    pair = {"ЕЭКО Росреестра (подписи)": PKK5_Anno};
    overlayMaps = {...overlayMaps, ...pair};
    pair = {"Яндекс.метки": Ya_skeleton};
    overlayMaps = {...overlayMaps, ...pair};



    if (currMainBounds !== null) {
        detailmap.fitBounds(currMainBounds);
        detailmap.setZoom(10);
    }
    else if (currLinqBounds !== null) {
        detailmap.fitBounds(currLinqBounds);
        detailmap.setZoom(10);
    }
    else {
        detailmap.setZoom(3);
    };
    //detailmap.fitBounds(gjsn.getBounds());
    //detailmap.setZoom(10);
    //detailmap.fitBounds(gjsn.getBounds().extend(linqgjsn.getBounds()));

/*    var overlayMaps = {
        "Объекты": gjsn,
        "Связанные": linqgjsn,
        "Росреестр (подписи)": PKK5_Anno
    };*/



    //L.control.layers(baseMaps, overlayMaps).addTo(detailmap);
    let lcnt = L.control;
    lcnt.layers(baseMaps, overlayMaps,{ collapsed: false }).addTo(detailmap);
    L.control.scale({maxWidth: 200, imperial: false, position: 'bottomright'}).addTo(detailmap);
    centroidsLayer.addTo(detailmap);

//L.marker([60, 100]).addTo(detailmap)
//.bindPopup('Гипотетический объект.<br><div class="nodata text-center">Пояснение к объекту.</div>')
//.openPopup();

/*    $('#cardmap').css({
        'height': '600px'
         //... and so on
    });*/

</script>