<?php
    include("connection.php");
    session_start();
    header('location:add_user_admin.php');
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

        if(isset($_POST['admin'])){
        $reg="insert into customer(FName,Uname,c_mail,c_password,user_type) values ('$fname','$uname','$mail','$password','admin')";
        mysqli_query($con,$reg);
        }
        else{
        $reg="insert into customer(FName,Uname,c_mail,c_password,user_type) values ('$fname','$uname','$mail','$password','user')";
        mysqli_query($con,$reg);
        }
        $_SESSION['user'] = $uname; // put logged in user in session    
        /*$reg="insert into customer(FName,Uname,c_mail,c_password) values ('$fname','$uname','$mail','$password')";*/
        
    }    


?>