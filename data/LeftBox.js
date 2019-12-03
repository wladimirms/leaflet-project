var LeftBoxData = {
    object: null,
};

var LeftBoxCreateInterface = function () {
    LeftBoxData.object
        .append('<div class="leftbox-header"></div>')
        .append('<div class="leftbox-nav"></div>')
        .append('<div class="leftbox-content">' +
            '<div id=\'leftBoxResults1\'>' +
            '<div id=\'searchContainer\'>' +
            '</div>' +
            '</div>' +
            '<div id=\'leftBoxResults2\' style="display: none">' +
            //
            '</div>' +
            '<div id=\'leftBoxResults3\' style="display: none">' +
            //
            '</div>' +
            '</div>')
        .append('<div class="leftbox-ad"><a href="#" id="link">Ссылка</a><img src="data/images/banner_ad.png" id="ad"></div>')
    ;
    LeftBoxData.object.find(".leftbox-header")
        .append('<a href="#" id="leftboxSign">Войти</a>')
        .append('<button id="leftboxMenu">&lt;</button>')
        .append('<a href="#" id="leftboxLogo"><img src="data/images/tsnigri.png" id="logo"></a>')
        .append('<span id="leftboxUser">Иван Петров</span>')
    ;
    LeftBoxData.object.find(".leftbox-nav")
        .append('<a href="#" id="leftboxControl">Поиск</a>')
        .append('<a href="#" id="leftboxControl">Результат</a>')
        .append('<a href="#" id="leftboxControl">Инфо</a>')
    ;
    $("#searchContainer").GeoJsonAutocomplete({});
}

$(document).ready(function () {
    $('body').append('<div id="leftbox"></div>');
    LeftBoxData.object = $("#leftbox");
    LeftBoxCreateInterface();
})


