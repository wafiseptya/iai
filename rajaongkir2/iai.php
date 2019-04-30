<?php
    $curl = curl_init();
    curl_setopt_array ($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://10.33.34.121/read.php',
		CURLOPT_POST => 1,
		
		
		
    ]);
    $result = curl_exec($curl);
    curl_close($curl);

    $result =json_decode($result);
?>


<form action ="http://10.33.34.121/create.php" method ="post">
<input type ="text" placeholder="nama" name ="nama"> </input>
<input type ="text" placeholder="nim" name ="nim"> </input>
<input type ="password" placeholder="password" name="password"> </input>
<button type ="submit" value ="submit" >SUBMIT </button>
</form>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
	<div class="container">
	<table class="table">
	  <thead>
		<tr>
		  <th scope="col">nama</th>
		  <th scope="col">nim</th>
          <th scope="col">action</th>

		</tr>
	  </thead>
	  <tbody>
			<?php foreach ($result as $r){
				echo '	
				
					<tr>

					  <td>'.$r->nama.'</td>
            <td>'.$r->nim.'</td>

            <td> <a href ="http://10.33.34.121/client_delete.php?nim='.$r->nim.'">hapus</td>
            </tr>
			  ';
			}
			?>
	  </tbody>
	</table>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>