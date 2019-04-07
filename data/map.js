

var geojson;

var grrtest = L.layerGroup();

geojson = L.geoJson(grr, {style: style, onEachFeature: onEachFeature}).addTo(grrtest);

var geojsonsecond;

var grrsecondtest = L.layerGroup();

geojsonsecond = L.geoJson(grreighten, {style: style, onEachFeature: onEachFeature}).addTo(grrsecondtest);

var mbAttr = 'Developed by TSNIGRI - ' +
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

var zoomControl = L.control.zoom({
    position: 'topright'
});
map.addControl(zoomControl);

var style = {
    color: 'red',
    opacity: 1.0,
    fillOpacity: 1.0,
    weight: 2,
    clickable: false
};

var baseLayers = {

};

var overlays = {
    "Карта OpenStreetMap": OpenStreetMap,
    "Космические снимки ESRI": Sattelite,
    "Объекты ГРР за 2018 год": grrsecondtest,
    "Объекты ГРР за 2017 год": grrtest
    //"Границы ФО": federaldistricts
};

L.control.layers(baseLayers, overlays, {
    position: 'topright',
    collapsed:true
}).addTo(map);

    


