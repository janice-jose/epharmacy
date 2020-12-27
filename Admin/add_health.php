<?php
include('connection.php');
$db='pharmacy';
mysqli_select_db($con,$db);


if (isset($_POST['name'])){
    $name=$_POST['name'];
    $code=$_POST['code'];
    $type=$_POST['type'];
    $price=$_POST['price'];
    $image=$_POST['image']; 

    $reg="insert into healthcare(name,code,type,price,image) values ('$name','$code','$type','$price','$image')";
    mysqli_query($con,$reg);
}
if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $reg="delete from healthcare where id=$id";
    mysqli_query($con,$reg);
}

header('location:health.php');
?>