<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="Bootstrap-4-4.1.1/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.20/css/dataTables.bootstrap4.css"/>
<style type="text/css">
input[type="search"]::-webkit-search-cancel-button {
     -webkit-appearance: searchfield-cancel-button;
     }
input[type="text"]::-webkit-search-cancel-button {
     -webkit-appearance: searchfield-cancel-button;
     }
tr, td {text-align:center;}
table {
    margin: 0 auto;
    width: 100%;
    clear: both;
    border-collapse: collapse;
    table-layout: fixed;
    word-wrap: break-word;
     }
.cell-hyphens {
    word-wrap: break-word;
    max-width: 1px;
    -webkit-hyphens: auto; /* iOS 4.2+ */
    -moz-hyphens: auto; /* Firefox 5+ */
    -ms-hyphens: auto; /* IE 10+ */
    hyphens: auto;
}

</style>
 
<script type="text/javascript" src="jQuery-3.3.1/jquery-3.3.1.js"></script>
<script type="text/javascript" src="Bootstrap-4-4.1.1/js/bootstrap.js"></script>
<script type="text/javascript" src="DataTables-1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables-1.10.20/js/dataTables.bootstrap4.js"></script>

    <title>Тест объектов реестра учета</title>
    <script>
/*
Определяем источники данных для столбцов дататабля, это для метода POST, GET ругается, слишком длинный.
 */
        var rbdColumns =  [
            {"data": "oid"},
            {"data": "uniq_id"},
            {"data": "stor_folder"},
            {"data": "stor_phys"},
            {"data": "stor_reason"},
            {"data": "stor_date"},
            {"data": "stor_dept"},
            {"data": "stor_person"},
            {"data": "stor_desc"},
            {"data": "stor_fmts"},
            {"data": "stor_units"},
            {"data": "obj_name"},
            {"data": "obj_synopsis"},
            {"data": "obj_main_group"},
            {"data": "obj_sub_group"},
            {"data": "obj_type"},
            {"data": "obj_sub_type"},
            {"data": "obj_assoc_inv_nums"},
            {"data": "obj_date"},
            {"data": "obj_year"},
            {"data": "obj_authors"},
            {"data": "obj_orgs"},
            {"data": "obj_restrict"},
            {"data": "obj_rights"},
            {"data": "obj_rdoc_name"},
            {"data": "obj_rdoc_num"},
            {"data": "obj_rdoc_id"},
            {"data": "obj_terms"},
            {"data": "obj_sources"},
            {"data": "obj_supl_info"},
            {"data": "obj_main_min"},
            {"data": "obj_supl_min"},
            {"data": "obj_group_min"},
            {"data": "obj_assoc_geol"},
            {"data": "spat_atd_ate"},
            {"data": "spat_loc"},
            {"data": "spat_num_grid"},
            {"data": "spat_coords_source"},
            {"data": "spat_toponim"},
            {"data": "spat_link"},
            {"data": "spat_json"},
            {"data": "inf_type"},
            {"data": "inf_media"},
            {"data": "path_local"},
            {"data": "path_cloud"},
            {"data": "path_others"},
            {"data": "linked_objs"},
            {"data": "verified"},
            {"data": "status"},
            {"data": "timecode"}
        ];

        var rbdColumnDefs = [{
            targets: "_all",
            orderable: true
        },
            { "visible": false,  "targets": [11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42 ] } /*,
            { "searchable": false,  "targets": [0, 1,2,3,4,5,6] }*/
        ];

        $(document).ready(function ()
        {
            $('#tbl-uds thead  tr:eq(1) th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" style="font-weight: bold; font-size:small;" class="col-search-input" placeholder="Искать по: ' + title + '"/>');
            });
            
            var table = $('#tbl-uds').DataTable({
               "language": {
                           "url": "lang/Russian.lang"
                           },
                "orderCellsTop": true,
                "fixedHeader": true,
                stateSave: false,
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
                "columnDefs": rbdColumnDefs
            });

            //table.columns( [-1,-2] ).visible( true );

            $('#tbl-uds thead').on ('keyup change', ".col-search-input", function() {
              table
                 .column($(this).parent().index())
                 .search(this.value)
                 .draw();
            });
        });

    </script>
</head>

<body>
     <div class="datatable-container dt-bootsrap4" style="margin-left:2%; width:96%">
        <h2 style="text-align:center;">Реестр объектов учета</h2>
        <table name="tbl-uds" id="tbl-uds" class="display compact table-striped table-bordered" style="width:100%">

            <thead>
                <tr style="text-align:center;">
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
                <tr name="th-search" id ="th-search" align="center">
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
            </thead>
            <tfoot>
                 <tr style="text-align:center;">
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