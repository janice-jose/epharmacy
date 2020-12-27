<?php
  session_start();

  if(!isset($_SESSION['Username'])){
    header('location:login.php');
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
    <!--Bootstrap cdn-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--font Awesome-->
    <script src="https://kit.fontawesome.com/504a87cc72.js" crossorigin="anonymous"></script>
    <!--Slick-slider-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <style type="text/css">
      .jumbotron{
        background-image:url('C:/xampp/htdocs/Pharmacy Website/Frontend/images/order now.jpg');
        background-repeat:no-repeat;
        background-size:cover;
        color:white;
        }
    </style>

  </head>

  <body>
    <!-- header-->
    <header >
      <div class="container ">
        <div class="row">
          <div class="col-md-4 col-sm-12 col-12 text-left ">
            <h2 class="my-md-3 site-title">.</h2>
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
        <nav class="navbar navbar-expand-lg  navbar-light bg-light ">
      
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
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
          <div class="navbar-nav">
            <a href="bill.php" class="nav-item border   cart-plus">
              <i class="fas fa-cart-plus px-10"></i>
            </a>
          </div>
        </nav>
      </div>
    </header>
    <!--main-->
    <main>
      <!--first-slider-->
      <div class="container-fluid " id="carr">
        <h2 >Welcome <?php echo $_SESSION['Username'];?> !</h2>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/Slider-3-banner-3.jpg" class="d-block w-100 h-50" alt="Banner-3">
            </div>
            <div class="carousel-item">
              <img src="images/Slider-4-banner-4.PNG" class="d-block w-100 h-50" alt="Banner-2">
            </div>
            <div class="carousel-item">
              <img src="images/Slider-1-banner-1.jpg" class="d-block w-100 h-50" alt="Banner-1">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <!--first-slider-->
      <!--Jumbotron-->
      <div class="container" id="jumbo">
        <div class="row px-mx-4">
            <div class="jumbotron col-md-5 order bg-cover" style="background-image:url('images/order now.jpg')">
              
              <p><a class="btn btn-primary btn-lg" href="medicine.php" role="button">Order now</a></p>
            </div>
            <div class="jumbotron col-md-5 order bg-cover"style="background-image:url('images/healthcare.jpg')">

              <p><a class="btn btn-primary btn-lg" href="#" role="button">Order now</a></p>
            </div>
        </div>
      </div>
      <!--jumbotron-->

      <!--sec-slider-->
      <div class="container-fluid ">
        <div class="site-slider-two px-md-4">
          <h3 class="sec-slider">Categories</h3>
          <div class="row slider-two text-center">
            <div class="col-md-2 product pt-md-5 pt-4">
                 <img src="images/skincare.png" alt="skincare">
                 <a class="btn btn-primary" href="#" role="button">Skincare</a>
            </div>
            <div class="col-md-2 product pt-md-5 pt-4">
              <img src="images/baby care.jpg" alt="baby">
              <a class="btn btn-primary" href="#" role="button">Baby care</a>
            </div>
            <div class="col-md-2 product pt-md-5 pt-4">
               <img src="images/mask and sanitiser.jpg" alt="Mask">
               <a class="btn btn-primary" href="#" role="button">Sanitiser & Mask</a>
            </div>
            <div class="col-md-2 product pt-md-5 pt-4">
              <img src="images/oral.png" alt="Oral">
              <a class="btn btn-primary" href="#" role="button">Oral</a>
            </div>
            <div class="col-md-2 product pt-md-5 pt-4">
              <img src="images/haircare.jpg" alt="Haircare">
              <a class="btn btn-primary" href="#" role="button">Haircare</a>
            </div>
            
            <div class="col-md-2 product pt-md-5 pt-4">
              <img src="images/aayurveda.jpg" alt="aayurveda">
              <a class="btn btn-primary" href="#" role="button">Ayurveda</a>
            </div>
            
          </div>
        </div>
      </div>
      <!--sec-slider-->
      <!--third-->
      <div class="container-fluid ">
        <div class="site-slider-three ">
          <h3 class="sec-slider"></h3>
          <div class="row slider-two text-center"style="margin-left:80px;padding:20px;" >
            
              <div class="safety pt-md-5 pt-4">
                <img src="images/regular.png" alt="">
                
              </div>
              <div class=" safety pt-md-5 pt-4">
                <img src="images/storedsafely.png" alt="">
                
              </div>
              <div class="safety pt-md-5 pt-4">
                <img src="images/contact.png" alt="Oral">
                
              </div>
              <div class="safety pt-md-5 pt-4">
                <img src="images/secure.png" alt="Haircare">
                
              </div>
              
              <div class="safety pt-md-5 pt-4">
                <img src="images/temp.png" alt="aayurveda">
              
              </div>
            
            
              
          </div>
        </div>
      </div>
      <!--third-->
      <!--card carousel-->
      <div class="container-fluid">
      <h3>What Our Customers Have To say?</h3>
	<div class="row px-mx-8">
		<div class="col-sm-12">
			<div id="inam" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner" style="padding:40px;">
					<div class="carousel-item active">
						 <div class="container">
						 	<div class="row" >
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;height:200px;background-color:#add8e6">
						 			
						 				<div class="card-body">
						 					<h4 class="card-title">Tripti das</h4>
						 					<p class="card-text">Very Good Website .Would recommend it to everyone requiring fast delivery of medicines at the doorsteps</p>
						 					
						 					
						 				</div>
						 				
						 			</div>
						 			
						 		</div>
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;height:200px;background-color:#add8e6">
						 				
						 				<div class="card-body">
						 					<h4 class="card-title">Smitha Pawar</h4>
						 					<p class="card-text">I've had a really good experience .The consultation with the doctors is good too .Really Customer Friendly </p>
						 		
						 					
						 				</div>
						 				
						 			</div>
						 			
						 		</div>
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;height:200px;background-color:#add8e6">
						 				
						 				<div class="card-body">
						 					<h4 class="card-title">Manya Nair </h4>
						 					<p class="card-text">Discounts are really good very customer friendly .Had a Great experience Surely would recommend to my friend.</p>
						 					
						 					
						 				</div>
						 				
						 			</div>
						 			
						 		</div>
						 		
						 	</div>
						 	
						 </div>

						
					</div>
					<div class="carousel-item">

						 <div class="container">
             
						 	<div class="row">
               
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;height:200px;background-color:#add8e6;">
						 				
						 				<div class="card-body">
						 					<h4 class="card-title">Sudha Patil</h4>
						 					<p class="card-text">Best Service have been Ordering medicine for the past couple of years!</p>
						 					
						 					
						 				</div>
						 				
						 			</div>
						 			
						 		</div>
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;height:200px;background-color:#add8e6;">
						 				
						 				<div class="card-body">
                      <h4 class="card-title">Rajesh Zope</h4>
						 					<p class="card-text">Amazing Experience!Medicine were delivered on time everytime I ordered.</p>
						 					
						 					
						 				</div>
						 				
						 			</div>
						 			
						 		</div>
						 		<div class="col-sm-12 col-lg-4">
						 			<div class="card" style="width: 300px;height:200px;background-color:#add8e6;">
                   
						 				<div class="card-body">
                     <h4 class="card-title">Rajesh Zope</h4>
						 				 <p class="card-text">Wonderful Experience!Medicine were delivered on time everytime I ordered.</p>
						 					
						 					
						 				</div>
						 				
						 			</div>
						 			
						 		</div>
						 		
						 	</div>
						 	
						 </div>

						
					</div>
					
				</div>
				<a href="#inam" class="carousel-control-prev" data-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</a>
				<a href="#inam" class="carousel-control-next" data-slide="next">
					<span class="carousel-control-next-icon"></span>
				</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>
      <!--card carousel-->
      

    </main> 
    <!--main-->
    <!-- Footer -->
<footer class="page-footer font-small pt-5 bg-dark ">

<!-- Footer Links -->
<div class="container-fluid text-center  text-md-left">

  <!-- Grid row -->
  <div class="row text-white">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

      <!-- Content -->
      <h5 class="text-uppercase">Say Goodbye to all your Healthcare worries!</h5>
      <p style="font-size:0.8em;text-color:grey">Say Goodbye to All Your Healthcare Worries With PharmEasy!
PharmEasy is here to help you take it easy! We are amongst one of India's top online pharmacy and medical care platforms. It enables you to order pharmaceutical and healthcare products online by connecting you to registered retail pharmacies and get them delivered to your home. We are an online medical store, making your purchase easy, simple, and affordable!</p>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->
      <h5 class="text-uppercase ">Links</h5>

      <ul class="list-unstyled">
        <li>
          <a href="#">Home</a>
        </li>
        <li>
          <a href="#!">Medicine</a>
        </li>
        <li>
          <a href="#!">Healthcare</a>
        </li>
        <li>
          <a href="#!">Contact Us</a>
        </li>
      </ul>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

      <!-- Links -->
      <h5 class="text-uppercase ">Social Media</h5>
      <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons  list-unstyled text-center">
              <li><a class="facebook my-2" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter my-2" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble my-2" href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a class="linkedin my-2" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
    </div>
    <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4>100% secure payments</h4>
						<img src="images/card.png" alt=" " class="img-responsive" />
					</div>
				</div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3 text-white ">© 2020 Copyright:
  <h6>Janice,Joshy,Megha</h6>
</div>
<!-- Copyright -->

</footer>
<!-- Footer -->
    <!--Footer-->  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="js/main.js" async defer></script>
  </body>
</html>