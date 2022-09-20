<?php

session_start();
if (isset($_SESSION["loggedin"])) {
  header("Location:index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/login_style.css">
</head>

<body>
  <div class="container">
    <div class="card my-5">
      <div class="card-body">
        <div class="row">
          <div class="col-12 col-md-6">
            <img src="assets/images/hz.jpg" class="img-fluid">
          </div>
          <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
            <form method="POST" class="w-75" action="functions/functions.php">
              <h4 class="fw-bold text-center">Log In</h4>
              <?php
              if(isset($_GET["error"])){
              ?>
              <div class="alert alert-danger text-center" role="alert">
                <?php
                $error = $_GET["error"];
                echo $error;
                ?>
              </div>
              <?php
              }
              ?>
              <div class="form_input mb-3">
                <input type="text" name="username" class="form-control" id="exampleDropdownFormEmail1" placeholder="Username" required>
              </div>
              <div class="form_input mb-3">
                <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password" required>
              </div>
              <input type="submit" name="login" value="LOGIN" class="btn btn-primary w-100" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>

</html>