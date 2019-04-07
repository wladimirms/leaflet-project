var MAP_OBJ;
var MAP_RIGHTS_OBJ;
var INFO_BOX_OBJ;
var INFO_BOX_SCROLL_OBJ;
var INFO_BOX_HAS_DATA = false;

var DOWN_X = 0;
var DOWN_Y = 0;

var FUNC_INFO_BOX_INIT = function () { // задание перевенных и вызов первого вычисления
    MAP_OBJ = $('#map');
    MAP_RIGHTS_OBJ = MAP_OBJ.find('.leaflet-control-attribution.leaflet-control');
    INFO_BOX_OBJ = $('.info.leaflet-control:not(.legend)');
    INFO_BOX_SCROLL_OBJ = INFO_BOX_OBJ.find('.scroll-box-info');
    INFO_BOX_HAS_DATA = INFO_BOX_SCROLL_OBJ.length == 0 ? false : true;
    FUNC_INFO_BOX_RESIZE();
}

var FUNC_INFO_BOX_RESIZE = function () { // вычисление размера для блока и установка размеров
    if (!INFO_BOX_HAS_DATA) {
        INFO_BOX_OBJ.css({'height': 'auto'});
    } else {
        var INFO_BOX_TOP = INFO_BOX_SCROLL_OBJ.offset().top;
        var INFO_BOX_BOTTOM = MAP_RIGHTS_OBJ.offset().top - 10;
        var INFO_BOX_HEIGHT = INFO_BOX_BOTTOM - INFO_BOX_TOP;
        INFO_BOX_SCROLL_OBJ.css({'height': INFO_BOX_HEIGHT + 'px'});
    }
}

$(window)
    .resize(function () {  // триггер на изменение размеров браузера / экрана
        FUNC_INFO_BOX_RESIZE();
    })
;

$(document)
    .on('mousedown','#map',function (event) { // триггер на нажатие кнопки мыши
        if ( event.target == this ) {
            DOWN_X = event.pageX;
            DOWN_Y = event.pageY;
        }
    })
    .on('mouseup','#map',function (event) { // триггер на отжатие кнопки мыши
        if ( event.target == this ) {
            if (DOWN_X == event.pageX && DOWN_Y == event.pageY) {
                INFO_BOX_OBJ.text('').append(
                    '<h3>Объекты ГРР Роснедра по АБЦМ</h3><hr>Наведите курсор на площадной объект для развернутой информации'
                );
                FUNC_INFO_BOX_INIT();
            }
        }
    })
    .ready(function () { // триггер на финал загрузки страницы
        FUNC_INFO_BOX_INIT();
    })
;