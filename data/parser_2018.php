<?php
$dsn = "pgsql:host=192.168.1.70;dbname=msb;port=5432";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
$pdo = new PDO($dsn, 'pguser', '123456', $opt);

$showtype = $_GET['type'] ?? '';

switch ($showtype) {
    case 'service':
        $tables = [
            'grrpolygon2018' => [
                'table' => 'grractive_2018',
                'parser' => 'service-autocomplete'
            ],
        ];
        break;
    default:
        $tables = [
          /*  'grrpolygon2017' => [
                'table' => 'grractive_2017',
                'parser' => 'default'
            ],
            'popupCentroids2017' => [
                'table' => 'grractive_centroid_2017',
                'parser' => 'default'
            ],*/
            'grrpolygon2018' => [
                'table' => 'grractive_2018',
                'parser' => 'default'
            ],
            'popupCentroids2018' => [
                'table' => 'grractive_centroid_2018',
                'parser' => 'default'
            ],

        ];
        break;
}

foreach ($tables as $jsVar => $pgsTable) {
    $result = $pdo->query("SELECT *, ST_AsGeoJSON(geom, 5) AS geojson FROM {$pgsTable['table']}");
    switch ($pgsTable['parser']) {
        case 'custom-parser':
            // Something custom
            break;
        case 'service-autocomplete':
            $features = [];
            foreach ($result AS $row) {
                unset($row['geom']);
                $geometry = $row['geojson'] = json_decode($row['geojson']);
                unset($row['geojson']);
                $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
                $newProp = [];
                $newProp['popupContent'] = $feature['properties']['name'];
                $newProp['title'] = $feature['properties']['name'];
                $newProp['description'] = $feature['properties']['subject'];
                $newProp['iamge'] = "polygon.png";
                $feature['properties'] = $newProp;
                $feature['geometry']->type = 'Polygon';
                $feature['geometry']->coordinates[0] = $feature['geometry']->coordinates[0][0];
                //print_r($newProp);
                //print_r($feature);
                //exit;
                array_push($features, $feature);

            }
            $featureCollection = ["type" => "FeatureCollection", "features" => $features];
            break;
            break;
        default:
            $features = [];
            foreach ($result AS $row) {
                unset($row['geom']);
                $geometry = $row['geojson'] = json_decode($row['geojson']);
                unset($row['geojson']);
                $feature = ["type" => "Feature", "geometry" => $geometry, "properties" => $row];
                //echo json_encode($feature)."<br><br>";
                array_push($features, $feature);

            }
            $featureCollection = ["type" => "FeatureCollection", "features" => $features];
            break;
    }
    switch ($showtype) {
        case 'service':
            header('Content-Type: application/json');
            echo json_encode($featureCollection);
            break;
        default:
            echo 'var ' . $jsVar . ' = ' . json_encode($featureCollection) . ';';
            break;

    }
}

exit;