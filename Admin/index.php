<?php
  session_start();

  if(!isset($_SESSION['Username'])){
    header('location:../login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/504a87cc72.js" crossorigin="anonymous"></script>
    <title>Pharmacy</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="row ">
            <div class="col-md-4 col-sm-12 col-12 text-left ">
                <h2 class="my-md-3 site-title">.</h2>
            </div>
            <div class="col-md-4 col-sm-12 col-12 text-center text-white">
                <h2 class="my-md-3 site-title">E-Pharma</h2>
            </div>
            <div class="col-md-4 col-12 text-right ">
                <div class="btn-group">
                <a href="../logout.php" Type="submit" class="btn border  my-md-4 my-2 header-links text-white" >Logout</a>
                </div>
            </div>
            </div>
        </div>
      <div class="sidebar" style="text-decoration:none;">
        <div class="sidebar-j">
            <a class="active" href="index.php">Home</a>
            <a href="med.php">Medicine</a>
            <a href="health.php">Healthcare Products</a>
            <a href="add_user_admin.php">Users</a>
        </div>
      </div>
      
    </header> 
    <div class="content">
        <div class="container-fluid " id="carr">
            <h2 style="padding:20px;">Welcome Admin <?php echo $_SESSION['Username'];?> !</h2>
        </div>
    </div> 


</body>
</html>