<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
//$table = 'uds_main';
//$table = 'view_uds';
//$table = 'view_auth';
//$table = 'inv_auth_uds';
$table = 'view_final_3';

// Table's primary key
$primaryKey = 'oid';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array ( 'db' => 'oid', 'dt' => 'oid', 'title' => 'Идентификатор ОУ'/*, 'href' => 'server-side/server.php'*/),
    array ( 'db' => 'uniq_id', 'dt' => 'uniq_id', 'title' => 'Уникальный составной идентификатор'),
    array ( 'db' => 'stor_folder', 'dt' => 'stor_folder', 'title' => 'Имя папки хранения'),
    array ( 'db' => 'stor_phys', 'dt' => 'stor_phys', 'title' => 'Физическое место хранения'),
    array ( 'db' => 'stor_reason', 'dt' => 'stor_reason', 'title' => 'Причина/основание внесения'),
    array ( 'db' => 'stor_date', 'dt' => 'stor_date', 'title' => 'Дата внесения'),
    array ( 'db' => 'stor_dept', 'dt' => 'stor_dept', 'title' => 'Отдел-источник ОУ'),
    array ( 'db' => 'stor_person', 'dt' => 'stor_person', 'title' => 'Сотрудник, внесший данные'),
    array ( 'db' => 'stor_desc', 'dt' => 'stor_desc', 'title' => 'Пояснения к процедуре ввода ОУ'),
    array ( 'db' => 'stor_fmts', 'dt' => 'stor_fmts', 'title' => 'Форматы хранения ОУ'),
    array ( 'db' => 'stor_units', 'dt' => 'stor_units', 'title' => 'Единицы хранения ОУ'),
    array ( 'db' => 'obj_name', 'dt' => 'obj_name', 'title' => 'Наименование ОУ'),
    array ( 'db' => 'obj_synopsis', 'dt' => 'obj_synopsis', 'title' => 'Реферат ОУ'),
    array ( 'db' => 'obj_main_group', 'dt' => 'obj_main_group', 'title' => 'Группа учета ОУ'),
    array ( 'db' => 'obj_sub_group', 'dt' => 'obj_sub_group', 'title' => 'Подгруппа учета ОУ'),
    array ( 'db' => 'obj_type', 'dt' => 'obj_type', 'title' => 'Тип учета ОУ'),
    array ( 'db' => 'obj_sub_type', 'dt' => 'obj_sub_type', 'title' => 'Подтип учета ОУ'),
    array ( 'db' => 'obj_assoc_inv_nums', 'dt' => 'obj_assoc_inv_nums', 'title' => 'Связанные с ОУ инвентарные номера в других каталогах учета'),
    array ( 'db' => 'obj_date', 'dt' => 'obj_date', 'title' => 'Дата составления ОУ'),
    array ( 'db' => 'obj_year', 'dt' => 'obj_year', 'title' => 'Год составления ОУ'),
    array ( 'db' => 'obj_authors', 'dt' => 'obj_authors', 'title' => 'Авторы ОУ'),
    array ( 'db' => 'obj_orgs', 'dt' => 'obj_orgs', 'title' => 'Организации-исполнители'),
    array ( 'db' => 'obj_restrict', 'dt' => 'obj_restrict', 'title' => 'Ограничительный гриф ОУ'),
    array ( 'db' => 'obj_rights', 'dt' => 'obj_rights', 'title' => 'Права на ОУ'),
    array ( 'db' => 'obj_rdoc_name', 'dt' => 'obj_rdoc_name', 'title' => 'Наименование регламентного документа'),
    array ( 'db' => 'obj_rdoc_num', 'dt' => 'obj_rdoc_num', 'title' => 'Номер регламентного документа'),
    array ( 'db' => 'obj_rdoc_id', 'dt' => 'obj_rdoc_id', 'title' => 'Идентификационный номер регламентного документа'),
    array ( 'db' => 'obj_terms', 'dt' => 'obj_terms', 'title' => 'Ключевые слова ОУ'),
    array ( 'db' => 'obj_sources', 'dt' => 'obj_sources', 'title' => 'Источники поступления и данных для ОУ'),
    array ( 'db' => 'obj_supl_info', 'dt' => 'obj_supl_info', 'title' => 'Дополнительная информация по ОУ'),
    array ( 'db' => 'obj_main_min', 'dt' => 'obj_main_min', 'title' => 'Основные полезные ископаемые, ассоциированные с ОУ'),
    array ( 'db' => 'obj_supl_min', 'dt' => 'obj_supl_min', 'title' => 'Попутные полезные ископаемые, ассоциированные с ОУ'),
    array ( 'db' => 'obj_group_min', 'dt' => 'obj_group_min', 'title' => 'Группа(основная) полезных ископаемых, ассоциированных с ОУ'),
    array ( 'db' => 'obj_assoc_geol', 'dt' => 'obj_assoc_geol', 'title' => 'Ассоциированные с ОУ геологические объекты'),
    array ( 'db' => 'spat_atd_ate', 'dt' => 'spat_atd_ate', 'title' => 'Сведения об основных административно-территориальных единицах ОУ (административно-территориальное деление)'),
    array ( 'db' => 'spat_loc', 'dt' => 'spat_loc', 'title' => 'Региональные АТД/АТЕ'),
    array ( 'db' => 'spat_num_grid', 'dt' => 'spat_num_grid', 'title' => 'Номенклатурные листы, в которых находится ОУ'),
    array ( 'db' => 'spat_coords_source', 'dt' => 'spat_coords_source', 'title' => 'Источники координат ОУ'),
    array ( 'db' => 'spat_toponim', 'dt' => 'spat_toponim', 'title' => 'Топонимы для ОУ'),
    array ( 'db' => 'spat_link', 'dt' => 'spat_link', 'title' => 'Идентификаторы связанных пространственных объектов'),
    array ( 'db' => 'spat_json', 'dt' => 'spat_json', 'title' => 'JSON-строка с координатами (основными) ОУ'),
    array ( 'db' => 'inf_type', 'dt' => 'inf_type', 'title' => 'Тип информации ОУ (первичная/интерпретированная)'),
    array ( 'db' => 'inf_media', 'dt' => 'inf_media', 'title' => 'Тип носителя (физический) ОУ'),
    array ( 'db' => 'path_local', 'dt' => 'path_local', 'title' => 'Путь хранения ОУ сетевой'),
    array ( 'db' => 'path_cloud', 'dt' => 'path_cloud', 'title' => 'Путь хранения ОУ NextCloud', 'formatter' => function( $d, $row) {
            return '<a href="' . $d . '" target="_blank">' . $d . '</a>';
            }),
    array ( 'db' => 'path_others', 'dt' => 'path_others', 'title' => 'Пути прочие (URL/URI)'),
    array ( 'db' => 'linked_objs', 'dt' => 'linked_objs', 'title' => 'Идентификаторы связанных объектов'),
    array ( 'db' => 'verified', 'dt' => 'verified', 'title' => 'Признак проверки'),
    array ( 'db' => 'status', 'dt' => 'status', 'title' => 'Статус информации по ОУ'),
    array ( 'db' => 'timecode', 'dt' => 'timecode', 'title' => 'Таймкод ОУ')
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'postgres',
    'pass' => 'postgres',
    'db'   => 'udfobjects',
    'host' => 'toliman',
    'port' => '5432'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
//require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
//require_once( 'ssp.class.pg.php' );
?>