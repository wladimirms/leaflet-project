<?php
//require( 'vendor/DataTables/server-side/scripts/ssp.class.php' );
require_once( 'server_defs.php' );
require_once( 'ssp.class.pg.php' );
 
echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
?>