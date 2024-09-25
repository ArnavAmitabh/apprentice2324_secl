<?php
include("header.php");
include("db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Get values from the form
    if (isset($_POST['captcha']))
    {

    //Application Validation
    if(isset($_POST['username']) && strlen(trim($_POST['username']))>0 && strlen(trim($_POST['username']))<60 && preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z_]([-.]?[0-9a-zA-Z_])*.[a-zA-Z]{2,4}$/", ($_POST['username'])))
    {
      $username=mysqli_real_escape_string($conn,trim($_POST['username']));
    }
    else
    {
    echo "<script type='text/javascript'>if(!alert('Invalid Email ID.')){window.location='login.php';}</script>";
    exit();
    }


    // New Password Validation
    if(isset($_POST['newpassword']) && strlen(trim($_POST['newpassword'])) > 0) {
      $newPassword = mysqli_real_escape_string($conn, trim($_POST['newpassword']));
      $hashed_password = password_hash($newPassword, PASSWORD_DEFAULT);
    // Password length and pattern validation
    if (strlen($newPassword) < 10 || strlen($newPassword) > 20 || !preg_match("/[a-z]/", $newPassword) || !preg_match("/[A-Z]/", $newPassword) || !preg_match("/\d/", $newPassword)) {
      echo "<script type='text/javascript'>alert('Invalid New Password. Password must be between 10 to 20 characters and contain at least one uppercase letter, one lowercase letter, and one number.'); window.location='forgotpassword.php';</script>";
      exit();
    }
    } 
     else 
    {
      echo "<script type='text/javascript'>alert('Invalid New Password.'); window.location='forgotpassword.php';</script>";
    exit();
    }


    // Aadhar Validation
    if(isset($_POST['aadhar']) && strlen(trim($_POST['aadhar']))>0 && strlen(trim($_POST['aadhar']))<13 && preg_match("/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/", ($_POST['aadhar'])))
    {
      $aadharNo=mysqli_real_escape_string($conn,trim($_POST['aadhar']));
    }
    else
    {
    echo "<script type='text/javascript'>if(!alert('Invalid Aadhar Number.')){window.location='forgotpassword.php';}</script>";
    exit();
    }


    // Captcha Validation Not required
    $enteredCaptcha = $_POST['captcha'];
    $storedCaptcha = $_POST['captcha']; // Assuming you have started the session in your PHP code

    // Validate the captcha
    if ($enteredCaptcha != $storedCaptcha) {
        echo "Incorrect CAPTCHA!";
        exit;
    }
  } 
  else 
  {
    echo "Captcha not submitted!";
    exit;
  }

    // Query to check if the application number exists in the register table
    $checkQuery = "SELECT * FROM login L , Register R WHERE L.email= '$username' and R.aadhar = '$aadharNo'";
    $result = $conn->query($checkQuery);

 if ($result->num_rows > 0)
 {
    // Update the password in the register table
    $updateQuery = "UPDATE login SET password = '$hashed_password' , createdby = '$username' , createdate = NOW() WHERE email = '$username'";
    if ($conn->query($updateQuery) === TRUE) 
    {
		  echo "<script type='text/javascript'>alert('Password updated successfully!'); window.location='login.php';</script>";
    exit();
        
    } else 
    {
		
        echo "<p style='font-size: 18px; font-weight: bold; text-align: center; color: red;'>Error updating password: " . $conn->error . "</p>";
    }
  } 
  else
  {
	  echo "<script type='text/javascript'>alert('User not registered!'); window.location='login.php';</script>";
    exit();
   
  }

}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>

<html>
<head>
  <title>SECL Graduate &amp; Technician Apprentices Application 2023-24  </title>
  <link rel="icon" type="image/x-icon" href="secllogo1.jpg">

<script>
let captcha;

