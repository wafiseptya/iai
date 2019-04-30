<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
</head>
<?php
$url = "http://10.33.34.121/weather.xml";
// $sUrl = file_get_contents($url, false);
// $xml = simplexml_load_string($sUrl);

$xml = simplexml_load_file($url);
// $xml = simplexml_load_file("weather.xml");

// echo $xml->channel->item->title;
echo "<br>";
// echo $xml->channel->item->pubDate;
echo "<br>";
echo $xml->channel->item->description;
echo "<hr>";
$namespace = $xml->channel->getNamespaces(true);
$loc = $xml->channel->children($namespace['yweather']);
$location = $loc->location->attributes();
$wind = $loc->wind->attributes();
$atmosphere = $loc->atmosphere->attributes();
$astronomy = $loc->astronomy->attributes();
$units = $loc->units->attributes();
$namespace = $xml->channel->item->getNamespaces(true);
$f = $xml->channel->item->children($namespace['yweather']);

?>
<table id="myTable" class="table table-bordered table-striped">
<thead>
    <th>Tanggal</th>
    <th>Suhu Maksimal</th>
    <th>Suhu Minimal</th>
    <th>Cuaca</th>
</thead>
<tbody>
<?php

for ($i=0; $i<10; $i++){
    $cuaca = $f->forecast[$i]->attributes();
    echo "<tr>";
        echo "<td>".$cuaca['day'].", ".$cuaca['date']."</td>";
        echo "<td>".$cuaca['high']."&deg{$units->temperature}</td>";
        echo "<td>".$cuaca['low']."&deg{$units->temperature}</td>";
        echo "<td>".$cuaca['text']."</td>";
    // foreach ($forecast as $key => $value){
    //     echo $key . " : " . $value . "<br>";
    // }

    echo "</tr>";

}

// foreach ($fore as $key => $value){
//     echo $key . " : " . $value . "<br>";
// }
echo "</tbody></table>";
echo "<br>";
?>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>