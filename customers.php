<?php

session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location:login.php");
}

include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Dashboard</title>


</head>

<body>
    <div class="row min-vh-100 g-0">

        <?php include("content/navbar.php") ?>

        <div class="col-lg-10 wrapper">

            <div class="card custom-card-2">
                <div class="card-body p-3 d-flex align-items-center justify-content-between">
                    <h5 class="mb-0 fw-bold">CUSTOMERS</h5>
                    <a href="add_customers.php" class="btn btn-success">Add Customers</a>
                </div>
            </div>
            <div class="card custom-card-2 mt-3">
            <div class="card-body p-3">
            <div class="row">

            <?php
            
            $sql = "select * from tbl_customers";
            $run = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($run)){

              $id = $row["id"];
              $image = $row["image"];
              $brand_name = $row["brand_name"];
            
            ?>

              <div class="col-md-3">
                <div class="card">
                  <div class="card-body p-2 text-center">
                    <img src="assets/images/customers/<?php echo $image ?>" class="img-fluid">
                    <h4 class="fw-bold"><?php echo $brand_name ?></h4>

                    <form method="post" action="functions/functions.php" class="form1" style="margin-left:120px; ">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                      <button type="submit" name="delete_customers" class="btn btn-danger ml-5">Delete</button>
                    </form>
                    </div>
                    <br>
                    <form method="post" action="editcustomers.php" style="margin-top:-64px; margin-left:40px; margin-bottom: 30px;">
                      <input type="hidden" name="id" value="<?php echo $id ?>">
                      <button type="submit" name="update_customers" class="btn btn-danger mr-5">Update</button>
                    </form>
                  </div>
                </div>
              

                <?php } ?>

                </div>
              </div>
            </div>
        </div>

        </div>
    </div>
</body>

</html>