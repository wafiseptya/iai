<?php

$nama = $_POST['nama'];
$id = $_POST['id_user'];

$post = [
    'nama' => $nama,
    'id_user' => $id,
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://10.33.34.121/create_header.php");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'token: mBoE5lemo1FpuX6yw37uigkf42wnDN3vHfpWWiMSA4UU1V4m3Q',
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);

curl_close ($ch);

?>
<script src="jquery-3.3.1.min.js"></script>

<script>

$(function(){
    window.location.replace("http://10.33.34.121/cek.php");
});

</script>