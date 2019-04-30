<html>
<head>
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</head>
<body>
<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://10.33.34.121/server.php",
  CURLOPT_RETURNTRANSFER => true
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// print_r($response);
$json = json_decode($response);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  
  echo "<table class='table'>
    <thead class='thead-dark'>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
      </tr>
    </thead>
    <tbody>";
    foreach ($json as $data) {
      echo "<tr><td>" . $data->first_name . "</td>";
      echo "<td>" . $data->last_name . "</td></tr>";
    }
    echo "</tbody></table>";
}
