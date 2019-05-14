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

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: 3b336ea639da23a906596cf684b097cd"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$json = json_decode($response);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  // echo $response;
}
?>
<div class="container">
    <h3>Masukkan Kota Asal</h3>
    <form action="" method="post">
        <input type="text" id="origin" name="origin" placeholder="Kota Asal">
    </form>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        // Data yang ditamilkan pada autocomplete.
        
        var city = [

          <?php
            for ($i = 0; $i < 501; $i++){

              $city_name = $json->rajaongkir->results[$i]->city_name;
              $city_id = $json->rajaongkir->results[$i]->city_id;
              echo "{ value: '" . $city_name ."', data: '" . $city_name ."' },";

            }
          ?>
            
        ];

        // Selector input yang akan menampilkan autocomplete.
        jQuery(function(){

            jQuery('#origin').autocomplete({
                lookup: city
            });

        });
    })
</script> -->
<?php
    echo "
        <table class='mt-3 table table-hover table-bordered'>
        <thead class='thead-dark'>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Provinsi</th>
        </tr>
        </thead>
        <tbody>";

    $results = $json->rajaongkir->results;
    foreach ($results as $result) {
        echo 
        "<tr>
          <td>" . $result->city_id . "</td>
          <td>" . $result->city_name . "</td>
        </tr>";
    }
    echo "
      </tbody>
    </table>";
?>
</body>
</html>