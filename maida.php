<?php 
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://10.33.89.143?key=1234'
  ]);
  $result = curl_exec($curl);
  curl_close($curl);

  print_r($result);