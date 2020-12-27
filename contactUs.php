<?php
  session_start();
  include('connection.php');
  
  $db="pharmacy";
  
  mysqli_select_db($con,$db);

  if(!isset($_SESSION['Username'])){
    header('location:login.php');
  }
  if(isset($_POST['name'])){
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $mess=$_POST['message'];
    $reg="insert into contactus(name,mail,message) values ('$name','$mail','$mess')";
    mysqli_query($con,$reg);

}
  

    
  

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmacy Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css file-->
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="Css/cart.css">
    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--font Awesome-->
    <script src="https://kit.fontawesome.com/504a87cc72.js" crossorigin="anonymous"></script>
    <!--Slick-slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


  </head>

  <body>
    <!-- header-->
    <header >
      <div class="container ">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-12 text-left ">
            <!--<h2 class="my-md-3 site-title">logo</h2>-->
          </div>
          <div class="col-md-4 col-sm-12 col-12 text-center text-white">
            <h2 class="my-md-3 site-title">E-Pharma</h2>
          </div>
          <div class="col-md-4 col-12 text-right ">
            <div class="btn-group">
                <a href="logout.php" Type="submit" class="btn border  my-md-4 my-2 header-links text-white" >Logout</a>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid p-0 ">
        <nav class="navbar navbar-expand-lg  navbar-light bg-light">
      
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="medicine.php">Medicine</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="healthcare.php">Healthcare products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactUs.php">Contact Us</a>
              </li>
              
            </ul>
          </div>
          <div class="navbar-nav  active">
            <a href="#" class="nav-item border   cart-plus">
              <i class="fas fa-cart-plus px-10"></i>
            </a>
          </div>
        </nav>
      </div>
    </header>
    <!--main-->
    <main>
    <div class="container-fluid col-md-6">
    <form method="get" action="contactUs.php">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div >
            <button type="submit" class="btn btn-primary" >Send</button>
        </div>
        
    </form>
    
    </div>

     
    </main> 
    <!--main-->
    <!--Footer-->
    <footer></footer>   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/main.js" async defer></script>
  </body>
</html>
