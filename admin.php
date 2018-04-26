<?php 
    include_once("includes/config.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <h2>Admin Panel</h2>
  
  <form action="admin.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input id="username" type="username"  class="form-control" id="username" placeholder="Enter username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input id="password" type="password"  class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <div id="success"> </div>
    <button id="LoginBtn"  type="button" class="btn btn-default">Login</button>
  </form>

</div>
<script src="js/script.js"></script>
<script src="Libraries/tinymce/tinymce.min.js"></script>
</body>
</html>
