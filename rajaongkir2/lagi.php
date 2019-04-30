<?php
    $curl = curl_init();
    curl_setopt_array ($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://10.33.34.121/token.php',
		CURLOPT_POST => 1,
        
    ]);
    $result = curl_exec($curl);
    curl_close($curl);

    $curl = curl_init();
    curl_setopt_array ($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://10.33.34.121/cek.php',
		CURLOPT_POST => 1,

    ]);
    $cek = curl_exec($curl);
    curl_close($curl);

    $array = json_decode($cek);
    
    // echo $result;
    print_r($result);
?>
<html>
<head>
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <!-- <script>
        $(function(){
            $.ajaxSetup({
                headers: {
                    'token': 'mBoE5lemo1FpuX6yw37uigkf42wnDN3vHfpWWiMSA4UU1V4m3Q'
                }
            });
            
            $('#form').submit(function(event){
                event.preventDefault();
                var post_data = $(this).serialize();
                var url = $(this).attr('action');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: post_data,
                    dataType: 'json',
                    success:function(data){
                        location.reload(true);
                    }
                });
            });
        });
    </script> -->
    <style>
        html {
            padding: 2em;
        }
    </style>
</head>
<body>
  <form id="form" method="POST" action="/iai/rajaongkir2/cont.php">
    <div class="form-group">
      <label for="id_user">User ID</label>
      <input name="id_user" type="text" class="form-control" id="id_user" placeholder="Enter User ID">
    </div>
    
    <div class="form-group">
      <label for="nama">Name</label>
      <input name="nama" type="text" class="form-control" id="nama" placeholder="Enter Name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

    <?php
        // print_r($cek);
        echo "User ID : " . $array->id_user;
        echo "<br>Nama : " . $array->nama;
        echo "<br>Token : " . $array->token;
        echo "<br>IP : " . $array->ip;
        echo "<br>Time : " . $array->timestamp;
        echo "<br>Header : " . $array->header;
    ?>

</body>
</html>
