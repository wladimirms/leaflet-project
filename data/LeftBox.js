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
        .append('<a href="#" id="leftboxMenu">&lt;</a>')
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

var dtablesInit = function () {
    var SH = $(self).innerHeight();
    SH = Math.round(SH);
    halfSH = Math.round(SH / 2);
    $('body').append('<div id="dtables" open-top="' + halfSH + 'px" close-top="' + SH + 'px">' +
        '<div><a href="#" id="dtablesSwitch">Отрыть/Закрыть</a></div>' +
        '<iframe src="/data/dtables/index.php"></iframe>' +
        '</div>');
    $('#dtables').css({
        'top': SH + 'px',
        'display': 'block',
    });
}

var showGeometry = function (text) {
    alert('This is ' + text);
}

$(document)
    .on('click', '#dtablesSwitch', function () {
        var OBJ = $('#dtables');
        var STATUS = OBJ.attr('switch-status');
        var H;
        console.log(STATUS);
        STATUS = STATUS != 'opened' ? 'closed' : 'opened';
        if (STATUS == 'opened') {
            H = OBJ.attr('close-top');
        } else {
            H = OBJ.attr('open-top');
        }
        OBJ.animate({'top': H}, 250);
        OBJ.find('iframe').animate({'height': H}, 250);
        OBJ.attr('switch-status', STATUS != 'opened' ? 'opened' : 'closed');
        return false;
    })
    .ready(function () {
        $('body').append('<div id="leftbox"></div>');
        LeftBoxData.object = $("#leftbox");
        LeftBoxCreateInterface();
        dtablesInit();
    })


