
var LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'data/images/marker-shadow.png',
        iconSize:     [20, 33],
        shadowSize:   [30, 33],
        iconAnchor:   [10, 33],
        shadowAnchor: [10, 33],
        popupAnchor:  [-0, -0]
        }
    });

var orangeIcon = new LeafIcon({iconUrl: 'data/images/orangeicon.png'}),
    redIcon = new LeafIcon({iconUrl: 'data/images/redicon.png'}),
    greenIcon = new LeafIcon({iconUrl: 'data/images/greenicon.png'}),
    brownIcon = new LeafIcon({iconUrl: 'data/images/brownicon.png'}),
    blueIcon = new LeafIcon({iconUrl: 'data/images/blueicon.png'}),
    yellowIcon = new LeafIcon({iconUrl: 'data/images/yellowicon.png'}),
    greyIcon = new LeafIcon({iconUrl: 'data/images/greyicon.png'}),
    pinkIcon = new LeafIcon({iconUrl: 'data/images/pinkicon.png'}),
    lightorangeIcon = new LeafIcon({iconUrl: 'data/images/lightorangeicon.png'});

    L.icon = function (options) {return new L.Icon(options);};

var geojson2017, grr2017 = L.layerGroup(),
    geojson2017 = L.geoJson(grr, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(grr2017),

    geojson2018, grr2018 = L.layerGroup(),
    geojson2018 = L.geoJson(grrpolygon2018, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(grr2018),

    popup2017, popupJson2017 = L.layerGroup(),
    popupJson2017= L.geoJson(popupCentroids2017, {
        onEachFeature: onEachFeature
    }).addTo(grr2017),

    popup2018, popupJson2018 = L.layerGroup(),
    popupJson2018= L.geoJson(popupCentroids2018, {
        onEachFeature: onEachFeature
    }).addTo(grr2018);

var mbAttr = 'Developed by TsNIGRI Department of GIS - ' + 'Map data',
    mbAttr2 = '&copy; <a href=" https://rosreestr.ru/site/">Росреестр</a> 2010, ЕЭКО',
    ESRIAttr = '',
    OSMAttr = '&copy; <a href=" https://www.openstreetmap.org/"> OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
    BingAttr = '',
    GoAttr = '',
    OTMAttr = ' © OpenStreetMap contributors, SRTM | map style: © OpenTopoMap (CC-BY-SA)',
    DarkAttr = ' © OpenStreetMap contributors © CARTO, © CARTO';

    mbUrlOSM = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    mbUrlESRI = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
    mbUrlBing = 'http://ecn.t3.tiles.virtualearth.net/tiles/a{q}.jpeg?g=0&dir=dir_n\'';
    mbUrlGo = 'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}';
    mbUrlDark = 'http://a.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}@2x.png';
    mbUrlOTM = 'https://a.tile.opentopomap.org/{z}/{x}/{y}.png';
    mbUrlCadastre = 'https://pkk5.rosreestr.ru:443/arcgis/services/Cadastre/CadastreWMS/MapServer/WmsServer';
    mbUrlBase = 'https://pkk5.rosreestr.ru/arcgis/rest/services/BaseMaps/BaseMap/MapServer/tile/{z}/{y}/{x}';
    mbUrlAnno = 'https://pkk5.rosreestr.ru/arcgis/rest/services/BaseMaps/Anno/MapServer/tile/{z}/{y}/{x}';

var OpenStreetMap = L.tileLayer(mbUrlOSM, {attribution: OSMAttr}),
    RosreestrBase = L.tileLayer(mbUrlBase, {attribution: mbAttr}),
    RosreestrAnno = L.tileLayer(mbUrlAnno, {attribution: mbAttr2}),
    RosreestrCadastre = L.tileLayer(mbUrlCadastre, {attribution: mbAttr}),
    OpenTopoMap = L.tileLayer(mbUrlOTM, {attribution: OTMAttr}),
    CartoDBDark = L.tileLayer(mbUrlDark, {attribution: DarkAttr}),
    ESRISat = L.tileLayer(mbUrlESRI, {attribution: ESRIAttr}),
    Sattelite = L.tileLayer(mbUrlBing, {attribution: BingAttr}),
    GoogleHybrid = L.tileLayer(mbUrlGo, {attribution: GoAttr});

var wmsBaseLayer = L.tileLayer.wms("http://192.168.44.217:8080/geoserver/TOP/wms", {
    layers: 'TOP:adm_rfborders, TOP:adm_federalsubject',
    format: 'image/png',
    transparent: true,
    version: "1.1.0",
    attribution: ""
});

var map = L.map('map', {
    attributionControl: false,
    zoomControl: false,
    measureControl: false,
    center: [66.25, 94.15],
    zoom: 3,
    minZoom: 3,
    fullscreenControl: true,
    fullscreenControlOptions: {
        // optional
        title: "На весь экран",
        titleCancel: "Выйти из полноэкранного режима",
    },
    layers: [RosreestrBase, wmsBaseLayer, RosreestrAnno, grr2018]
});

L.control.attribution({position: 'bottomleft'}).addTo(map);

//mouse
L.control.mousePosition().addTo(map);

//geocoder
var osmGeocoder = new L.Control.OSMGeocoder({
    placeholder: 'Перейти к объекту',
    position: 'topright',
    collapsed: false});

    map.addControl(osmGeocoder);

//scale
var scale = L.control.scale({
    position: 'bottomright',
    imperial: false,
    }).addTo(map);

//zoom
var zoomControl = L.control.zoom({
    position: 'bottomright'
    });
    map.addControl(zoomControl);

//kmlgpx
var style = {
    color: 'red',
    opacity: 1.0,
    fillOpacity: 1.0,
    weight: 2,
    clickable: false
};

var baseLayers = {};

var overlays = {
    "OpenStreetMap": OpenStreetMap,
    "OpenTopoMap": OpenTopoMap,
    "CartoDB Dark Matter": CartoDBDark,
    "ESRI Imagery": ESRISat,
    "Bing Aerial": Sattelite,
    "Google Hybrid": GoogleHybrid,
    "Публичная кадастровая карта": RosreestrCadastre,
    "Объекты ГРР за 2018 год": grr2018,
    "Объекты ГРР за 2017 год": grr2017,

};

    L.control.layers(baseLayers, overlays, {
        position: 'topright',
        collapsed: true
    }).addTo(map);

//draw
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

//kmlgpx
var control; L = window.L;
    L.Control.FileLayerLoad.LABEL =
        '<img class="icon" src="data/images/folder.png" alt="file icon"/>';
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

    L.Control.measureControl().addTo(map);

//print
var printProvider = L.print.provider({
    method: 'GET',
    url: ' http://path/to/mapfish/print',
    autoLoad: true,
    dpi: 90
});

var printControl = L.control.print({
    provider: printProvider
});
    map.addControl(printControl);



    


