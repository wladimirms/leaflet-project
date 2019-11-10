

var geojson;

var grrtest = L.layerGroup();

geojson = L.geoJson(grr, {style: style, onEachFeature: onEachFeature}).addTo(grrtest);

var geojsonsecond;

var grrsecondtest = L.layerGroup();

geojsonsecond = L.geoJson(grreighten, {style: style, onEachFeature: onEachFeature}).addTo(grrsecondtest);

var mbAttr = 'Developed by TsNIGRI Department of GIS - ' +
    'Map data &copy; <a href="https://rosreestr.ru/site/">Росреестр</a> 2010, ЕЭКО';
var secAttr = '&copy; <a href="https://www.openstreetmap.org/"> OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>';
var thrdAttr = ' Imagery &copy; <a href="https://www.esri.com/ru-ru/home">ESRI</a>, DigitalGlobe, GeoEye, i-cubed, USDA, USGS, AEX, Getmapping, Aerogrid, IGN, IGP, swisstopo, and the GIS User Community';

mbUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

mbUrlx = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png';

mbUrlr = 'https://pkk5.rosreestr.ru/arcgis/rest/services/BaseMaps/BaseMap/MapServer/tile/{z}/{y}/{x}';

mbUrla = 'https://pkk5.rosreestr.ru/arcgis/rest/services/BaseMaps/Anno/MapServer/tile/{z}/{y}/{x}';

var OpenStreetMap = L.tileLayer(mbUrl, {id: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', attribution: secAttr}),
    Sattelite = L.tileLayer(mbUrlx, {attribution: thrdAttr}),
    RosreestrBase = L.tileLayer(mbUrlr, {attribution: mbAttr}),
    RosreestrAnno = L.tileLayer(mbUrla, {attribution: mbAttr});

var map = L.map('map', {
    zoomControl: false,
    center: [66.25, 94.15],
    zoom: 3,
    minZoom: 3,
    fullscreenControl: true,
    fullscreenControlOptions: { // optional
        title: "На весь экран",
        titleCancel: "Выйти из полноэкранного режима",
    },
    layers: [RosreestrBase, RosreestrAnno, grrsecondtest]
});

var osmGeocoder = new L.Control.OSMGeocoder({
    placeholder: 'Перейти к объекту',
    position: 'topright',
    collapsed: false});

    map.addControl(osmGeocoder);

var scale = L.control.scale( {
    position: 'bottomright',
    imperial: false,
    }).addTo(map);


var zoomControl = L.control.zoom({
    position: 'bottomright'
    });
    map.addControl(zoomControl);

var style = {
    color: 'red',
    opacity: 1.0,
    fillOpacity: 1.0,
    weight: 2,
    clickable: false
};

var baseLayers = {};

var overlays = {
    "Карта OpenStreetMap": OpenStreetMap,
    "Космические снимки ESRI": Sattelite,
    "Объекты ГРР за 2018 год": grrsecondtest,
    "Объекты ГРР за 2017 год": grrtest,
    "Границы субъектов РФ": federalsubjects
};

    L.control.layers(baseLayers, overlays, {
        position: 'topright',
        collapsed: true
    }).addTo(map);

var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
var drawControl = new L.Control.Draw({
    draw: {
        polygon: false,
        marker: true,
        polyline: false,
        rectangle: true,
        circle: true,
        circlemarker: false
    },
    edit: {
        featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);

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

var ZoomViewer = L.Control.extend({
    onAdd: function(){
        var gauge = L.DomUtil.create('div');
        gauge.style.width = '55px';
        gauge.style.background = '#222222';
        gauge.style.textAlign = 'center';
        gauge.style.color = 'white';
        map.on('zoomstart zoom zoomend', function(ev){
            gauge.innerHTML = 'Zoom: ' + map.getZoom();
        })
        return gauge;
    }
});

    (new ZoomViewer).addTo(map);
    


