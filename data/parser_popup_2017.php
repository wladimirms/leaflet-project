<?php
    $dsn = "pgsql:host=192.168.44.217; dbname=msb;port=5432";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO($dsn, 'pguser', '123456', $opt);

    $result = $pdo->query("SELECT *, ST_AsGeoJSON(geom, 5) AS geojson FROM grractive_centroid_2017");
    $features = [];
    foreach ($result AS $row) {
        unset($row['geom']);
        $geometry=$row['geojson']=json_decode($row['geojson']);
        unset($row['geojson']);
        $feature=["type"=>"Feature", "geometry"=>$geometry, "properties"=>$row];
        //echo json_encode($feature)."<br><br>";
        array_push($features, $feature);
    }
    $featureCollection = ["type"=>"FeatureCollection", "features"=>$features];
    //$featureCollectionEncode = iconv('UTF-8', 'UTF-8//IGNORE', $featureCollection);
    echo json_encode($featureCollection);
?>