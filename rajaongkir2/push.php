<?php

  @$key = $_GET['table'];
  

$servername = "localhost";
$username = "root";
$password = "";
$database = "iai";

// create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// check connection
if (!$conn){
  die("connection failed : ".mysqli_connect_error());
}

if(!empty($_POST["first_name"]) && !empty($_POST["last_name"])){
  $first_name = $_POST["first_name"];
  $last_name = $_POST["last_name"];

  $sql = "INSERT INTO actor (first_name, last_name) VALUES ('$firt_name', 'last_name');";
  if ($conn->query($sql) === TRUE) {
    echo "sukses";
  }else {
    echo "Error : " . $sql . "<br>" . $conn->error;
  }
}else {
  echo "first_name dan last_name harus diisi";
}

mysql_close($conn);