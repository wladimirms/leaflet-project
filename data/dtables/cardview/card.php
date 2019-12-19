<?php
/**
 * Created by PhpStorm.
 * User: avahrushev
 * Date: 04.12.2019
 * Time: 12:55
 */
//    echo 'Working!!!';
//ПОДКЛЮЧАЕМ МОДУЛИ
include '../server-side/server_defs.php';
include_once '../server-side/ssp.class.pg.php';

//ВСТАВКА HTML ХИДЕР ИЗ ФАЙЛА
include 'card_header.php';

//СОЕДИНЯЕМСЯ С БД
$dbmy = SSP::sql_connect($sql_details);
$dbdb = SSP::db($sql_details);

//ПРОВЕРЯЕМ ПАРАМЕТРЫ ГЕТ-ЗАПРОСА
if(isset($_GET["oid"])) {
    $currID = $_GET["oid"];
    }
    else {
    echo "<br>В ГЕТ не передан OID<br>";
        }
//ЗАПРОС НА ВЫБОР ОБЪЕКТА ИЗ БД
$myquery = "SELECT * FROM ". $table. " WHERE oid=" . $_GET["oid"];

//ДАННЫЕ ПО ЗАПРОСУ
$resrow = SSP::sql_exec($dbmy, $myquery);

//ФОРМАТИОВАНИЕ ДАННЫХ
$mydata = SSP::data_output($columns, $resrow);

// --НАЧАЛО БЛОК КАРТОЧКИ ОБЪЕКТА

function formatMainTable($data) {
    global $columns;

    echo '<table class="card-table table-dark table-responsive-md compact rounded table-striped table-bordered text-md-center rounded">';
    echo '<thead><tr class="table-secondary" style="color: black"><th height="50px">Наименование</th><th>Информация</th></tr></thead>';
    $field_index = 0;
    foreach($data[0] as $key => $value)
    {echo '<tr>';
        $field_name = $columns[$field_index]['title'];
        //echo "<td>{$key},{$field_name},{$field_index}</td>";
        echo "<td>{$field_name}</td>";
        if (empty($value)) {
            echo '<td><div class="nodata">Данные не введены/отсутствуют</div></td>';
        }
        else {
            echo "<td>{$value}</td>";
        };
        echo '</tr>';
        $field_index += 1;
    };
    echo '</table>';
};

echo '<p><button class="btn btn-primary btn-info extended" type="button" data-toggle="collapse" data-target="#collapseCardTable" aria-expanded="false" aria-controls="collapseCardTable">
    Карточка объекта
  </button></p>';
echo '<div class="collapse show" id="collapseCardTable">';
echo '<div class="card card-body text-white bg-dark border-white">';

if (empty($mydata)){
    echo '<div class="nodata">Объект с OID = '. $currID . ' не найден</div>';
} else {
    //echo '<div class="text-info">Связанных объектов: '. count($mydata).'</div>';
    formatMainTable($mydata);
};

echo '</div></div>';

// --КОНЕЦ БЛОК КАРТОЧКИ ОБЪЕКТА

echo '<br>';

// --НАЧАЛО БЛОК КАРТОТЕКИ ОБЪЕКТА

function formatMainCardView($data) {
    global $columns;

    echo '<div class="card-columns border rounded">';
        $field_index = 0;
        foreach($data[0] as $key => $value)
        {echo '<div class="card bg-dark text-white border-light text-center">';
            $field_name = $columns[$field_index]['title'];
            //echo "<td>{$key},{$field_name},{$field_index}</td>";
            echo '<h6 class="card-header bg-info">' . $field_name . '</h6>';
            echo '<div class="card-body">';
            if (empty($value)) {
                echo '<div class="nodata card-text">Данные не введены/отсутствуют</div>';
            } else {
                echo '<div class="card-text">' . $value . '</div>';
            }
            echo '</div></div>';
            $field_index += 1;
        };
    echo '</div>';
};



echo '<p><button class="btn btn-primary btn-info extended" type="button" data-toggle="collapse" data-target="#collapseCardColumns" aria-expanded="false" aria-controls="collapseCardColumns">
    Картотека объекта
  </button></p>';
