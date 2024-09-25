<?php 
include("header.php");
session_start();
include("db.php");
if(isset($_POST['username'])&& isset($_POST['pas'])&& isset($_POST['captcha']))
{


//   // Username Validation
  if(strlen(trim($_POST['username']))>0 && strlen(trim($_POST['username']))<60 && preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z_]([-.]?[0-9a-zA-Z_])*.[a-zA-Z]{2,4}$/", ($_POST['username'])))
  {
    $username=trim($_POST['username']);
  }
  else
  {
  echo "<script type='text/javascript'>if(!alert('Invalid Email ID.')){window.location='login.php';}</script>";

  exit();
  }
  

  // Password Validation
  if(strlen(trim($_POST['pas']))>0 )
  {
    $pas=trim($_POST['pas']);
  }
  else
  {
  echo "<script type='text/javascript'>if(!alert('Invalid Password.')){window.location='login.php';}</script>";

  exit();
  }

  // Check Login Table
  $result = mysqli_query($conn, "SELECT * FROM login WHERE email='$username'") or die(mysqli_error($conn));
  if(mysqli_num_rows($result) == 0) {
      // No rows returned, the result set is empty
      echo "<script>alert('Email ID not registered, Please register and continue!')</script>";
      exit();
  }

  $row = mysqli_fetch_array($result);
  $hashed_password = $row['password'];

  // Verify password
  if(password_verify($pas, $hashed_password)) {
      $_SESSION["regno"] = $row['regno'];
      $reg = $row['regno'];
      $result1 = mysqli_query($conn, "SELECT status FROM register WHERE regno='$reg'") or die(mysqli_error($conn));
      $row1 = mysqli_fetch_array($result1);
      $_SESSION["status"] = $row1['status'];
      
      if($row1['status'] == "S") {
          echo '<script>location.href="main_form.php"</script>';
      } else if($row1['status'] == "A") {
          echo '<script>location.href="print_form.php"</script>';
      }
  } else {
      echo "<script>alert('Incorrect Username Or Password!')</script>";
  }



// end


}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "HTTPS://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<head>
  <title>SECL Graduate &amp; Technician Apprentices Application 2023-24  </title>
    <link rel="icon" type="image/x-icon" href="secllogo1.jpg">
 
 
<link rel="stylesheet" href="bootstrap.min.css">



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
 <script src="jquery.min.js" ></script>
<script src="bootstrap.min.js"></script>

 
  <style>
  #image{
	margin-top: 5px;
	/* box-shadow: 5px 5px 5px 5px gray; */
	width: 90px;;
	padding: 2px;
	font-weight: 400;
	padding-bottom: 0px;
	height: 40px;
  text-align :center;
	user-select: none;
	text-decoration:line-through;
	font-style: italic;
  
	font-size: x-large;
	border: black 2px solid;
	margin-left: 10px;
	
}
    body{
      background-color: #f4f4f4;
      background: url("login background.jpg") no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }
    h2{
      text-align: center;
      font-weight: bold;
      margin-top: 20px;
    }
    label{
      font-weight: bold;
    }
    .container{
      border: 5px solid brown;
      border-radius:10px;
      max-width: 600px;
      margin: 0 auto;
      margin-top: 50px;
     
      /* background-color: aqua; */
      min-height:422px;
    }
    .container2{
      /* border: 5px solid brown; */
      /* border-radius:10px; */
      max-width: 600px;
      margin: 0 auto;
      /* margin-top: 100px; */
      /* background-color: aqua; */
     /* min-height:422px; */
    }

    .form-group{
      margin-bottom: 20px;
    }
    .submit{
    margin-bottom: 20px; 
    }
    img{
      display: block;
      margin-left: auto;
      margin-right: auto;
      height: 100px;
      margin-top: 10px;
    }
  </style>
  <style>
#loading{
	postition : fixed;
	width : 100%;
	height: 100vh;
	background : #fff
	 url("200w.gif") no-repeat center;
	z-index:9999;
}
</style>
<script>
let captcha;

