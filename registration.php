<?php
    include "connection.php";
    session_start();
    header('location:login.php');
    $db='pharmacy';
    mysqli_select_db($con,$db);

    $fname=$_POST['FName'];
    $uname=$_POST['Uname'];
    $mail=$_POST['c_mail'];
    $password=$_POST['c_password'];
  
    

    $sql="select * from customer where FName ='$fname'";

    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
        echo "Already taken";
    }
    else{
        $_SESSION['user'] = $uname; // put logged in user in session    
        /*$reg="insert into customer(FName,Uname,c_mail,c_password) values ('$fname','$uname','$mail','$password')";*/
        $reg="insert into customer(FName,Uname,c_mail,c_password,user_type) values ('$fname','$uname','$mail','$password','user')";
        mysqli_query($con,$reg);
    }    

    
?>