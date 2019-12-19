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
</style>
 
<script type="text/javascript" src="jQuery-3.3.1/jquery-3.3.1.js"></script>
<script type="text/javascript" src="Bootstrap-4-4.1.1/js/bootstrap.js"></script>
<script type="text/javascript" src="DataTables-1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="DataTables-1.10.20/js/dataTables.bootstrap4.js"></script>

    <title>Column Search in DataTables using Server-side Processing</title>
    <script>
        $(document).ready(function ()
        {
            $('#tbl-uds thead  tr:eq(1) th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="search" class="col-search-input" placeholder="Искать по: ' + title + '"/>');
            });
            
            var table = $('#tbl-uds').DataTable({
               "language": {
                           "url": "lang/Russian.lang"
                           },
                "orderCellsTop": true,
                "fixedHeader": true,
                stateSave: true,
                lengthMenu:[[5, 10, 25, 50, -1],
                           [5, 10, 25, 50, "All" ]],
                "scrollX": true,
            	"pagingType": "numbers",
                "processing": true,
                "serverSide": true,
                "ajax": "server-side/server.php",
                columnDefs: [{
                    targets: "_all",
                    orderable: true
                 }]
            });

            $('#tbl-uds thead').on ('keyup', ".col-search-input", function() {
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
        <table name="tbl-uds" id="tbl-uds" class="display table table-striped table-bordered" style="width:100%">

            <thead>
                <tr style="text-align:center;">
                    <th>Идентификатор<br>(oid ,1)</th>
                    <th>Папка<br>(stor_folder, 2)</th>
                    <th>Наименование<br>(obj_name, 3)</th>
                    <th>Тип объекта<br>(obj_type, 4)</th>
                    <th>Год составления<br>(obj_year, 5)</th>
		    <th>Авторы<br>(obj_authors, 6)</th>
		    <th>Организация<br>(obj_orgs, 7)</th>
		    <th>Ключевые слова<br>(obj_terms, 8)</th>
		    <th>АТД<br>(spat_atd_ate, 9)</th>
		    <th>Путь на сервере<br>(path_local, 10)</th>
		    <th>Путь NextCloud<br>(path_cloud, 11)</th>

                </tr>
                <tr name="th-search" id ="th-search" align="center">
                    <th>Идентификатор (oid ,1)</th>
                    <th>Папка (stor_folder, 2)</th>
                    <th>Наименование (obj_name, 3)</th>
                    <th>Тип объекта (obj_type, 4)</th>
                    <th>Год составления (obj_year, 5)</th>
		    <th>Авторы (obj_authors, 6)</th>
		    <th>Организация (obj_orgs, 7)</th>
		    <th>Ключевые слова (obj_terms, 8)</th>
		    <th>АТД (spat_atd_ate, 9)</th>
		    <th>Путь на сервере (path_local, 10)</th>
		    <th>Путь NextCloud (path_cloud, 11)</th>

                </tr>
            </thead>
            <tfoot>
                 <tr style="text-align:center;">
                    <th>Идентификатор<br>(oid ,1)</th>
                    <th>Папка<br>(stor_folder, 2)</th>
                    <th>Наименование<br>(obj_name, 3)</th>
                    <th>Тип объекта<br>(obj_type, 4)</th>
                    <th>Год составления<br>(obj_year, 5)</th>
		    <th>Авторы<br>(obj_authors, 6)</th>
		    <th>Организация<br>(obj_orgs, 7)</th>
		    <th>Ключевые слова<br>(obj_terms, 8)</th>
		    <th>АТД<br>(spat_atd_ate, 9)</th>
		    <th>Путь на сервере<br>(path_local, 10)</th>
		    <th>Путь NextCloud<br>(path_cloud, 11)</th>
                </tr>
            </tfoot>
            
        </table>
     </div>
</body>
</html>