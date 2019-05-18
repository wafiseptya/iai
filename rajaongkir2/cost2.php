<head>
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="main.js"></script> -->
</head>
<body>
<div class="container pt-5">
    <h2>Lokasi Asal</h2>
<?php

    if(isset($_GET['province_id']))
    {
        $province_id = $_GET["province_id"];
    }
    if(isset($_GET['city_id']))
    {
        $city_id = $_GET["city_id"];
    }

    if(isset($_GET['province_id2']))
    {
        $province_id2 = $_GET["province_id2"];
    }
    if(isset($_GET['city_id2']))
    {
        $city_id2 = $_GET["city_id2"];
    }

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
    echo "<form method='get' class='mb-3' id='search' action=''>
          <div class='form-group mb-3'>
          <label for='province_1' class='mr-3'>Provinsi</label>
          <select name='province_1' class='custom-select' id='province_1'>";
    if(isset($_GET['province_id'])){

        for ($i=0; $i<35; $i++){
            if ($json->rajaongkir->results[$i]->province_id == $province_id) {

                echo "<option value='".$json->rajaongkir->results[$i]->province_id."' selected>".$json->rajaongkir->results[$i]->province."</option>";
            }else {
                echo "<option value='".$json->rajaongkir->results[$i]->province_id."'>".$json->rajaongkir->results[$i]->province."</option>";
            }
          }
          echo "</select>
          </div>";

    }else {
        for ($i=0; $i<35; $i++){
          echo "<option value='".$json->rajaongkir->results[$i]->province_id."'>".$json->rajaongkir->results[$i]->province."</option>";
        }
        echo "</select>
        </div>";
    }

  
    if(isset($_GET['province_id']))
    {

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id",
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

    $responses = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // echo $responses;

    $jsonx = json_decode($responses);

    echo "<form method='get' class='mb-3' id='search' action=''>
        <div class='form-group mb-3'>
        <label for='city_1' class='mr-3'>Kota</label>
        <select name='city_1' class='custom-select' id='city_1'>";
    $arr = $jsonx->rajaongkir->results;
        foreach ($arr as $r) {
            if ($r->city_id == $city_id) {
                echo "<option value='".$r->city_id."' selected>".$r->city_name."</option>";
            } else {
                echo "<option value='".$r->city_id."'>".$r->city_name."</option>";
            }
            
    }
    echo "</select>
    </div>";
        
    }
}
?>

<h2>Lokasi Tujuan</h2>
<?php

if(isset($_GET['province_id2']))
{
      $province_id2 = $_GET["province_id2"];
      // $id = $_POST['province_id'];
  }
  // $id = $_COOKIE["province_id"];
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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

  $response2 = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  $json2 = json_decode($response2);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo "<form method='get' class='mb-3' id='search' action=''>
          <div class='form-group mb-3'>
          <label for='province_2' class='mr-3'>Provinsi</label>
          <select name='province_2' class='custom-select' id='province_2'>";
    if(isset($_GET['province_id2'])){

        for ($i=0; $i<35; $i++){
            if ($json2->rajaongkir->results[$i]->province_id == $province_id2) {

                echo "<option value='".$json2->rajaongkir->results[$i]->province_id."' selected>".$json->rajaongkir->results[$i]->province."</option>";
            }else {
                echo "<option value='".$json2->rajaongkir->results[$i]->province_id."'>".$json->rajaongkir->results[$i]->province."</option>";
            }
          }
          echo "</select>
          </div>";

    }else {
        for ($i=0; $i<35; $i++){
          echo "<option value='".$json2->rajaongkir->results[$i]->province_id."'>".$json->rajaongkir->results[$i]->province."</option>";
        }
        echo "</select>
        </div>";
    }

  
    if(isset($_GET['province_id2']))
    {

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$province_id2",
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

    $response3 = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    // echo $responses;

    $json3 = json_decode($response3);

    echo "<form method='get' class='mb-3' id='search' action=''>
        <div class='form-group mb-3'>
        <label for='city_2' class='mr-3'>Kota</label>
        <select name='city_2' class='custom-select' id='city_2'>";
    $arr = $json3->rajaongkir->results;
        foreach ($arr as $r) {
            if ($r->city_id == $city_id2) {
                echo "<option value='".$r->city_id."' selected>".$r->city_name."</option>";
            } else {
                echo "<option value='".$r->city_id."'>".$r->city_name."</option>";
            }
    }
    echo "</select>
    </div>";
        
    }
}
?>

<form id="proses" action="http://localhost/iai/rajaongkir2/cost2.php" method="POST">
  <div class="form-group">
    <label for="weight" style="font-weight:500; font-size: 1.5em">Weight(KG)</label>
    <input type="number" class="form-control" id="weight" aria-describedby="emailHelp" placeholder="Enter Weight">
  </div>
  <div class="form-group">
    <label for="kurir" style="font-weight:500; font-size: 1.5em">Pilih Kurir</label>
    <select class="form-control" id="kurir">
      <option value="jne">JNE</option>
      <option value="pos">POS</option>
      <option value="tiki">TIKI</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
<script>
  $(document).ready(function() {
    // alert("test");
    $('#province_1').on('change', function() {
      var province=$('#province_1').val();
      // alert(model);
      // $.get("http://localhost/iai/rajaongkir2/province.php", { "id": model } );
      window.location.href = "http://localhost/iai/rajaongkir2/cost2.php?province_id=" + province;
      // document.cookie = 'province_id=' + model+"; path=/";
    });
    $('#city_1').on('change', function() {
      var city=$('#city_1').val();
      var province=$('#province_1').val();
      window.location.href = "http://localhost/iai/rajaongkir2/cost2.php?province_id=" + province + "&city_id=" + city;
      
    });

    $('#province_2').on('change', function() {
      var city1=$('#city_1').val();
      var province1=$('#province_1').val();
      var province2=$('#province_2').val();
      window.location.href = "http://localhost/iai/rajaongkir2/cost2.php?province_id=" + province1 + "&city_id=" + city1 + "&province_id2=" + province2;
    });
    $('#city_2').on('change', function() {
      var city2=$('#city_2').val();
      var city1=$('#city_1').val();
      var province1=$('#province_1').val();
      var province2=$('#province_2').val();
      window.location.href = "http://localhost/iai/rajaongkir2/cost2.php?province_id=" + province1 + "&city_id=" + city1 + "&province_id2=" + province2 + "&city_id2=" + city2;
      
    });
    // $("#proses").on("submit", function(e){
    //     e.preventDefault();
    //     return false;
    //     window.location.href = 
    // })

  })
</script>