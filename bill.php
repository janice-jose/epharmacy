<?php
    session_start();

    if(!isset($_SESSION['Username'])){
      header('location:login.php');
    }

	require_once("config.php");
	$db="pharmacy";

	mysqli_select_db($con,$db);


	//code to empty the Cart
	if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		// code for if cart is empty
		case "empty":
			$_SESSION["total_quantity"]=0;
 		    $_SESSION["total_price"]=0;
			unset($_SESSION["cart_item"]);
		break;	
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacy Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css file-->
    <link rel="stylesheet" href="Css/style.css">
    <link href="billproduct.css" type="text/css" rel="stylesheet" />
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
</HEAD>


<BODY>
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
              <a href="logout.php" Type="submit" class="btn border  my-md-4 my-2 header-links text-white" >logout</a>
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
        </nav>
      </div>
    </header>

<!-- Cart ---->
<div id="shopping-cart">
<div class="txt-heading">Billing</div>


<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	



<table class="tbl-cart" cellpadding="20" cellspacing="10">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="10%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<!--	<th style="text-align:center;" width="5%">Remove</th>	-->
</tr>	


<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<!--<td style="text-align:center;"><a href="medicine.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				-->
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				$_SESSION["total_quantity"]=$total_quantity;
				$_SESSION["total_price"]=$total_price;
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div class="shop-btn">  <a id="btnEmpty" href="medicine.php?">Continue Shopping</a> </div>
<div class="empty-btn">	<a id="btnEmpty" href="bill.php?action=empty">Empty Cart</a></div>
<hr>

<?php
    $total_quantity = $_SESSION["total_quantity"];
    $total_price = $_SESSION["total_price"];
?>
	<div class="flip-card">
	  <div class="flip-card-inner">
	    <div class="flip-card-front">
	    <div>
	      <!--<img src="img_avatar.png" alt="Avatar" style="width:300px;height:300px;">-->
	      <h4>Total quantity=<?php echo $total_quantity; ?></h4>
	      <h4>Total price=<?php echo "$ ".number_format($total_price, 2); ?><h4>
	      <h5>Products will be delivered on Sunday(20-12-2020)</h5>
	      <p>	<h5>Method of Payment:</h5> Cash on Delivery</p>
	    </div>
	    </div>
	    <div class="flip-card-back">
	      <h1>THANK YOU FOR SHOPPING</h1>
	    </div>
	  </div>
	</div>


</BODY>
</HTML>