//Captcha Generation
function generate() 
{

	// Clear old inputprintmsg
	document.getElementById("submitt").value = "";

	// Access the element to store the generated captcha
	captcha = document.getElementById("image");
	let uniquechar = "";

	const randomchar ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of 6 with random character
	for (let i = 1; i < 7; i++) 
  {
		uniquechar += randomchar.charAt(Math.random() * randomchar.length);
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

// Aadhar Valdiation
function validateAadhaar()
{ 
var regexp = /^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/; 
var ano = document.getElementById("aadhar").value; 

if(regexp.test(ano)) 
{  
  return true; 
}
else
{ 
  alert('Invalid Aadhaar Number');
  document.getElementById("aadhar").value="";
  document.getElementById("aadhar").focus();
  return false; 
}
}

//Password Policy
function validatePassword() {
    var password = document.getElementById("newpassword").value;
    if (password.length < 10 || password.length > 20) {
        alert("Password must be between 10 to 20 characters.");
        document.getElementById("newpassword").value = ""; // Clearing the password field
        document.getElementById("newpassword").focus(); // Focusing on the password field
        return false;
    }
    if (!/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
        alert("Password must contain at least one uppercase letter, one lowercase letter, and one number.");
        document.getElementById("newpassword").value = ""; // Clearing the password field
        document.getElementById("newpassword").focus(); // Focusing on the password field
        return false;
    }
    return true;
}



//Check mail
function ch_mail() 
{
    umail = document.getElementById('username').value;
    if ((umail.length == 0) || (umail.search(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z_]([-.]?[0-9a-zA-Z_])*.[a-zA-Z]{2,4}$/) == -1)) {

        alert('Incorrect or empty Email');
        document.getElementById('username').value = '';
        document.getElementById('username').focus();
        return false;

    }
}

// Validation for Empty Fields
function forma()
{
    var usr_input1 = document.getElementById('submitt').value;
    var captcha1 = document.getElementById('image');
    if(document.getElementById('username').value=='')
    {

      alert("Please Enter Email ID");
      exit;
    }
    if(document.getElementById('aadhar').value=='')
    {

      alert("Please Enter Aadhar");
      exit;
    }
    if(document.getElementById('newpassword').value=='')
    {

      alert("Please Enter New Password");
      exit;
    }

	if (usr_input1 != captcha1.innerHTML) 
  {
    if(usr_input1 == "")
    {
      alert('please enter CAPTCHA !');
      return false;
    }

    alert("Incorrect CAPTCHA !");
        return false;
	}
return true;
}

</script>

  
<link rel="stylesheet" href="bootstrap.min.css">
<script src="bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

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
      margin-top: 100px;
      /* background-color: aqua; */
      min-height:422px;
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
</head>

<!-- Form For Forgot Password -->
<body ONLOAD="generate()" >
  <div class="container">
      <img src="files/Coal_India_Logo.png">
    <h2>SECL Apprenticeship Login</h2><br>
    <h4 style="text-align:center;">Forgot Password</h4>
    <form action="forgotpassword.php" method="post">
      <div class="form-group">
        <label for="emailid">Email ID</label>
        <input type="email" id="username" name="username" class="form-control" onchange ="return ch_mail();" required placeholder="Enter your registered Email id">
      </div>
      <div class="form-group">
        <label for="application">Aadhar Number</label>
        <input type="text" id="aadhar" name="aadhar" class="form-control" required placeholder="Enter your Aadhar No." onchange="return validateAadhaar()" >
      </div>
      <div class="form-group">
        <label for="newpassword">New Password</label>
        <input type="password" id="newpassword" name="newpassword" class="form-control" onchange ="return validatePassword();" required placeholder="Enter New password" >
      </div>
      <div class="form-group ">
        <label for="captcha">Captcha</label>
        <input type="text" id="submitt" name="captcha" placeholder="Captcha code" class="form-control"  >
      </div>
       <div class="row">
        <div  class="col-4"></div>
      <div id="image" class="col-4" selectable="False"></div>
        <div style="padding:10px" class="col-3" onclick="generate()">
		    <i class="fas fa-sync"></i>
	      </div> 
        <div  class="col-4"></div>                                      
       </div>
       <br>
      <div class="form-group text-center">
        <button type="submit" class="btn btn-success mr-3" onclick="return forma();">Submit</button>
      </div>
    </form>


  </div>    
  </div>
    <style>
    .centered-button {
      display: block;
      margin: auto auto;
    }
    </style>
  <br>
  <button onclick="window.open('login.php','_blank')" style="display:block;"  type="login" style="margin-top:5px" class="btn btn-primary  centered-button"><b>Login</b></button>
   
 
  <div class="container2"><center><br> <span style="font-size:12px;" >Best viewed in latest versions of <strong>Google Chrome Version 122 or above</strong>/<strong>Firefox Version 123 or above</strong>.</span>
  <br>
     <span style="font-size:12px;" >Copyright © <?php echo date('Y'); ?>
              <a href="https://www.secl-cil.in" target="_blank">SECL</a>. All rights reserved.</span>
  </div>

</body>
</html>