
var geojson, grrtest = L.layerGroup(),
    geojson = L.geoJson(grr, {
    style: style,
    onEachFeature: onEachFeature
    }).addTo(grrtest),
    geojsonsecond;

var grrsecondtest = L.layerGroup(),
    geojsonsecond = L.geoJson(grreighten, {
        style: style,
        onEachFeature: onEachFeature
        }).addTo(grrsecondtest);

var mbAttr = 'Developed by TsNIGRI Department of GIS - ' + 'Map data',
    mbAttr2 = '&copy; <a href=" https://rosreestr.ru/site/">Росреестр</a> 2010, ЕЭКО',
    ESRIAttr = '',
    OSMAttr = '&copy; <a href=" https://www.openstreetmap.org/"> OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
    YaAttr = ' Нельзя использовать',
    GoAttr = ' Нельзя использовать',
    OTMAttr = ' © OpenStreetMap contributors, SRTM | map style: © OpenTopoMap (CC-BY-SA)',
    DarkAttr = ' © OpenStreetMap contributors © CARTO, © CARTO';

    mbUrlOSM = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    mbUrlESRI = 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}';
    mbUrlYa = 'http://sat04.maps.yandex.net/tiles?l=sat&x={x}&y={y}&z={z}';
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
    Sattelite = L.tileLayer(mbUrlYa, {attribution: YaAttr}),
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
    layers: [RosreestrBase, wmsBaseLayer, RosreestrAnno, grrsecondtest]
});

L.control.attribution({position: 'bottomleft'}).addTo(map);

var options = {
    geojsonServiceAddress: "data/grrdata.json"
    };
    $("#searchContainer").GeoJsonAutocomplete(options);

var osmGeocoder = new L.Control.OSMGeocoder({
    placeholder: 'Перейти к объекту',
    position: 'topright',
    collapsed: false});

    map.addControl(osmGeocoder);

var scale = L.control.scale({
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
    "OpenStreetMap": OpenStreetMap,
    "OpenTopoMap": OpenTopoMap,
    "CartoDB Dark Matter": CartoDBDark,
    "ESRI Imagery": ESRISat,
    //Yandex sattelite": Sattelite,
    "Google Hybrid": GoogleHybrid,
    "Публичная кадастровая карта": RosreestrCadastre,
    "Объекты ГРР за 2018 год": grrsecondtest,
    "Объекты ГРР за 2017 год": grrtest,

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
    },
});
    (new ZoomViewer).addTo(map);

//  $.jax({url:'parser.php',
//      success: function (response) {
//          grrFeatures.log(JSON.parse(response));
//          lyrGrrStyles = L.geoJSON(grrFeatures,
//              {
//                  pointToLayer: returnGrrMarker,
//                  filter: filterGrr
//              }).addTo(map);
//          arGrrIDs.sort(function (a,b){
//              return a-b
//          });
//          $("#txtFindGrr").autocomplete({
//              source:arGrrIDs
//          });
//      },
//      error: function (xhr, status, error){
//          alert("ERROR: "+error);
//      }
//  });

    


