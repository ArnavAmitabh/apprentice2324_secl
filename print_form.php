<?php
// include("header.php");

session_start();

// Check if the user is authenticated
if (!(isset($_SESSION["regno"]) && isset($_SESSION["status"]) && $_SESSION["status"]=="A")) {
	
  header("Location: login.php");
  exit();
}

include("db.php");
$reg=$_SESSION["regno"];
$sql = "SELECT * FROM register WHERE regno LIKE '$reg'";
$result = mysqli_query($conn, $sql);  
while($row = $result->fetch_assoc())
{

    break;
}
$sql1 = "SELECT * FROM login WHERE regno LIKE '$reg'";
$result1 = mysqli_query($conn, $sql1);
while($row1 = $result1->fetch_assoc())
{

    break;
} 
$orgDate = $row['dob'];  
$newDate = date("d-m-Y", strtotime($orgDate)); 



$sql2 ="SELECT * FROM address WHERE regno LIKE '$reg'";
$result2 = mysqli_query($conn, $sql2);
$rowcount = mysqli_num_rows( $result2 );
if($rowcount!=0)
{
  while($row2 = $result2->fetch_assoc()) {
    break;
  }

} 
$sql3 ="SELECT * FROM education WHERE regno LIKE '$reg'";
$result3 = mysqli_query($conn, $sql3);
$rowcount = mysqli_num_rows( $result3 );
if($rowcount!=0)
{
  while($row3 = $result3->fetch_assoc()) {
    break;
  }

} 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "HTTPS://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
   <title>SECL Graduate &amp; Technician Apprentices Application 2023-24  </title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <script type="text/javascript" src="temp.js"></script>

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
      <script>


function finalPrint()
{

  
  window.location.replace("applicationform.php");
}

function logoutFunction() {
          
          
            // Redirect to a logout page or homepage
            loaderon();
            window.location.href = 'logout.php';
        }


</script>

<script src="jquery.min.js" ></script>


</head>
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
function loaderon(){
	var preloader = document.getElementById("loading");
	preloader.style.display="block";

}
</script>


<body>
<div id="loading" style="display:none"></div>
    <!-- Header -->
    <div style="height:135px;" id="header">
        <div class="shell">
            <!-- Logo + Top Nav -->
            <div id="top">
            </div>
            </div>
            <!-- End Logo + Top Nav-->
        </div> 
  

    <!-- End Header -->
    <!-- Container -->
    <div id="container">
        <div class="shell">
        <div style="color: white; background-color: #003; padding: 10px;font-size: 20px;font-family:Verdana, sans-serif;display: flex; justify-content: space-between;">Registration No :  <?php echo $_SESSION['regno']; ?>
          <button class="button" style="align:right;color: white;font-size: 20px;font-family:Verdana, sans-serif; padding: 5px 10px; cursor: pointer;border-radius: 50px;" onclick="logoutFunction()">Logout</button>
        </div>
        <div class="tabstrip">

        <?php
        $sqlprint = "SELECT status FROM register WHERE regno LIKE '$reg'";
        $resultprint = mysqli_query($conn, $sqlprint);
        while($rowprint = $resultprint->fetch_assoc())
        {
            break;
        }
        if($rowprint['status']== 'A')
        {
          echo '<input style="display:block;" type="button"  class="tab" id="printthispagelogin"  name="printthispagelogin" value="Print Application" onclick="finalPrint();">';
        }
        else if($rowprint['status']== 'S')
        {
          echo '<input style="display:none;" type="button" class="tab" id="printthispagelogin" name="printthispagelogin" value="Print Application" onclick="finalPrint();">';
        }
        ?>
    
  </div>



  </div>






        </div>

  <div id="main">
                <div class="cl">&nbsp;</div>

                <!-- Content -->
                <div id="content" >
                    <!-- Box -->
                    <div class="box" id="loginform" >
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2 class="left">BASIC INFORMATION</h2>
                        </div>
                        <!-- End Box Head -->

                        <!-- Table -->
                        <div>
                            <form method="post" action="main_form.php" name="test1" id="test1" autocomplete="off">
                                

                                <div id="prntdiv">

                                    
                                        &nbsp;&nbsp;
                                        <table class="front" style="background:transparent;font-size:14px;">
                                        <tbody>
                                            <tr>
                                            <td width="49%"><strong style="padding-left:20px;">Name </strong></td>
                                            <td width="51%">
                                            <strong><?php echo $row['fstname']  ," ", $row['middlename']," ",$row['lastname']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong style="padding-left:20px;">Father's Name</strong></td>
                                            <td>
                                            <strong><?php echo $row['fatherfstname']  ," ", $row['fathermiddlename']," ",$row['fatherlastname']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong style="padding-left:20px;">Apprenticeship Category</strong></td>
                                            <td>
                                            <strong><?php echo $row['posta']; ?></strong></td>
                                        </tr>
                                        
                                        <tr>
                                            <td><strong style="padding-left:20px;">Gender</strong></td>
                                            <td>
                                                <strong><?php echo $row['sex'];?></strong> </td>
                                        </tr>
                                        <tr>
                                            <td><strong style="padding-left:20px;">Community </strong> </td>
                                            <td>
                                                <strong><?php echo $row['community'];?> </strong> </td>
                                        </tr>                               
                                        <tr>
                                            <td><strong style="padding-left:20px;">Date of Birth</strong> </td>
                                            <td>
                                                <strong><?php echo $newDate;?></strong> </td>
                                        </tr>
                                        <tr>
                                            <td><strong style="padding-left:20px;">Aadhar No. (showing all digits)</strong>
                                            </td>
                                            <td>
                                                <strong><?php echo $row['aadhar'];?>
                                                </strong>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <strong style="padding-left:20px;"> Mobile Number    </strong> </td>
                                            <td>
                                                <strong><?php echo $row['mobileno'];?></strong> </td>
                                        </tr>
                                        <tr>
                                            <td><strong style="padding-left:20px;">E-Mail</strong></td>
                                            <td>
                                                <strong><?php echo $row1['email'];?></strong> </td>
                                        </tr>

                                       <tr>
                                            <td align="center" colspan="2">
                                            </td>
                                        </tr>
                                        </tbody></table>
                                        
                                        <tr>
                                            <td align="center" colspan="2">
                                            </td>
                                        </tr>  
                                      
                                      
                                        
                                        

                                                                                                                    </tbody></table>                                                                           
                                </div>
                            </form>

                            
                            


                        </div>
                        <!--end upper box-->
                        <!--option-->

                        <!--end option-->
                    </div>
                    <!-- End Box -->



                </div>
                <!-- End Content -->

                <!-- Sidebar -->
                <!-- End Sidebar -->

                <!-- Main -->
            </div>
   



<center> <br> 
  <span style="font-size:12px;" >Best viewed in latest versions of <strong>Google Chrome Version 122 or above</strong>/<strong>Firefox Version 123 or above</strong>.</span>
  <br><span style="font-size:12px;" >Copyright © <?php echo date('Y'); ?>
              <a href="https://www.secl-cil.in" target="_blank">SECL</a>. All rights reserved.</span></center>
		

  </body>  
  </html>