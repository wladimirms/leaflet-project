<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="Bootstrap-4-4.1.1/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="DataTables-1.10.20/css/dataTables.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="FixedHeader-3.1.6/css/fixedHeader.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="Buttons-1.6.1/css/buttons.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="Responsive-2.2.3/css/responsive.bootstrap4.css"/>
    <link rel="stylesheet" type="text/css" href="Scroller-2.0.1/css/scroller.bootstrap4.css"/>
    <link href="fontawesome/css/all.css" rel="stylesheet">
<style type="text/css">
    body {
        line-height: 1.2em;
        font-size: 80%;
        font-family: "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
        margin: 5px;
        padding: 5px;
        color: #333;
        background-color: #fff;
    }
input[type="search"]::-webkit-search-cancel-button {
     -webkit-appearance: searchfield-cancel-button;
     }
input[type="text"]::-webkit-search-cancel-button {
     -webkit-appearance: searchfield-cancel-button;
     }  
/*tr, td {text-align:center;}*/
/*table {
    margin: 0 auto;
    width: 100%;
    clear: both;
    border-collapse: collapse;
    table-layout: fixed;
    word-wrap: break-word;
     }*/
/*table.cell-hyphens {
    word-wrap: break-word;
    max-width: 50px;
    -webkit-hyphens: auto; !* iOS 4.2+ *!
    -moz-hyphens: auto; !* Firefox 5+ *!
    -ms-hyphens: auto; !* IE 10+ *!
    hyphens: auto;
}*/
/*    .searchStyle
    {
        padding: 0px 0px;
        margin-top: -0px;
    }*/
    div.datatable-container {
        padding: inherit;
    }
    td.details-control {
        background: url('resources/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('resources/details_close.png') no-repeat center center;
    }

    td.actions-control {
      min-width: 10px;
    }
    div.detailblock {
        border-style: solid;
        border-radius: 10px;
        border-width: thin;
        border-color: rgba(44, 204, 178, 0.52);
    }
    div.detailblock td {
        display: table-cell;
        max-width: 400px;
        vertical-align: middle;
        text-align: center;
        font-size: small;
    }

    div.nodata {
        color: rgba(211, 168, 98, 0.9);
        }

    .GetInfo {
        cursor: pointer;
        color: dodgerblue;
    }

    .GetInfo.spawned {
        cursor: pointer;
        color: slategrey;
    }

</style>
 
    <script type="text/javascript" src="jQuery-3.3.1/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="Bootstrap-4-4.1.1/js/bootstrap.js"></script>
    <script type="text/javascript" src="DataTables-1.10.20/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="DataTables-1.10.20/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="FixedHeader-3.1.6/js/dataTables.fixedHeader.js"></script>
    <script type="text/javascript" src="JSZip-2.5.0/jszip.js"></script>
    <script type="text/javascript" src="pdfmake-0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="pdfmake-0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="Buttons-1.6.1/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="Buttons-1.6.1/js/buttons.bootstrap4.js"></script>
    <script type="text/javascript" src="Buttons-1.6.1/js/buttons.colVis.js"></script>
    <script type="text/javascript" src="Buttons-1.6.1/js/buttons.flash.js"></script>
    <script type="text/javascript" src="Buttons-1.6.1/js/buttons.html5.js"></script>
    <script type="text/javascript" src="Buttons-1.6.1/js/buttons.print.js"></script>
    <script type="text/javascript" src="Responsive-2.2.3/js/dataTables.responsive.js"></script>
    <script type="text/javascript" src="Scroller-2.0.1/js/dataTables.scroller.js"></script>
    <script defer src="fontawesome/js/all.js"></script>

    <title>Тест объектов реестра учета</title>
    <script>
/*
Определяем источники данных для столбцов дататабля, это для метода POST, GET ругается, слишком длинный.
 */
        var rbdColumns =  [
/*            {
                "className":      'details-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "title": "Детали...",
                "defaultContent": ''
            },*/
            //CUSTOM ACTIONS
            {
                "className":      'actions-control',
                "orderable":      false,
                "searchable":     false,
                "data":           null,
                "title": '<i class="fas fa-info-circle fa-1x info-header"></i>',
                "defaultContent": '<i class="fas fa-info-circle fa-2x GetInfo" title="Щелкните, чтобы показать/скрыть подробную информацию по ОУ."></i>'
                /*<button class="GetName">Name!</button> <button class="GetPosition">Position!</button>*/
            },
            //END ACTIONS
            {"data": "oid", "orderable": true, "searchable": true, "visible": true, "title": "OID"},
            {"data": "uniq_id", "orderable": false, "searchable": false, "visible": false, "title": "UIN"},
            {"data": "stor_folder", "orderable": true, "searchable": true, "visible": false, "title": "Папка"},
            {"data": "stor_phys", "orderable": true, "searchable": true, "visible": false, "title": "Физическое место хранения"},
            {"data": "stor_reason", "orderable": true, "searchable": true, "visible": true, "title": "Причина внесения"
/*            "render": function(data, type, row) {
                //console.log(data);
                //console.log(type);
                //console.log(row);
                return (data != null ? data : '') + '\nДлина строки:' + (data != null ? data.length : '0');
            }*/},
            {"data": "stor_date", "orderable": true, "searchable": true, "visible": false, "title": "Дата внесения"},
            {"data": "stor_dept", "orderable": true, "searchable": true, "visible": false, "title": "Отдел"},
            {"data": "stor_person", "orderable": true, "searchable": true, "visible": true, "title": "Сотрудник"},
            {"data": "stor_desc", "orderable": true, "searchable": true, "visible": true, "title": "Описание к внесению"},
            {"data": "stor_fmts", "orderable": true, "searchable": true, "visible": true, "title": "Форматы"},
            {"data": "stor_units", "orderable": true, "searchable": true, "visible": true, "title": "Единицы"},
            {"data": "obj_name", "orderable": true, "searchable": true, "visible": true, "title": "Наименование ОУ"},
            {"data": "obj_synopsis", "orderable": true, "searchable": true, "visible": true, "title": "Реферат"},
            {"data": "obj_main_group", "orderable": true, "searchable": true, "visible": true, "title": "Группа ОУ"},
            {"data": "obj_sub_group", "orderable": true, "searchable": true, "visible": true, "title": "Подгруппа ОУ "},
            {"data": "obj_type", "orderable": true, "searchable": true, "visible": true, "title": "Тип ОУ"},
            {"data": "obj_sub_type", "orderable": true, "searchable": true, "visible": true, "title": "Подтип ОУ"},
            {"data": "obj_assoc_inv_nums", "orderable": true, "searchable": true, "visible": false, "title": "Связанные инв. №№"},
            {"data": "obj_date", "orderable": true, "searchable": true, "visible": false, "title": "Дата составления ОУ"},
            {"data": "obj_year", "orderable": true, "searchable": true, "visible": true, "title": "Год составления ОУ"},
            {"data": "obj_authors", "orderable": true, "searchable": true, "visible": true, "title": "Авторы"},
            {"data": "obj_orgs", "orderable": true, "searchable": true, "visible": true, "title": "Организации"},
            {"data": "obj_restrict", "orderable": true, "searchable": true, "visible": false, "title": "Гриф ОУ"},
            {"data": "obj_rights", "orderable": true, "searchable": true, "visible": false, "title": "Права на ОУ"},
            {"data": "obj_rdoc_name", "orderable": true, "searchable": true, "visible": false, "title": "Наименование регл. документа"},
            {"data": "obj_rdoc_num", "orderable": true, "searchable": true, "visible": false, "title": "Номер регл. документа"},
            {"data": "obj_rdoc_id", "orderable": true, "searchable": true, "visible": false, "title": "ИД регл. документа"},
            {"data": "obj_terms", "orderable": true, "searchable": true, "visible": true, "title": "Ключевые слова"},
            {"data": "obj_sources", "orderable": true, "searchable": true, "visible": false, "title": "Источники ОУ"},
            {"data": "obj_supl_info", "orderable": true, "searchable": true, "visible": false, "title": "Доп. инф. по ОУ"},
            {"data": "obj_main_min", "orderable": true, "searchable": true, "visible": true, "title": "Основные ПИ"},
            {"data": "obj_supl_min", "orderable": true, "searchable": true, "visible": true, "title": "Попутные ПИ"},
            {"data": "obj_group_min", "orderable": true, "searchable": true, "visible": true, "title": "Группа ПИ"},
            {"data": "obj_assoc_geol", "orderable": true, "searchable": true, "visible": true, "title": "Ассоциированные геологические объекты"},
            {"data": "spat_atd_ate", "orderable": true, "searchable": true, "visible": true, "title": "АТД/АТЕ основное"},
            {"data": "spat_loc", "orderable": true, "searchable": true, "visible": true, "title": "АТД/АТЕ региональное"},
            {"data": "spat_num_grid", "orderable": true, "searchable": true, "visible": true, "title": "Номенклатурные листы"},
            {"data": "spat_coords_source", "orderable": true, "searchable": true, "visible": false, "title": "Источники координат"},
            {"data": "spat_toponim", "orderable": true, "searchable": true, "visible": true, "title": "Топонимы"},
            {"data": "spat_link", "orderable": true, "searchable": true, "visible": false, "title": "ИД связанных простр. объектов"},
            {"data": "spat_json", "orderable": true, "searchable": true, "visible": false, "title": "JSON координаты"},
            {"data": "inf_type", "orderable": true, "searchable": true, "visible": false, "title": "Тип информации"},
            {"data": "inf_media", "orderable": true, "searchable": true, "visible": false, "title": "Тип носителя"},
            {"data": "path_local", "orderable": true, "searchable": true, "visible": true, "title": "Папка сетевая"},
            {"data": "path_cloud", "orderable": true, "searchable": true, "visible": true, "title": "Папка NextCloud"},
            {"data": "path_others", "orderable": true, "searchable": true, "visible": false, "title": "Папки прочие"},
            {"data": "linked_objs", "orderable": true, "searchable": true, "visible": false, "title": "ИД связанных объектов"},
            {"data": "verified", "orderable": true, "searchable": true, "visible": false, "title": "Проверено"},
            {"data": "status", "orderable": true, "searchable": true, "visible": false, "title": "Статус"},
            {"data": "timecode", "orderable": true, "searchable": true, "visible": false, "title": "Таймкод"}
        ];

        /*var rbdColumnDefs = [
            {targets: "_all",
            orderable: true},
            {targets: "_all",
            searchable: true}
        ];*/

/* Formatting function for row details - modify as you need */



        $(document).ready(function ()
        {

            $('#tbl-uds thead tr').clone(true).appendTo( '#tbl-uds thead' );
/*
            $('#tbl-uds thead tr').clone(true).appendTo( '#tbl-uds thead' );
            $('#tbl-uds thead tr:eq(1) th').each( function (i) {
                    //alert(i);
                    //alert(table.column(i).searchable());
                    var title = $(this).text().trim();
                    $(this).html('<input type="text" style="font-weight: bold; font-size:small; width: 100%;" class="col-search-input" placeholder="Поиск... '/!* + title*!/ + '"/>');

                    $('input', this).on('keyup change clear', function () {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
            } );
*/

            function format ( d ) {
                // `d` is the original data object for the row
                //alert(JSON.stringify(d));
                //alert(typeof d);
                //alert ($(table.columns(1).header()).html());
                console.log(d);
                //console.log(Object.keys(d).length);
                let formattedHTML = '';
                formattedHTML += '<div class="container detailblock" style="padding-left: 5px; padding-bottom: 5px; padding-top: 5px; padding-right: 5px; margin-left: 82px">' +'\n'+
                                 '<table class="table table-dark table-sm table-striped table-bordered rounded text-sm-left">'+'\n';
                //alert(formattedHTML);
                for (let i = 0; i < Object.keys(d).length; i++){
                    //let currValue = Object.values(d)[i] || 'Нет данных';
                    let currValue = (Object.values(d)[i] != null ? Object.values(d)[i] : '<div class="nodata">Нет данных</div>');
                    //(data != null ? data : '')
                    formattedHTML += '<tr>'+'\n'+
                                        '<td>'+$(table.columns(i+1).header()).html()+'</td>'+'\n'+
                                        '<td>'+currValue+'</td>'+'\n'+
                                     '</tr>'+'\n';
                };
                formattedHTML += '</table>' + '\n' + '</div>';
                 return formattedHTML;
/*                return '<div class="container" style="padding-left: 5px; padding-bottom: 5px; padding-top: 5px; margin-left: 82px">' +
                    '<table class="table table-striped table-dark table-bordered rounded text-sm-left" cellpadding="1" cellspacing="1" border="1">'+
                    '<tr>'+
                    '<td>OID:</td>'+
                    '<td>'+d.oid+'</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>Название:</td>'+
                    '<td>'+d.obj_name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td>Авторы:</td>'+
                    '<td>'+d.obj_authors+'</td>'+
                    '</tr>'+
                    '</table>' +
                    '</div>';*/
            };

            var table = $('#tbl-uds').DataTable({
                destroy: true,
                "stateSave": false,
                "stateDuration": 600,
                //dom: 'Blfrtip',
                //dom: 'Blfrtip<"actions">',
                dom : "<'row'<'col-sm-4'B><'col-sm-4'l><'col-sm-4 searchStyle'f>>" +"rt"+ "<'row'<'col-sm-2'i><'col-sm-10'p>>",
                language: {
                    "url": "lang/Russian.lang"
                },
                responsive: false,
                "orderCellsTop": true,
                "fixedHeader": false,
                lengthMenu:[[5, 10, 25, 50, -1],
                           [5, 10, 25, 50, "Все" ]],
                "scrollX": true,
                "pagingType": "full_numbers",
                "processing": true,
                "serverSide": true,
                "ajax": {
                   "url": "server-side/server.php",
                    "type": "POST"
                },
                "columns" : rbdColumns,
                "order": [[1, 'asc']],
                //"columnDefs": rbdColumnDefs,
                "initComplete": function() {
                    $("#tbl-uds").show();
                },
                buttons: [
                    {
                        extend: 'colvis',
                        collectionLayout: 'three-column',
                        text: "Столбцы",
                        columnText: function ( dt, idx, title ) {
                            return (idx+1)+': '+title;
                        }
                    }
                ]
            });

            $('#tbl-uds thead tr:eq(1) th').each( function (i) {
                //alert(i);
                //alert(table.settings()[0].aoColumns[i].bSearchable);
                if ((i < 1)){
                    $(this).html('');
                }
                else if ((table.settings()[0].aoColumns[i].bSearchable == true)) {
                    var title = $(this).text().trim();
                    $(this).html('<input type="text" style="font-weight: bold; font-size:small; width: 100%;" class="col-search-input" placeholder="Поиск... '/* + title*/ + '"/>');

                    $('input', this).on('keyup change clear', function () {
                        if (table.column(i).search() !== this.value) {
                            table
                                .column(i)
                                //.column( header.getAttribute('data-search-index')*1 ) // *1 to make it a number
                                .search(this.value)
                                .draw();
                        }
                    });
                }
                else {
                    //$(this).html('<div class="search-disabled">X</div>');
                    $(this).html('<input type="text" style="font-weight: bold; font-size:small; width: 100%;" class="col-search-input" placeholder="xxx'/* + title*/ + '" disabled/>');
                }
            } );


/*            $('#tbl-uds tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );*/

            $('#tbl-uds tbody').on( 'click', '.GetInfo', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
                //var data = row.data();
                //console.log(tr);
                //console.log(row);
                //console.log(data);
                //alert (Object.values(data)[11]);
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    //tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    //tr.addClass('shown');
                }
                $(this).toggleClass("spawned");
            });

            /*table.buttons().container()
                .appendTo( $('.col-md-6:eq(0)', table.table().container()) );
*/
            //table.columns( [-1,-2] ).visible( true );


/*            $('#tbl-uds thead  tr:eq(1) th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" style="font-weight: bold; font-size:small;" class="col-search-input" placeholder="Искать по: ' + title + '"/>');
            });*/

/*            $('#tbl-uds thead tr:eq(1) th').on ('keyup change clear', ".col-search-input", function() {
                //var idx = table.column($(this).parent()).index();
                //alert (this.value);
                table
                    .column( $(this).parent().index() )
                    .search( this.value )
                    .draw();
                //alert( 'Column index is ' + this.value);
            });*/
        });

    </script>
