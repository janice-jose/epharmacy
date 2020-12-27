<?php
  session_start();

  if(!isset($_SESSION['Username'])){
    header('location:login.php');
  }
?>

<?php
require_once("config.php");
$db="pharmacy";

mysqli_select_db($con,$db);

//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  //code for adding product in cart
  case "add":
    if(!empty($_POST["quantity"])) {
      $pid=$_GET["pid"];
      $result=mysqli_query($con,"SELECT * FROM healthcare WHERE id='$pid'");
            while($productByCode=mysqli_fetch_array($result)){
      $itemArray = array($productByCode["code"]=>array('name'=>$productByCode["name"], 'code'=>$productByCode["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode["price"], 'image'=>$productByCode["image"]));
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      }  else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  }
  break;

  // code for removing product from cart
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  // code for if cart is empty
  case "empty":
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
    <title>Pharmacy Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Css file-->
    <link rel="stylesheet" href="Css/style.css">
    <link href="csshealthcare.css" type="text/css" rel="stylesheet" />
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
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
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
    <!-- Cart ---->
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>




<a id="btnEmpty" href="healthcare.php?action=empty">Empty Cart</a>



<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>  




<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
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
        <td style="text-align:center;"><a href="healthcare.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img style="width: 50px; height: 50px;" src="product_images/icon delete.jpg" alt="Remove Item" /></a></td>
        </tr>
        <?php
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);
    }
    ?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
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

<div class="purchase-btn"><a id="btnPurchase" href="bill.php?">Purchase</a> </div>

<div id="product-grid">
  <div class="txt-heading product-heading" >Healthcare Products</div>
  <?php
  $product= mysqli_query($con,"SELECT * FROM healthcare ORDER BY id ASC");
  if (!empty($product)) { 
    while ($row=mysqli_fetch_array($product)) {
    
  ?>
    <div class="product-item">
      <form method="post" action="healthcare.php?action=add&pid=<?php echo $row["id"]; ?>">
      <div class="product-image"><img class="inner-image" src="<?php echo $row["image"]; ?>"></div>
      <div class="product-tile-footer">
      <h4><div class="product-title"><?php echo $row["name"]; ?></div></h4>
      <h5><div class="product-price"><?php echo "$".$row["price"]; ?></div></h5>
      <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value ="Add to Cart" class="btnAddAction" /></div>
      </div>
      </form>
    </div>
  <?php
    }
  }   else {
      echo "No Records.";

  }
  ?>
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
