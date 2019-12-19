<?php
/**
 * Created by PhpStorm.
 * User: avahrushev
 * Date: 04.12.2019
 * Time: 12:55
 */
//    echo 'Working!!!';
//require_once( 'ssp.class.pg.php' );
include '../server-side/server_defs.php';
include_once '../server-side/ssp.class.pg.php';

//echo '<head></head>';
//echo '<html>';
include 'card_header.php';
/*print_r($_GET);
print_r($_POST);
if(isset($_GET["oid"])) echo "<br>В ГЕТ передан OID = " . $_GET["oid"] . "." . "<br>ARGC & ARGV выключены.<br>";
echo "Результат вар_дамп: ";
var_dump($_GET["oid"]);
echo '<br>';
echo $table;
echo '<br>';
echo $primaryKey;
echo '<br>';
print_r($columns);
echo '<br>';
print_r($sql_details);*/
//echo '</html>';
//echo '<br>';
$dbmy = SSP::sql_connect($sql_details);
//print_r($dbmy);
//echo '<br>';
$dbdb = SSP::db($sql_details);
//print_r($dbdb);
//echo '<br>';
/*foreach ($columns as $elem) {
    foreach ($elem as $key => $value)
        {
            echo "{$key} = {$value}<br>";
        }
    };
//echo $columns[0]['title'];*/
//echo '<br>';
if(isset($_GET["oid"])) {
    $currID = $_GET["oid"];
    }
    else {
    echo "<br>В ГЕТ не передан OID<br>";
        }

$myquery = "SELECT * FROM ". $table. " WHERE oid=" . $_GET["oid"];
//echo 'Выполнен запрос '. $myquery;
//echo '<br>';
$resrow = SSP::sql_exec($dbmy, $myquery);
//var_dump($resrow);
//echo '<br>';
$mydata = SSP::data_output($columns, $resrow);
//var_dump($mydata);
//echo '<br>';echo '<br>';echo '<br>';
//echo $mydata[0]["path_cloud"];
//echo '<br>';echo '<br>';echo '<br>';

// --НАЧАЛО БЛОК КАРТОЧКИ ОБЪЕКТА
echo '<p><button class="btn btn-primary btn-info" type="button" data-toggle="collapse" data-target="#collapseCardTable" aria-expanded="false" aria-controls="collapseCardTable">
    Карточка объекта
  </button></p>';
echo '<div class="collapse show" id="collapseCardTable">';
echo '<div class="card card-body text-white bg-dark border-white">';
echo '<table class="card-table table-dark table-responsive-md compact rounded table-striped table-bordered text-md-center rounded">';
echo '<thead><tr class="table-secondary" style="color: black"><th height="50px">Наименование</th><th>Информация</th></tr></thead>';
$field_index = 0;
foreach($mydata[0] as $key => $value)
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
echo '</table></div></div>';

// --КОНЕЦ БЛОК КАРТОЧКИ ОБЪЕКТА

echo '<br>';

echo '<p><button class="btn btn-primary btn-info" type="button" data-toggle="collapse" data-target="#collapseCardColumns" aria-expanded="false" aria-controls="collapseCardColumns">
    Картотека объекта
  </button></p>';
echo '<div class="collapse" id="collapseCardColumns">';
//echo '<div class="col-md-auto">';
echo '<div class="card-columns border rounded">';

$field_index = 0;
foreach($mydata[0] as $key => $value)
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

/*echo '<div class="card bg-dark text-white border-light text-center">
    <h6 class="card-header bg-info">Header</h6>
    <div class="card-body">
      <h4 class="card-title">Card title that wraps to a new line</h4>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
  </div>';*/

echo '</div></div>';
//echo '</div>';
/*
 SELECT * FROM view_final_3
  WHERE view_final_3.oid IN
  (SELECT linked_objs.linked_id2
           FROM linked_objs where linked_objs.object_id =6497);
 */

//Отладка связанного подзапроса

$linkquery = "SELECT * FROM ". $table. " WHERE " . $table. ".oid IN " .
                "(SELECT linked_objs.linked_id2 FROM linked_objs " .
                    "WHERE linked_objs.object_id = " . $currID ." \n" .
                  "UNION\n" .
                  "SELECT linked_objs.object_id FROM linked_objs " .
                    "WHERE linked_objs.linked_id2 = " . $currID ." \n" .
                  "EXCEPT\n" .
                  "SELECT " . $currID .
                ");";

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

echo 'Запрос на связи: ' . $linkquery;
echo '<br>';
echo '<br>';
echo '<br>';
echo 'Запрос на связи1: ' . $linkquery1;
//var_dump($linkquery);
echo '<br>';
echo '<br>';
echo '<br>';
$linkrows = SSP::sql_exec($dbmy, $linkquery1);
var_dump($linkrows);
echo '<br>';
echo '<br>';
echo '<br>';
$linkdata = SSP::data_output($columns, $linkrows);
var_dump($linkdata);
echo '<br>';echo '<br>';echo '<br>';

// Конец блока отладки связанного подзапроса


// --НАЧАЛО БЛОК СВЯЗАННЫХ ОБЪЕКТОВ

function formatLinkTable($data, $showcols = array(0,1,11,12,16,20,19,27,44)){
    global $columns;
    $collen = count($showcols);
    echo '<table class="link-table table-dark table-responsive-xl compact rounded table-striped table-bordered text-md-center rounded">';
    echo '<thead>';
    echo '<tr class="table-secondary" style="color: black">';
    echo '<th height="50px" style="min-width: 50px;"><i class="fas fa-info-circle fa-1x info-header"></i></th>';
    foreach($showcols as $curcolind) {
        $field_name = $columns[$curcolind]['title'];
        echo "<th>{$field_name}</th>";
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    foreach ($data as $datarow){
        $item_oid = $datarow['oid'];
        $res_td = '<a href="test.php?oid=' . $item_oid . '" target="_blank"><i class="fas fa-scroll fa-lg show-card" title="Перейти к карточке ОУ."></i></a>';
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
}

echo '<p><button class="btn btn-primary btn-info" type="button" data-toggle="collapse" data-target="#collapseLinkTable" aria-expanded="false" aria-controls="collapseLinkTable">
    Связанные объекты
  </button></p>';
echo '<div class="collapse show" id="collapseLinkTable">';
echo '<div class="card card-body text-white bg-dark border-white">';
if (empty($linkdata)){
    echo '<div class="nodata">Связанные объекты отсутствуют</div>';
} else {
    echo '<div class="text-info">Связанных объектов: '. count($linkdata).'</div>';
    formatLinkTable($linkdata);
}

/*echo '<table class="card-links table-dark table-responsive-md compact rounded table-striped table-bordered text-md-center rounded">';
echo '<thead><tr class="table-secondary" style="color: black"><th height="50px"><i class="fas fa-info-circle fa-1x info-header"></i></th><th>Информация</th></tr></thead>';
$field_index = 0;
foreach($mydata[0] as $key => $value)
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
echo '</table></div></div>';*/
echo '</div></div>';

// --КОНЕЦ БЛОК СВЯЗАННЫХ ОБЪЕКТОВ


include 'card_footer.php';
?>