</head>

<body>
     <div class="datatable-container dt-bootsrap4 bg-dark text-white rounded" style="margin-left:1%; width:98%;">
        <h2 style="text-align:center;">Реестр объектов учета</h2>
        <table name="tbl-uds" id="tbl-uds" class="table-dark table-responsive-sm compact table-striped table-bordered text-center" style="width:100%;">
            <thead>
                <tr>
                    <!--<th>Детали...</th>-->
                    <th>Действия...</th>
                    <th>Индекс<br>(oid, 1)</th>
                    <th>УИН<br>(uniq_id, 2)</th>
                    <th>Папка<br>(stor_folder, 3)</th>
                    <th>Физ. хран.<br>(stor_phys, 4)</th>
                    <th style="min-width: 200px;">Прич. внес.<br>(stor_reason, 5)</th>
                    <th>Дата внес.<br>(stor_date, 6)</th>
                    <th>Отд. внес.<br>(stor_dept, 7)</th>
                    <th>Перс. внес.<br>(stor_person, 8)</th>
                    <th>Поясн. к внес.<br>(stor_desc, 9)</th>
                    <th>Форм. хран.<br>(stor_fmts, 10)</th>
                    <th>Ед. хран.<br>(stor_units, 11)</th>
                    <th style="min-width: 300px;">Наим. ОУ<br>(obj_name, 12)</th>
                    <th>Реферат<br>(obj_synopsis, 13)</th>
                    <th>Осн. гр. ОУ<br>(obj_main_group, 14)</th>
                    <th>Подгр. ОУ<br>(obj_sub_group, 15)</th>
                    <th>Тип ОУ<br>(obj_type, 16)</th>
                    <th>Подтип ОУ<br>(obj_sub_type, 17)</th>
                    <th>Связ. Инв.<br>(obj_assoc_inv_nums, 18)</th>
                    <th>Дата ОУ<br>(obj_date, 19)</th>
                    <th>Год<br>(obj_year, 20)</th>
                    <th>Авторы<br>(obj_authors, 21)</th>
                    <th>Организации<br>(obj_orgs, 22)</th>
                    <th>Огр. гриф<br>(obj_restrict, 23)</th>
                    <th>Права на ОУ<br>(obj_rights, 24)</th>
                    <th>Наим. регл. док.<br>(obj_rdoc_name, 25)</th>
                    <th>Номер регл. док.<br>(obj_rdoc_num, 26)</th>
                    <th>ИД регл. док.<br>(obj_rdoc_id, 27)</th>
                    <th>Ключевые слова<br>(obj_terms, 28)</th>
                    <th>Источники ОУ<br>(obj_sources, 29)</th>
                    <th>Доп. инф. ОУ<br>(obj_supl_info, 30)</th>
                    <th>Осн. ПИ<br>(obj_main_min, 31)</th>
                    <th>Попутн. ПИ<br>(obj_supl_min, 32)</th>
                    <th>Группа ПИ<br>(obj_group_min, 33)</th>
                    <th>Ассоц. геол. объекты<br>(obj_assoc_geol, 34)</th>
                    <th>АТД осн.<br>(spat_atd_ate, 35)</th>
                    <th>АТД/АТЕ доп.<br>(spat_loc, 36)</th>
                    <th>Ном. листы<br>(spat_num_grid, 37)</th>
                    <th>Источн. коорд.<br>(spat_coords_source, 38)</th>
                    <th>Топоним<br>(spat_toponim, 39)</th>
                    <th>ИД связ. прост. объекта<br>(spat_link, 40)</th>
                    <th>Простр. JSON<br>(spat_json, 41)</th>
                    <th>Тип инф. ОУ<br>(inf_type, 42)</th>
                    <th>Тип носителя ОУ<br>(inf_media, 43)</th>
                    <th>Путь на сервере<br>(path_local, 44)</th>
                    <th>Путь NextCloud<br>(path_cloud, 45)</th>
                    <th>Пути иные<br>(path_others, 46)</th>
                    <th>ИН связ. объектов<br>(linked_objs, 47)</th>
                    <th>Проверен<br>(verified, 48)</th>
                    <th>Статус<br>(status, 49)</th>
                    <th>Таймкод<br>(timecode, 50)</th>
                </tr>
            </thead>
            <tfoot>
                 <tr style="text-align:center;">
                     <!--<th>Детали...</th>-->
                     <th>Действия...</th>
                     <th>Индекс<br>(oid, 1)</th>
                     <th>УИН<br>(uniq_id, 2)</th>
                     <th>Папка<br>(stor_folder, 3)</th>
                     <th>Физ. хран.<br>(stor_phys, 4)</th>
                     <th>Прич. внес.<br>(stor_reason, 5)</th>
                     <th>Дата внес.<br>(stor_date, 6)</th>
                     <th>Отд. внес.<br>(stor_dept, 7)</th>
                     <th>Перс. внес.<br>(stor_person, 8)</th>
                     <th>Поясн. к внес.<br>(stor_desc, 9)</th>
                     <th>Форм. хран.<br>(stor_fmts, 10)</th>
                     <th>Ед. хран.<br>(stor_units, 11)</th>
                     <th>Наим. ОУ<br>(obj_name, 12)</th>
                     <th>Реферат<br>(obj_synopsis, 13)</th>
                     <th>Осн. гр. ОУ<br>(obj_main_group, 14)</th>
                     <th>Подгр. ОУ<br>(obj_sub_group, 15)</th>
                     <th>Тип ОУ<br>(obj_type, 16)</th>
                     <th>Подтип ОУ<br>(obj_sub_type, 17)</th>
                     <th>Связ. Инв.<br>(obj_assoc_inv_nums, 18)</th>
                     <th>Дата ОУ<br>(obj_date, 19)</th>
                     <th>Год<br>(obj_year, 20)</th>
                     <th>Авторы<br>(obj_authors, 21)</th>
                     <th>Организации<br>(obj_orgs, 22)</th>
                     <th>Огр. гриф<br>(obj_restrict, 23)</th>
                     <th>Права на ОУ<br>(obj_rights, 24)</th>
                     <th>Наим. регл. док.<br>(obj_rdoc_name, 25)</th>
                     <th>Номер регл. док.<br>(obj_rdoc_num, 26)</th>
                     <th>ИД регл. док.<br>(obj_rdoc_id, 27)</th>
                     <th>Ключевые слова<br>(obj_terms, 28)</th>
                     <th>Источники ОУ<br>(obj_sources, 29)</th>
                     <th>Доп. инф. ОУ<br>(obj_supl_info, 30)</th>
                     <th>Осн. ПИ<br>(obj_main_min, 31)</th>
                     <th>Попутн. ПИ<br>(obj_supl_min, 32)</th>
                     <th>Группа ПИ<br>(obj_group_min, 33)</th>
                     <th>Ассоц. геол. объекты<br>(obj_assoc_geol, 34)</th>
                     <th>АТД осн.<br>(spat_atd_ate, 35)</th>
                     <th>АТД/АТЕ доп.<br>(spat_loc, 36)</th>
                     <th>Ном. листы<br>(spat_num_grid, 37)</th>
                     <th>Источн. коорд.<br>(spat_coords_source, 38)</th>
                     <th>Топоним<br>(spat_toponim, 39)</th>
                     <th>ИД связ. прост. объекта<br>(spat_link, 40)</th>
                     <th>Простр. JSON<br>(spat_json, 41)</th>
                     <th>Тип инф. ОУ<br>(inf_type, 42)</th>
                     <th>Тип носителя ОУ<br>(inf_media, 43)</th>
                     <th>Путь на сервере<br>(path_local, 44)</th>
                     <th>Путь NextCloud<br>(path_cloud, 45)</th>
                     <th>Пути иные<br>(path_others, 46)</th>
                     <th>ИН связ. объектов<br>(linked_objs, 47)</th>
                     <th>Проверен<br>(verified, 48)</th>
                     <th>Статус<br>(status, 49)</th>
                     <th>Таймкод<br>(timecode, 50)</th>
                 </tr>
            </tfoot>
            
        </table>
     </div>
</body>
</html>