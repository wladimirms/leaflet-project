<?php
    $dsn = "pgsql:host=192.168.44.217; dbname=TOP;port=5432";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    $pdo = new PDO($dsn, 'pguser', '123456', $opt);

    $result = $pdo->query("SELECT *, ST_AsGeoJSON(geom, 5) AS geojson FROM lol");
    echo var_dump($result);
    foreach ($result AS $row) {
        unset($roe['geom']);
        $geometry=$row['geom']=json_decode($row['geojson']);
        unset($row['geojson']);
        $feature=["type"=>"feature", "geometry"=>$geometry, "properties"=>$row];
        array_push($features, $feature);
    }
    $featureCollection=["type"=>"FeatureCollection", "features"=>$features];
    echo  json_encode($featureCollection);

?>