echo '<div class="collapse" id="collapseCardColumns">';
//echo '<div class="col-md-auto">';

if (empty($mydata)){
    echo '<div class="card card-body text-white bg-dark border-white">';
    echo '<div class="nodata">Объект с OID = '. $currID . ' не найден</div>';
    echo '</div>';
} else {
    //echo '<div class="text-info">Связанных объектов: '. count($mydata).'</div>';
    formatMainCardView($mydata);
};

echo '</div><br>';
// --КОНЕЦ БЛОК КАРТОТЕКИ ОБЪЕКТА
//echo '</div>';
/*
 SELECT * FROM view_final_3
  WHERE view_final_3.oid IN
  (SELECT linked_objs.linked_id2
           FROM linked_objs where linked_objs.object_id =6497);
 */

//Отладка связанного подзапроса

/*$linkquery = "SELECT * FROM ". $table. " WHERE " . $table. ".oid IN " .
                "(SELECT linked_objs.linked_id2 FROM linked_objs " .
                    "WHERE linked_objs.object_id = " . $currID ." \n" .
                  "UNION\n" .
                  "SELECT linked_objs.object_id FROM linked_objs " .
                    "WHERE linked_objs.linked_id2 = " . $currID ." \n" .
                  "EXCEPT\n" .
                  "SELECT " . $currID .
                ");";*/

$linkquery1 = <<<MYLINKQYERY
SELECT * FROM  {$table} WHERE {$table}.oid IN
    ((SELECT linked_objs.linked_id2 FROM linked_objs
        WHERE linked_objs.object_id = {$currID})
    UNION
    (SELECT linked_objs.object_id FROM linked_objs
        WHERE linked_objs.linked_id2 = {$currID})
    EXCEPT
    (SELECT {$currID}))
    ORDER BY {$table}.oid ASC;
MYLINKQYERY;

/*echo 'Запрос на связи: ' . $linkquery;
echo '<br>';
echo '<br>';
echo '<br>';
echo 'Запрос на связи1: ' . $linkquery1;
//var_dump($linkquery);
echo '<br>';
echo '<br>';
echo '<br>';*/
$linkrows = SSP::sql_exec($dbmy, $linkquery1);
//var_dump($linkrows);
//echo '<br>';
//echo '<br>';
//echo '<br>';
$linkdata = SSP::data_output($columns, $linkrows);
//var_dump($linkdata);
//echo '<br>';echo '<br>';echo '<br>';

// Конец блока отладки связанного подзапроса


// --НАЧАЛО БЛОК СВЯЗАННЫХ ОБЪЕКТОВ