// Captcha Generation
function generate()
{

	// Clear old inputprintmsg
	document.getElementById("submitt").value = "";

	// Access the element to store the generated captcha
	captcha = document.getElementById("image");
	let uniquechar = "";

	const randomchar ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of 6 with random character
	for (let i = 1; i < 7; i++) {
		uniquechar += randomchar.charAt(Math.random() * randomchar.length);
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

// Validation for Empty Fields
function forma()
{
    var usr_input1 = document.getElementById('submitt').value;
    var captcha1 = document.getElementById('image');
    if(document.getElementById('user').value==''){

      alert("Enter Username");
      exit;
    }
    if(document.getElementById('password').value=='')
    {

      alert("Enter Password");
      exit;
    }
	if (usr_input1 != captcha1.innerHTML) {
    if(usr_input1 == "")
    {
      alert('please enter CAPTCHA !');
      return false;
    }

    alert("Incorrect CAPTCHA !");
        return false;
	}
	loader();

}

</script>





<script>
//Email Validation
function ch_mail() 
{
    umail = document.getElementById('user').value;
    if ((umail.length == 0) || (umail.search(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z_]([-.]?[0-9a-zA-Z_])*.[a-zA-Z]{2,4}$/) == -1)) {

        alert('Incorrect or empty Email');
        document.getElementById('user').value = '';
        document.getElementById('user').focus();
        return false;

    }
}
</script>


<script>
function loader(){
	var preloader = document.getElementById("loading");
	preloader.style.display="block";
var x = document.getElementById("mainbody");
	x.style.display="none";

}


</script></head>
<!-- Form for Login -->
<body ONLOAD="generate();" >
<div id="loading" style="display:none">Loading...</div>
  <div id="mainbody">
  
  <div class="container">

   
      <img src="files/Coal_India_Logo.png">
    <h2>SECL Apprenticeship Login</h2>
	<br><center>
    <h6 > Note : <b style="color:brown;">Users already registered</b> can login directly with Email ID and apply.</h6></center><br>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="email" id="user" name="username" class="form-control" onchange ="return ch_mail();" required placeholder="Enter your registered Email id">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="pas" class="form-control" required placeholder="Enter your password" >
      </div>
      <div class="form-group ">
        <label for="captcha">Captcha</label>
        <input type="text" id="submitt" name="captcha" placeholder="Enter Captcha code"  class="form-control"  >
      </div>
        <div class="row">
        <div  class="col-4"></div>
      <div id="image" class="col-4" selectable="False"></div>
        <div style="padding:10px" class="col-3" onclick="generate()">
		    <i class="fas fa-sync"></i>
	      </div> 
        <div  class="col-4"></div>                                       
      </div><br>
      <div class="form-group text-center">
        <button type="submit"  class="btn btn-success" onclick="return forma();"  >Login</button>
      
        
      </div>
    </form>
    <button onclick=" window.open('forgotpassword.php','_blank')"  type="button" class="btn btn-sm btn-info centered-button">Forgot Password? Reset here!</button><br>

  </div>
  <style>
    .centered-button {
      display: block;
      margin: auto auto;
    }
    </style>
  <br>
  <button onclick=" window.open('register.php','_blank')" style="display:block;"  type="register" style="margin-top:5px" class="btn btn-primary  centered-button"><b>New User- Register Here !</b></button>
 
  <div class="container2"><center><br>
    <h6 > [Note : <b style="color:brown;">New users</b> need to register first to apply for any apprenticeship category.]</h6>
	<br> 
  <span style="font-size:12px;" >Best viewed in latest versions of <strong>Google Chrome Version 122 or above</strong>/<strong>Firefox Version 123 or above</strong>.</span>
  <br>
     <span style="font-size:12px;" >Copyright © <?php echo date('Y'); ?>
              <a href="https://www.secl-cil.in" target="_blank">SECL</a>. All rights reserved.</span>
  </div>
  </div>
   <script>
        document.onreadystatechange = function () {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "body").style.visibility = "hidden";
                document.querySelector(
                    "#loading").style.visibility = "visible";
            } else {
                document.querySelector(
                    "#loading").style.display = "none";
                document.querySelector(
                    "body").style.visibility = "visible";
            }
        };
    </script>
		  </body>
</html>