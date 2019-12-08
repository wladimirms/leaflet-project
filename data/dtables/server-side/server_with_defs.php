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
$table = 'inv_auth_uds';
 
// Table's primary key
$primaryKey = 'oid';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array ( 'db' => 'oid', 'dt' => 'oid'/*, 'href' => 'server-side/server.php'*/),
    array ( 'db' => 'uniq_id', 'dt' => 'uniq_id'),
    array ( 'db' => 'stor_folder', 'dt' => 'stor_folder'),
    array ( 'db' => 'stor_phys', 'dt' => 'stor_phys'),
    array ( 'db' => 'stor_reason', 'dt' => 'stor_reason'),
    array ( 'db' => 'stor_date', 'dt' => 'stor_date'),
    array ( 'db' => 'stor_dept', 'dt' => 'stor_dept'),
    array ( 'db' => 'stor_person', 'dt' => 'stor_person'),
    array ( 'db' => 'stor_desc', 'dt' => 'stor_desc'),
    array ( 'db' => 'stor_fmts', 'dt' => 'stor_fmts'),
    array ( 'db' => 'stor_units', 'dt' => 'stor_units'),
    array ( 'db' => 'obj_name', 'dt' => 'obj_name'),
    array ( 'db' => 'obj_synopsis', 'dt' => 'obj_synopsis'),
    array ( 'db' => 'obj_main_group', 'dt' => 'obj_main_group'),
    array ( 'db' => 'obj_sub_group', 'dt' => 'obj_sub_group'),
    array ( 'db' => 'obj_type', 'dt' => 'obj_type'),
    array ( 'db' => 'obj_sub_type', 'dt' => 'obj_sub_type'),
    array ( 'db' => 'obj_assoc_inv_nums', 'dt' => 'obj_assoc_inv_nums'),
    array ( 'db' => 'obj_date', 'dt' => 'obj_date'),
    array ( 'db' => 'obj_year', 'dt' => 'obj_year'),
    array ( 'db' => 'obj_authors', 'dt' => 'obj_authors'),
    array ( 'db' => 'obj_orgs', 'dt' => 'obj_orgs'),
    array ( 'db' => 'obj_restrict', 'dt' => 'obj_restrict'),
    array ( 'db' => 'obj_rights', 'dt' => 'obj_rights'),
    array ( 'db' => 'obj_rdoc_name', 'dt' => 'obj_rdoc_name'),
    array ( 'db' => 'obj_rdoc_num', 'dt' => 'obj_rdoc_num'),
    array ( 'db' => 'obj_rdoc_id', 'dt' => 'obj_rdoc_id'),
    array ( 'db' => 'obj_terms', 'dt' => 'obj_terms'),
    array ( 'db' => 'obj_sources', 'dt' => 'obj_sources'),
    array ( 'db' => 'obj_supl_info', 'dt' => 'obj_supl_info'),
    array ( 'db' => 'obj_main_min', 'dt' => 'obj_main_min'),
    array ( 'db' => 'obj_supl_min', 'dt' => 'obj_supl_min'),
    array ( 'db' => 'obj_group_min', 'dt' => 'obj_group_min'),
    array ( 'db' => 'obj_assoc_geol', 'dt' => 'obj_assoc_geol'),
    array ( 'db' => 'spat_atd_ate', 'dt' => 'spat_atd_ate'),
    array ( 'db' => 'spat_loc', 'dt' => 'spat_loc'),
    array ( 'db' => 'spat_num_grid', 'dt' => 'spat_num_grid'),
    array ( 'db' => 'spat_coords_source', 'dt' => 'spat_coords_source'),
    array ( 'db' => 'spat_toponim', 'dt' => 'spat_toponim'),
    array ( 'db' => 'spat_link', 'dt' => 'spat_link'),
    array ( 'db' => 'spat_json', 'dt' => 'spat_json'),
    array ( 'db' => 'inf_type', 'dt' => 'inf_type'),
    array ( 'db' => 'inf_media', 'dt' => 'inf_media'),
    array ( 'db' => 'path_local', 'dt' => 'path_local'),
    array ( 'db' => 'path_cloud', 'dt' => 'path_cloud', 'formatter' => function( $d, $row) {
            return '<a href="' . $d . '" target="_blank">' . $d . '</a>';
            }),
    array ( 'db' => 'path_others', 'dt' => 'path_others'),
    array ( 'db' => 'linked_objs', 'dt' => 'linked_objs'),
    array ( 'db' => 'verified', 'dt' => 'verified'),
    array ( 'db' => 'status', 'dt' => 'status'),
    array ( 'db' => 'timecode', 'dt' => 'timecode')
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'postgres',
    'pass' => 'postgres',
    'db'   => 'udfobjects',
    'host' => 'localhost',
    'port' => '5432'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
//require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
require( 'ssp.class.pg.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
?>