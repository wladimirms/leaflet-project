var LM_Data = { // данные, которыми мы будем оперировать
    controlContainer: null, // Общий контейнер
    legendContainer: null,// Контейнер с блоками легенды
    leftMenuContainer: null,// СОзданный скриптом контейнер левого меню
    minMarging: 0,// значение минимальной X при закрытом меню
    animationSpeed: 500,// Скорость анимации
    animationAction: false,// Скорость анимации
};

var funcLM_Init = function () {
    LM_Data.controlContainer = $('.leaflet-control-container');
    LM_Data.legendContainer = $('.leaflet-control-container > div').first();
    LM_Data.legendContainer.addClass('menu-legend-container');
    var SEARCH = LM_Data.legendContainer.find('.leaflet-control-geocoder.leaflet-control-geocoder-expanded.leaflet-control');
    SEARCH.wrap('<div></div>'); // оборачиваем объект в другой объект
    var SEARCH_WRAP = SEARCH.parent(); // получаем объект родитель
    var SEARCH_HTML = SEARCH_WRAP.html(); // получаем HTML (!!!)ВНУТРИ объекта
    //SEARCH_WRAP.remove(); // Удаляем объект
    //LM_Data.legendContainer.prepend(SEARCH_HTML); // добавляем HTML в начало объекта
    LM_Data.legendContainer.wrap('<div id="LeftMenuBox"></div>');
    LM_Data.leftMenuContainer = LM_Data.legendContainer.parent();
    LM_Data.leftMenuContainer.prepend('<div class="left-menu-controls"><a href="#" data-event="legend-switch">&gt;</a></div>');
    LM_Data.minMarging = -($('.menu-legend-container').outerWidth()) - 10; // размер элемента по Х
    LM_Data.legendContainer.css({
        "margin-left": LM_Data.minMarging + "px",
    });
}
var funcLM_Switch = function (OPEN, CallBack) {
    LM_Data.animationAction = true;
    if (OPEN) { // если передана команда на открытие
        LM_Data.legendContainer.animate({// Аргументы: CSS, скорость, Функция по завершении
            "margin-left": 0,
        }, LM_Data.animationSpeed, function () {
            $('[data-event="legend-switch"]').addClass('opened');
            $('[data-event="legend-switch"]').text('<');
            LM_Data.animationAction = false;
            CallBack();
        });
    } else {// если передана команда на закрытие
        LM_Data.legendContainer.animate({ // Аргументы: CSS, скорость, Функция по завершении
            "margin-left": LM_Data.minMarging + "px",
        }, LM_Data.animationSpeed, function () {
            $('[data-event="legend-switch"]').removeClass('opened');
            $('[data-event="legend-switch"]').text('>');
            LM_Data.animationAction = false;
            CallBack();
        });
    }
}


$(document)
    .on('click', '[data-event="legend-switch"]', function () {
        if (LM_Data.animationAction) {
            return false;
        }
        var isOpened = $(this).hasClass('opened');
        funcLM_Switch(!isOpened, function () {
            //$('[data-event="legend-switch"]').trigger('click');
        });
        return false;
    })
    .ready(function () {
        funcLM_Init();
    })
;