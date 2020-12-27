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
          
        
          $logged_in_user = mysqli_fetch_assoc($result);
          
          if ($logged_in_user['user_type'] == 'user') {
            $_SESSION['user'] = $logged_in_user;  
            $_SESSION['Username']= $uname;      
            header('location:index.php');  
          }
          elseif ($logged_in_user['user_type'] == 'admin') {
            $_SESSION['user'] = $logged_in_user;
            $_SESSION['Username']= $uname;        
            header('location:Admin/index.php');  
          }
        }
        else{
          header('location:login.php');
        }

    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link rel="stylesheet" href="Css/exp4_wdlstyle.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

</head>

<body style="background-image: linear-gradient(to right bottom, powderblue, teal, #669999);" onload="generateCaptcha()">
<div class="item2">

  <div class="main">
    <div class="form-box">
      <p class="member" id="msg1">Already a member?</p>
      <p class="member ms2" id="msg2">Register Today!</p>
      <div class="button-box">
        <div id="btn"></div>
          <button type="button" class="toggle-btn" onclick="Login()">Login</button>
          <button type="button" class="toggle-btn" onclick="Signup()">Sign-up</button>
        </div>
        <form action="" method="post" id="Login" class="input-group">
            <div class="input-icons">
              <!--Login Full name-->
              
              <!--Login User name-->
              <i class="fa fa-user icon"></i><input type="text" name="Uname" class="input-field" placeholder="User Name" required >
              <!--Login Password-->
              <i class="fa fa-key icon" style="left: -22px;"></i><input type="password" name="c_password" class="input-field" placeholder="Password" required>
              <input type="checkbox" name="checkbox" class="check-box" ><span class="rmbrme">Remember me</span>
          </div>
          <span class="fpass"><a href="Forgot_password.html" target="_self">Forgot password?</a> </span>
          <button type="submit" class="submit-btn">Login</button>
          <br>
        </form>

        <form  method="post" action="Registration.php" id="Sign-up" class="input-group" name = "myForm" onsubmit=" return validateform();">
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
              <!--Sign-up Captcha-->
              <input type="text" name="mainCaptcha" class="input-field" id="mainCaptcha" readonly="readonly">
              <input type="button" class="half" id="refresh" value="Refresh" onclick="generateCaptcha();" />
              <input type="text" name="txtInput" class="input-field" placeholder="Enter the above Captcha" id="captchaInput" required onblur="CheckValidCaptcha();"><div class="errors" id="captcha" style="color: red;"></div>
            </div>
          <button type="submit" class="submit-btn">Sign-up</button>
        </form>
      </div>
    </div>
  <script type="text/javascript">
    var x = document.getElementById("Login");
    var y = document.getElementById("Sign-up");
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

    function generateCaptcha()
    { 
      var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

      var i;

      for(i=0;i<4;i++){
      var a = alpha[Math.floor(Math.random() * alpha.length)];
      var b = alpha[Math.floor(Math.random() * alpha.length)];
      var c = alpha[Math.floor(Math.random() * alpha.length)];
      var d = alpha[Math.floor(Math.random() * alpha.length)];
      }
      var code = a+' '+b+' '+c+' '+d;
      document.getElementById("mainCaptcha").value = code;                             
    }
    function CheckValidCaptcha(){
      var string1 = removeSpaces(document.getElementById("mainCaptcha").value);
      var string2 = removeSpaces(document.getElementById("captchaInput").value);
      if(string1!=string2){
        document.getElementById("captcha").innerHTML="Enter the Captcha correctly!!" ;
        document.getElementById("captchaInput").style.borderColor = "red";
        return false;
      }
      document.getElementById("captcha").innerHTML="" ;
      document.getElementById("captchaInput").style.borderColor = "#00cc00";
      return true;
    }
    function removeSpaces(string){         
      return string.split(' ').join('');
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
      if (!CheckValidCaptcha()){
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
