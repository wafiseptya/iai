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

if ($key == 'actor' || $key == 'film' || $key == 'category'){
    
    if ($key == 'actor'){
        $sql = "SELECT * FROM actor";
        
    } else if ($key == 'film') {
        $sql = "SELECT * FROM film";
        
    } else if ($key == 'category') {
        $sql = "SELECT * FROM category";
    
    }
    
    $result = $conn->query($sql);
    
    
    $rows = array();
    $rows["result"] = "success";
    
    $rows["data"] = array();
    
    while($r = mysqli_fetch_assoc($result)) {
        $row = $r;
     
        array_push($rows["data"], $row);
    }
}else {
    $rows["result"] = "tabel tidak diketahui";
    $rows["data"]=null;
}

$rows = json_encode($rows);
print_r($rows);