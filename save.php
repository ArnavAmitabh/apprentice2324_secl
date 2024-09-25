<?php 
include("header.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "HTTPS://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="HTTPS://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
   <title>SECL Graduate &amp; Technician Apprentices Recruitment </title>
   <link rel="icon" type="image/x-icon" href="secllogo1.jpg">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">

    <style>

     body{
      background-color: #F5F5DC;
      /* background: url("login\ bg3.jpg") no-repeat center center fixed; */
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }

    </style>
</head>


<body  >
    <!-- Header -->
    <div style="height:135px;" id="header">
        <div class="shell">
            <!-- Logo + Top Nav -->
            <div id="top">
            </div>
            <!-- End Logo + Top Nav-->
        </div> 
    </div>
    <!-- End Header -->
    <!-- Container -->
    <div id="container">
        <div class="shell">


    </div>

    </div>


<?php
include("db.php");
 
//First Name Post Validation
if(isset($_POST['fstname']) && preg_match('/^[A-Z]+$/', trim($_POST['fstname'])) && strlen(trim($_POST['fstname']))>0 && strlen(trim($_POST['fstname']))<=25)
{
  $fstname=mysqli_real_escape_string($conn,trim($_POST['fstname']));
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid first name')){window.location='login.php';}</script>";
  exit();
}


$middlename = $_POST['middlename'];

// Last Name Post Validation
if(preg_match('/^[A-Z]+$/', trim($_POST['lastname'])) && strlen(trim($_POST['lastname']))>0 && strlen(trim($_POST['lastname']))<=25)
{
    $lastname=mysqli_real_escape_string($conn,trim($_POST['lastname']));
}
else
{
    echo "<script type='text/javascript'>if(!alert('Invalid last name')){window.location='login.php';}</script>";
    exit();
}

// Father First Name Post Validation
if(isset($_POST['fatherfstname']) && preg_match('/^[A-Z]+$/', trim($_POST['fatherfstname'])) && strlen(trim($_POST['fatherfstname']))>0 && strlen(trim($_POST['fatherfstname']))<=25)
{
    $fatherfstname=mysqli_real_escape_string($conn,trim($_POST['fatherfstname']));
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid father first name')){window.location='login.php';}</script>";
  exit();
}

$fathermiddlename = $_POST['fathermiddlename'];

// Father Last Name Post Validation
if(preg_match('/^[A-Z]+$/', trim($_POST['fatherlastname'])) && strlen(trim($_POST['fatherlastname']))>0 && strlen(trim($_POST['fatherlastname']))<=25)
{
   $fatherlastname=mysqli_real_escape_string($conn,trim($_POST['fatherlastname']));
}
else
{
    echo "<script type='text/javascript'>if(!alert('Invalid father last name')){window.location='login.php';}</script>";
    exit();
}

//Post Validation
if (isset($_POST['posta']) && in_array(trim($_POST['posta']), ['GRADUATE', 'TECHNICIAN']))
{
  $posta=trim($_POST['posta']);
}
else
{
   echo "<script type='text/javascript'>if(!alert('Invalid Application for Graduate/Technician Apprenticeship')){window.location='login.php';}</script>";
   exit();
}

// Gender Post Validation
if (isset($_POST['sex']) && in_array(trim($_POST['sex']), ['Male', 'Female','Others']))
{
  $sex=trim($_POST['sex']);
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid Gender')){window.location='login.php';}</script>";
  exit();
}

// Community Post Validation
if (isset($_POST['community']) && in_array(trim($_POST['community']), ['GENERAL', 'OBC','SC','ST']))
{
  $community=trim($_POST['community']);
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid Community')){window.location='login.php';}</script>";
  exit();
}

// DOB Post Validation
if(isset($_POST['dob']) && strtotime($_POST['dob']) && strlen(trim($_POST['dob']))==10)
{
  $dob = $_POST['dob'];
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid DOB')){window.location='login.php';}</script>";
  exit();  
}

// Aadhar Post Validation
if(isset($_POST['aadhar']) && strlen(trim($_POST['aadhar']))>0 && strlen(trim($_POST['aadhar']))<13 && preg_match("/^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$/", ($_POST['aadhar'])))
{
  $aadhar=mysqli_real_escape_string($conn,trim($_POST['aadhar']));
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid Aadhar Number.')){window.location='login.php';}</script>";
  exit();
}

// Mobile Post Validation
if(isset($_POST['mobileno']) && is_numeric(trim($_POST['mobileno'])) && strlen(trim($_POST['mobileno']))==10 && trim($_POST['mobileno']) >= 6000000000 && trim($_POST['mobileno']) <= 9999999999)
{
 $mobileno=trim($_POST['mobileno']);
}
else
{
  echo "<script type='text/javascript'>if(!alert('Invalid Mobile Number')){window.location='login.php';}</script>";
  exit();
}

// Email Post Validation
if(isset($_POST['Email']) && strlen(trim($_POST['Email']))>0 && strlen(trim($_POST['Email']))<60 && preg_match("/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z_]([-.]?[0-9a-zA-Z_])*.[a-zA-Z]{2,4}$/", ($_POST['Email'])))
{
  $Email=mysqli_real_escape_string($conn,trim($_POST['Email']));
}
else
{
echo "<script type='text/javascript'>if(!alert('Invalid Email ID.')){window.location='login.php';}</script>";
exit();
}

// Desired Password Post Validation
if(isset($_POST['DesiredPassword']) && strlen(trim($_POST['DesiredPassword']))>0 )
{
  $password=mysqli_real_escape_string($conn,trim($_POST['DesiredPassword']));

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
}
else
{
echo "<script type='text/javascript'>if(!alert('Invalid Desired Password.')){window.location='login.php';}</script>";
exit();
}


$temp="";

//$sql1 = "select * from register where aadhar = '$aadhar'";

//$sql3 = "select * from register where mobileno = $mobileno";

//$sql4 = "select * from login where email = '$Email'";
$sql5 = "select * from register r where aadhar = '$aadhar'  ";
if ($result=mysqli_query($conn,$sql5))
{
  // Return the number of rows in result set
  $rowcount5=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }
  

//Aadhar Should be Unique.Otherwise it gives Already Registered Message.


if($rowcount5)

{
  echo "<br><br><br><br><br><br><br><br><h2 style ='color:black;text-align: center;font-size: 20px;'>User already Registered! Please <a href='login.php' rel='noopener noreferrer'>click here</a> to login with your registered Email ID and complete your application for the Apprenticeship Category.</h2>";
  
}

else
{
   $query1 = "insert into register (fstname,middlename,lastname,fatherfstname,fathermiddlename,fatherlastname,posta,sex,community,dob,aadhar,mobileno,status,createdby,createdate) values ('$fstname','$middlename','$lastname','$fatherfstname','$fathermiddlename','$fatherlastname','$posta','$sex','$community','$dob','$aadhar','$mobileno','S','$Email',NOW())";
   if ($conn->query($query1) == TRUE) 
   {
     $last_id = $conn->insert_id;
     $record = "select * from id where id = $last_id";
     $result1 = $conn->query($record);
     $row = $result1->fetch_assoc();
	 $record1 = "select regno from register where aadhar = '$aadhar'";
     $result2 = $conn->query($record1);
     $row1 = $result2->fetch_assoc();
     $temp = $row1['regno'];
    $query2 = "insert into login (email,password,regno,createdby,createdate) values ('$Email','$hashed_password','$temp','$Email',NOW())";

    // New code

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    // $mail->Username = 'arnavamitabh28@gmail.com';
    // $mail->Password = 'vskvsvxnhpjbqztz';
    $mail->Username = 'test@gmail.com';
    $mail->Password = '0';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('test@gmail.com');

    $mail->addAddress($Email);

    $mail->isHTML(true);

    $mail->Subject = ('Login Credentials for SECL Apprentice 2024');
    $mail->Body = 'Welcome to SECL Apprentice 2024 Portal.<br>
                   You have been successfully registered as <b>' . $temp . '</b>.<br>
                   To fill further details, please login using:<br>
                   Username: ' . $Email . '<br>
                   Password: ' . $password;

    $mail->send();



    // End New code
   if ($conn->query($query2) == TRUE) {
	   echo "<br><br><br><br><br><br><br><br><h2 style ='text-align: center;font-size: 30px;color:green;'>User successfully Registered! Your Registration number is ".$row1['regno']  . "Login Credentials sent to the registered Email ID(If Not Found.Please check spam folder.)</h2>";    
       echo "<br><br><p style ='color:blue;text-align: center;font-size: 20px;'>Please <a href='login.php' rel='noopener noreferrer'>click here</a> to login with your registered Email ID and complete your application for the Apprenticeship Category.</p>";
   }
   else {
    echo "Error: " . $query2 . "<br>" . $conn->error;
}    
        
      
   }
else {
    echo "Error: " . $query1 . "<br>" . $conn->error;
}	
  
}



mysqli_close($conn);
 
?>


<style>
.centered-text {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
}
  </style>
  <div class="centered-text"> <br> 
  <span style="font-size:12px;" >Best viewed in latest versions of <strong>Google Chrome Version 122 or above</strong>/<strong>Firefox Version 123 or above</strong>.</span>
  <br><span style="font-size: 12px;">Copyright © <?php echo date('Y'); ?>
        <a href="https://www.secl-cil.in" target="_blank">SECL</a>. All rights reservedaa.
    </span></div>


</body>  
  </html>