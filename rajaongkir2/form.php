<html>
<head>
    <script src="jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</head>
<body>
  <form method="POST" action="http://10.33.34.121/push.php">
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter First Name">
    </div>
    
    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</body>
</html>
