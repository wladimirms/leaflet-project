<?php

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>index_leaflet</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="data/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="data/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="data/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="data/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="data/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" href="data/leaflet.css"/>
    <link rel="stylesheet" href="data/OSMGeocoder.css"/>
    <link rel="stylesheet" href="data/style.css"/>
    <link rel="stylesheet" href="data/infolegend.css"/>
    <link rel="stylesheet" href="data/Control.FullScreen.css"/>
    <link rel="stylesheet" href="data/LeftBox.css"/>
    <link rel="stylesheet" href="data/leafletdraw/src/leaflet.draw.css"/>
    <link rel="stylesheet" href="data/leafletmeasure/leaflet.measurecontrol.css"/>
    <!--<link rel="stylesheet" href="data/measure/scss/leaflet-measure.scss"/>-->
    <script src="data/jquery.js"></script>
    <!--<script src="data/jquery-addon.js"></script>-->
    <script src="data/leaflet.js"></script>
    <script src="data/OSMGeocoder.js"></script>
    <script src="data/togeojson.js"></script>
    <script src="data/leaflet.filelayer.js"></script>
    <script src="data/grrdata.js"></script>
    <script src="data/grrseconddata.js"></script>
    <script src="data/Control.FullScreen.js"></script>
    <script src="data/leafletdraw/src/Leaflet.draw.js"></script>
    <script src="data/leafletdraw/src/Leaflet.Draw.Event.js"></script>
    <script src="data/leafletdraw/src/Toolbar.js"></script>
    <script src="data/leafletdraw/src/Tooltip.js"></script>
    <script src="data/leafletdraw/src/ext/GeometryUtil.js"></script>
    <script src="data/leafletdraw/src/ext/LatLngUtil.js"></script>
    <script src="data/leafletdraw/src/ext/LineUtil.Intersect.js"></script>
    <script src="data/leafletdraw/src/ext/Polygon.Intersect.js"></script>
    <script src="data/leafletdraw/src/ext/Polyline.Intersect.js"></script>
    <script src="data/leafletdraw/src/ext/TouchEvents.js"></script>
    <script src="data/leafletdraw/src/draw/DrawToolbar.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.Feature.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.SimpleShape.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.Polyline.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.Marker.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.Circle.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.CircleMarker.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.Polygon.js"></script>
    <script src="data/leafletdraw/src/draw/handler/Draw.Rectangle.js"></script>
    <script src="data/leafletdraw/src/edit/EditToolbar.js"></script>
    <script src="data/leafletdraw/src/edit/handler/EditToolbar.Edit.js"></script>
    <script src="data/leafletdraw/src/edit/handler/EditToolbar.Delete.js"></script>
    <script src="data/leafletdraw/src/Control.Draw.js"></script>
    <script src="data/leafletdraw/src/edit/handler/Edit.Poly.js"></script>
    <script src="data/leafletdraw/src/edit/handler/Edit.SimpleShape.js"></script>
    <script src="data/leafletdraw/src/edit/handler/Edit.Rectangle.js"></script>
    <script src="data/leafletdraw/src/edit/handler/Edit.Marker.js"></script>
    <script src="data/leafletdraw/src/edit/handler/Edit.CircleMarker.js"></script>
    <script src="data/leafletdraw/src/edit/handler/Edit.Circle.js"></script>
    <script src="data/leafletmeasure/leaflet.measurecontrol.js"></script>
    <script src="data/leafletprint/src/Control.Print.js"></script>
    <script src="data/leafletprint/src/copyright.js"></script>
    <script src="data/leafletprint/src/print.Provider.js"></script>
</head>
<body>
<div id='map'>
</div>
<!--<script src="data/geoserver.js"></script>-->
<script src="data/functions.js"></script>
<script src="data/map.js"></script>
<!--<script src="data/measure/src/leaflet-measure.js"></script>-->
<script src="data/control.js"></script>
<!--<script src="data/legend.js"></script>-->
<script src="data/info.js"></script>
<script src="data/bindpopup.js"></script>
<!--<script src="data/watermark.js"></script>-->
<script src="data/LeftBox.js"></script>
<!--<script src="data/left-menu.js"></script>-->
</body>
</html>