function formatLinkTable($data, $showcols = array(0,1,16,11,20,19,27,12,44)){
    global $columns;
    $collen = count($showcols);
    echo '<div class="table-responsive">';
    echo '<table class="link-table table-dark compact rounded table-striped table-bordered text-md-center rounded">';
    echo '<thead>';
    echo '<tr class="table-secondary" style="color: black">';
    echo '<th height="50px"><i class="fas fa-info-circle fa-1x info-header"></i></th>';
    foreach($showcols as $curcolind) {
        $field_name = $columns[$curcolind]['title'];
        echo "<th>{$field_name}</th>";
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($data as $datarow){
        $item_oid = $datarow['oid'];
        $res_td = '<a href="card.php?oid=' . $item_oid . '" target="_blank"><i class="fas fa-scroll fa-lg show-card" title="Перейти к карточке ОУ."></i></a>';
        echo '<tr>';
         echo '<td>';
          echo $res_td;
         echo '</td>';

        foreach($showcols as $curcolind) {
            $field_data = $datarow[$columns[$curcolind]['dt']];
            echo "<td>{$field_data}</td>";
        }
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}

echo '<p><button class="btn btn-primary btn-info extended" type="button" data-toggle="collapse" data-target="#collapseLinkTable" aria-expanded="false" aria-controls="collapseLinkTable">
    Связанные объекты
  </button></p>';
echo '<div class="collapse show" id="collapseLinkTable">';
//echo '<div class="container-fluid border-white">';
echo '<div class="card card-body text-white bg-dark border-white">';
if (empty($linkdata)){
    echo '<div class="nodata">Связанные объекты отсутствуют</div>';
} else {
    echo '<div class="text-info">Связанных объектов: '. count($linkdata).'</div>';
    formatLinkTable($linkdata);
}

echo '</div>';
echo '</div>';

// --КОНЕЦ БЛОК СВЯЗАННЫХ ОБЪЕКТОВ
echo '<br>';



//ЗАПРОС НА ДАННЫЕ ДЛЯ КАРТЫ

$jsonquery = <<<JSONQUERY
select json_build_object(
    'type', 'FeatureCollection',
    'features', json_agg(ST_AsGeoJSON(subq.*)::json)
    ) as mainfeatcol
FROM ( 
  SELECT ST_transform(g.the_geom,4326), v.oid, v.uniq_id, v.obj_sub_type, v.obj_name, v.obj_authors, v.obj_year, v.path_cloud
  FROM {$table} as v, temp_geometries as g, geom_links_temp as l
  WHERE l.object_id = v.oid and l.geometry_id = g.id
	and v.oid in ({$currID})
) AS subq;
JSONQUERY;

$jsonquerylinq = <<<JSONQUERYLINQ
select json_build_object(
    'type', 'FeatureCollection',
    'features', json_agg(ST_AsGeoJSON(subq.*)::json)
    ) as linqfeatcol
FROM (
    SELECT ST_transform(g.the_geom,4326), v.oid, v.uniq_id, v.obj_sub_type, v.obj_name, v.obj_authors, v.obj_year, v.path_cloud
  FROM {$table} as v, temp_geometries as g, geom_links_temp as l
  WHERE l.object_id = v.oid and l.geometry_id = g.id
and v.oid in
(
    (
    (SELECT linked_objs.linked_id2 as lid FROM linked_objs
        WHERE linked_objs.object_id = {$currID})
    UNION
    (SELECT linked_objs.object_id as lid FROM linked_objs
        WHERE linked_objs.linked_id2 = {$currID})
    EXCEPT
    (SELECT {$currID} as lid)
	)
	)
ORDER BY v.oid asc) AS subq;
JSONQUERYLINQ;

$jsonrows = SSP::sql_exec_param($dbmy, $jsonquery, null, PDO::FETCH_ASSOC);
$jsonrowslinq = SSP::sql_exec_param($dbmy, $jsonquerylinq, null, PDO::FETCH_ASSOC);
$mainFeatCol = $jsonrows[0]['mainfeatcol'];
$linqFeatCol = $jsonrowslinq[0]['linqfeatcol'];
//var_dump(json_encode($jsonrows));
//var_dump($jsonrows);
//var_dump($jsonrowslinq);
//echo '<br>';
//var_dump($linqFeatCol);


//КОНЕЦ ЗАПРОС НА ДАННЫЕ ДЛЯ КАРТЫ



// --ЗАГАТОВКА ДЛЯ ЛИФЛЕТ
echo '<p><button class="btn btn-primary btn-info extended" type="button" data-toggle="collapse" data-target="#collapseLeafletMap" aria-expanded="false" aria-controls="collapseLeafletMap">
    Картограмма
  </button></p>';
echo '<div class="collapse show" id="collapseLeafletMap">';
//echo '<div class="container-fluid border-white">';
echo '<div class="card card-body text-white bg-dark border-white">';
/*if (empty($linkdata)){
    echo '<div class="nodata">Связанные объекты отсутствуют</div>';
} else {
    echo '<div class="text-info">Связанных объектов: '. count($linkdata).'</div>';
    formatLinkTable($linkdata);
}*/

echo '<div id="cardmap" class="obj-map">';
include  'leaflet_body.php';
echo '</div>';
echo '</div>';
echo '</div>';

// --КОНЕЦ БЛОКА ЗАГАТОВКА ДЛЯ ЛИФЛЕТ

include 'card_footer.php';
?>