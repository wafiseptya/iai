<?php
    $curl = curl_init();
    curl_setopt_array ($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://10.33.34.121/cek.php',
		CURLOPT_POST => 1,

    ]);
    $cek = curl_exec($curl);
    curl_close($curl);

    $array = json_decode($cek);
    
    // echo $array;

    echo $cek;