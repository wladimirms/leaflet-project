var LeftBoxData = {
    object: null,
};

var LeftBoxCreateInterface = function () {
    LeftBoxData.object
        .append('<div class="leftbox-header"></div>')
        .append('<div class="leftbox-nav"></div>')
        .append('<div class="leftbox-content"></div>')
        .append('<div class="leftbox-ad"></div>')
    ;
    LeftBoxData.object.find(".leftbox-header")
        .append('<a href="#" id="leftboxSign">Войти</a>')
        .append('<a href="#" id="leftboxMenu">&lt;</a>')
        .append('<a href="#" id="leftboxLogo">TsNIGRI</a>')
        .append('<span id="leftboxUser">Иван Петров</span>')
    ;
    LeftBoxData.object.find(".leftbox-nav")
        .append('<a href="#" id="leftboxControl">Поиск</a>')
        .append('<a href="#" id="leftboxControl">Результат</a>')
        .append('<a href="#" id="leftboxControl">Инфо</a>')
    ;
}

$(document).ready(function () {
    $('body').append('<div id="leftbox"></div>');
    LeftBoxData.object = $("#leftbox");
    LeftBoxCreateInterface();
})

