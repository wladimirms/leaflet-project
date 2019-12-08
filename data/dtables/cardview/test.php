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


include 'card_footer.php';
?>