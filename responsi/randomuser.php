<head>
    <title>Responsi RandomUser</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<?php

$getVal = "";

if (empty($_GET)) {

} else if (count($_GET) === 1 && isset($_GET["gender"])) {
    $getVal = "results=10&gender=".$_GET["gender"];
    //nomor 3 dimana jika hanya ada satu get parameter berupa gender maka result yang ditampilkan sejumlah 10
}else {
    //nomor 2 dimana jika ada get parameter multiple, bisa berupa results dengan jumlah yang ditentukan(custom)
    // maupun parameter lain dalam api sepertin gender, nationality, password, dll
    foreach ($_GET as $key => $value) {
        $getVal = $getVal . $key."=".$value."&";
    }

}



$curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://randomuser.me/api?$getVal",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  $json = json_decode($response);
?>
<div class="container">
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Picture</th>
      <th scope="col">Full Name</th>
      <th scope="col">Address</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

  <?php
  $no = 1;
  $results = $json->results;
  foreach ($results as $data) {
    echo  "
        <tr>
            <th>".$no."</th>
            <td><img src=' ". $data->picture->large ."'></td>
            <td>". $data->name->title ." ". $data->name->first ." ". $data->name->last ."</td>
            <td>". $data->location->street ." ". $data->location->city ." ". $data->location->state ."</td>
            <td>". $data->email ."</td>
        </tr>
    ";
  $no++;
  }
  
    
    echo "</tbody>
   </table></div>"
  


?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>