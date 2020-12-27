<?php
    include "connection.php";
    session_start();
    $db="pharmacy";
    
    mysqli_select_db($con,$db);

    if(isset($_POST['Uname'])){
        $uname=$_POST['Uname'];
        $password=$_POST['c_password'];

        $sql="select * from customer where Uname='".$uname."'AND c_password='".$password."' limit 1";

        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)==1){
          $_SESSION['Username']= $uname;
          $_SESSION['Usertype']= $user_type;
            header('location:index.php');
        }
        else{
            header('location:add.php');           
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add</title>
  <link rel="stylesheet" href="add_style.css">
  <link rel="stylesheet" href="style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/504a87cc72.js" crossorigin="anonymous"></script>

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
    <a href="index.php">Home</a>
    <a href="med.php">Medicine</a>
    <a href="health.php">Healthcare Products</a>
    <a class="active" href="add_user_admin.php">Users</a>
  </div>
</div>

</header> 
<div class="item2">

  <div class="main">
    <div class="form-box">
      <p class="member ms2" id="msg2">Add User/Admin</p>
      <div class="button-box">
        <div id="btn"></div>
          <button type="button" class="toggle-btn" onclick="user_or_admin()"><h4>User/Admin</h4></button>
        </div>

        <form  method="post" action="add_register.php" id="user_or_admin" class="input-group" name = "myForm" onsubmit=" return validateform();">
            <div class="input-icons">
              <!--Sign-up Full name-->
              <i class="fa fa-user icon"></i><input type="text" name="FName" class="input-field" placeholder="Full Name" id="fname" required onblur = "validatename();"> <div id="errorfname" class="errors" style="color: red;"></div>
              <!--Sign-up User name-->
              <i class="fa fa-user icon"></i><input type="text" name="Uname" class="input-field" placeholder="User Name" id="name" required onblur = "validateusername();"> <div id="errorname" class="errors" style="color: red;"></div>
              <!--Sign-up Email-->
              <i class="fa fa-envelope icon" style="left: -22px;"></i><input type="c_email" name="c_mail" class="input-field" placeholder="Email-id" id="email" required onblur="validateemail();"><div id="erroremail" class = "errors" style="color: red;"></div>
              <!--Sign-up Password-->
              <i class="fa fa-lock icon"></i><input type="password" name="c_password" class="input-field" placeholder="Password" id="psw" required onblur="validatepass();"><div id="errorpass" class="errors" style="color: red;"></div>
              <!--Sign-up Repeat Password-->
              <i class="fa fa-lock icon"></i><input type="password" name="repeatpassword" class="input-field" placeholder="Repeat Password" id="pswrepeat" required onblur="validaterepass();"><div class="errors" id="errorrepass" style="color: red;"></div>
              
            </div>
          <div style="display:inline;"> 
          <button type="submit" name="admin" id="admin" value="admin" class="admin-btn">Make Admin</button>
          </div>
          <div>
          <button type="submit" name="user" id="user" value="user" class="user-btn">Make User</button>
          </div>
        </form>
      </div>
    </div>


  <script type="text/javascript">
    var x = document.getElementById("user_or_admin");
    x.style.left='50px';
    var z = document.getElementById("btn");
    var a = document.getElementById("msg1");
    var b = document.getElementById("msg2");

    function myFunction() {
      var x1 = document.getElementById("myNavbar");
      if (x1.className === "navbar") {
        x1.className += " responsive";
      }
      else {
        x1.className = "navbar";
      }
    }
/*
    function Signup(){
      x.style.left = "-400px";
      y.style.left = "50px";
      z.style.left = "110px";
      a.style.display = "none";
      b.style.display = "block";
    }

    function Login(){
      x.style.left = "50px";
      y.style.left = "-400px";
      z.style.left = "0px";
      b.style.display = "none";
      a.style.display = "block";
    }
*/
    function validatename(){
      var name2 = document.myForm.fname.value;
      if (name2.length <3){
        document.getElementById("errorfname").innerHTML="Name must be atleast 3 characters long!" ;
        document.getElementById("fname").style.borderColor = "red";
        return false;
      }
        document.getElementById("errorfname").innerHTML= "" ;
        document.getElementById("fname").style.borderColor = "#00cc00";
        return true;
    }

    function validateusername(){
      var name1 = document.myForm.name.value;
      if (name1.length <4){
        document.getElementById("errorname").innerHTML="Username must be atleast 4 characters long!" ;
        document.getElementById("name").style.borderColor = "red";
        return false;
      }
        document.getElementById("errorname").innerHTML= "" ;
        document.getElementById("name").style.borderColor = "#00cc00";
        return true;
    }

    function validateemail() {
       var emailID = document.myForm.email.value;
       atpos = emailID.indexOf("@");
       dotpos = emailID.lastIndexOf(".");
       if (atpos < 2 || ( dotpos - atpos < 5 )) {
          document.getElementById("erroremail").innerHTML="Please Enter Valid Email!" ;
          document.getElementById("email").style.borderColor = "red";
          return false;
       }

       if (emailID.length-dotpos < 3){
         document.getElementById("erroremail").innerHTML="Please Enter Valid Email!" ;
         document.getElementById("email").style.borderColor = "red";
         return false;
       }
       document.getElementById("erroremail").innerHTML= "" ;
       document.getElementById("email").style.borderColor = "#00cc00";
       return( true );
    }

    function validatepass(){
      var passwd = document.myForm.psw.value;
      if (passwd.length < 8 ){
      document.getElementById("errorpass").innerHTML="Password must be atleast 8 characters long!" ;
      document.getElementById("psw").style.borderColor = "red";
      return false;
      }
      document.getElementById("errorpass").innerHTML= "" ;
      document.getElementById("psw").style.borderColor = "#00cc00";
      return( true );
    }

    function validaterepass(){
      var passwd1 = document.myForm.psw.value;
      var repass = document.myForm.pswrepeat.value;
      if(passwd1 != repass){
        document.getElementById("errorrepass").innerHTML="Passwords do not match!";
        document.getElementById("pswrepeat").style.borderColor = "red";
        return false;
      }

      document.getElementById("errorrepass").innerHTML= "" ;
      document.getElementById("pswrepeat").style.borderColor = "#00cc00";
      return( true );
    }


    function validateform(){
      if (!validatename()){
        alert("Form has invalid field/s")
        return false;
      }
      if (!validateusername()){
        alert("Form has invalid field/s")
        return false;
      }
      if (!validateemail()){
        alert("Form has invalid field/s")
        return false;
      }
      if (!validatepass()){
        alert("Form has invalid field/s")
        return false;
      }
      if (!validaterepass()){
        alert("Form has invalid field/s")
        return false;
      }
      alert("Thank You!, you have registered successfully!!")
      return true;
    }

  </script>
  </div>
</body>
</html>
