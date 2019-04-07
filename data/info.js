    var info = L.control({position: 'topleft'});

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
        console.log("TEST");
    };

    info.update = function (props) {

        this._div.innerHTML = '<h3>Объекты ГРР Роснедра по АБЦМ</h3><hr>' +  (props ?
            '<div class="scroll-box-info"><b><i>' + props.name + '</i></b><br /><br />' + '<b>ПИ:</b> '+props.density + '<br /><br />'+'<b>Субъект РФ:</b> '+props.subject + '<br /><br />'+'<b>Бюджетополучатель:</b> '+props.pref + '<br /><br />'+'<b>Исполнитель:</b> '+props.org +'<br /><br />'+'<b>Тип работ:</b> '+props.typ +'<br /><br />'+'<b>Сроки работ:</b> '+props.time +'<br /><br />'+'<b>Номер лицензии:</b> '+props.license +'<br /><br />'+'<b>Статус:</b> '+props.status +'<br /><br />' + '<b>Геол. задание:</b> '+props.task+'</div>'
            : 'Наведите курсор на площадной объект для развернутой информации');
        FUNC_INFO_BOX_INIT();
    };

    info.addTo(map);