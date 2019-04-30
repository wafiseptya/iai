<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
</head>
<?php
$url = "http://10.33.34.121/cuaca.xml";
// $sUrl = file_get_contents($url, false);
// $xml = simplexml_load_string($sUrl);

$xml = simplexml_load_file($url);
// $xml = simplexml_load_file("weather.xml");

echo $xml->location->name;
echo "<br>";
// echo $xml->channel->item->pubDate;
// echo "<br>";
// echo $xml->channel->item->description;
// echo "<hr>";
// $namespace = $xml->channel->getNamespaces(true);
// $loc = $xml->channel->children($namespace['yweather']);
// $location = $loc->location->attributes();
// $wind = $loc->wind->attributes();
// $atmosphere = $loc->atmosphere->attributes();
// $astronomy = $loc->astronomy->attributes();
// $units = $loc->units->attributes();
// $namespace = $xml->forecast->getNamespaces(true);
// $f = $xml->forecast->children($namespace['yweather']);

?>
<table id="myTable" class="table table-bordered table-striped" width="70%">
<thead>
    <th>Tanggal</th>
    <th>Suhu Maksimal</th>
    <th>Suhu Minimal</th>
    <th>Cuaca</th>
</thead>
<tbody>
<?php

for ($i=0; $i<10; $i++){
    $time = $xml->forecast->time[$i]->attributes();
    $temp = $xml->forecast->time[$i]->temperature->attributes();
    $cuaca = $xml->forecast->time[$i]->clouds->attributes();
    
    echo "<tr>";
        echo "<td>".$time['from']." - ".$time['to']."</td>";
        echo "<td>".$temp['max']." ".$temp['unit']."</td>";
        echo "<td>".$temp['min']." ".$temp['unit']."</td>";
        echo "<td>".$cuaca['value']."</td>";
    // foreach ($forecast as $key => $value){
    //     echo $key . " : " . $value . "<br>";
    // }

    echo "</tr>";

}

echo "</tbody></table>";
echo "<br>";
?>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
