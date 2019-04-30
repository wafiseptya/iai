<?php

  @$key = $_GET['key'];
  if ($key != '1234'){
    exit();
  }

$servername = "localhost";
$username = "root";
$password = "";
$database = "indonesia";

// create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// check connection
if (!$conn){
  die("connection failed : ".mysqli_connect_error());
}
// echo "Connected Successfully";

$sql = 
"SELECT b.id, b.name villages, a.name districts 
FROM districts
a JOIN villages 
b ON district_id = a.id
WHERE a.id = 1210030";
// "SELECT b.id, b.name districts, a.name regency 
// FROM regencies
// a JOIN districts 
// b ON regency_id = a.id
// WHERE a.id = 1210";
// "SELECT b.id, b.name regency, a.name provinsi 
// FROM provinces
// a JOIN regencies 
// b ON province_id = a.id
// WHERE a.id = 35";
$result = $conn->query($sql);

// print_r($result);

$rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows[] = $r;
}

// print_r($rows)
$rows = json_encode($rows);
print_r($rows);