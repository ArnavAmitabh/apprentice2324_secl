<?php
include("header.php");
session_start();
$reg=$_SESSION['regno'];
$status=$_SESSION['status'];
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SECL Graduate &amp; Technician Apprentices Application 2023-24 </title>
	<link rel="icon" type="image/x-icon" href="secllogo1.jpg">
    <style>
        /* Add some basic styling to the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 5px;
            text-align: left;
			font-size:12px;
        }
        th {
            background-color: #f2f2f2;
        }
		#loading{
	postition : fixed;
	width : 100%;
	height: 100vh;
	background : #fff
	 url("200w.gif") no-repeat center;
	z-index:9999;
}
    </style>
</head>

<script>
    function hello(){
        window.print();
    }
    </script>
<style>
     
.bordered-element {
    /* border: 1px solid black; */
}
@media print {
    #printButton {
        display:none; /* Hide the print button when printing */
        /* @page {size:landscape;} */
    }
    @page {}/*size:landscape;*/
    .bordered-element {
    /* border: 1px solid black; */
    }
}
@media print {
            header, footer {
                display: block;
            }
        }
</style>



<?php

// Query to retrieve data from the database
$sql = "SELECT * FROM register R, login L, address A, education E, emp_exchange EE, bank B WHERE R.regno = L.regno AND L.regno = A.regno AND A.regno = EE.regno  AND EE.regno = E.regno AND E.regno = B.regno  AND R.regno LIKE '$reg'";
$result = $conn->query($sql);

?>


<body onload='hello();'>

<button class="btn btn-danger" onclick="hello();" id="printButton"><i class="fa fa-print"></i> Print This Page </button>
    <!-- <h2>Bordered Table Example</h2> -->

    <table>
    
        <tbody>
        <?php
// Check if there are records
if ($result) {

    while ($row = $result->fetch_assoc()) {

?>

        <tr>
            <td colspan="3" style="width:70%; text-align:center; font-size:30px;">
            <img src="secllogo1.jpg" alt="Image Description" style="vertical-align: middle; width: 80px; height: 80px;"/> 
                <b>South Eastern Coalfields Limited</b>
            </td>
        </tr>

            <tr>
                <td colspan="3" style="width:70%; text-align:center;font-size:18px;"><b>Application For GRADUATE/TECHNICIAN Apprenticeship 2023-24</b></td>
            </tr>
            <tr>
                <td></td>
                <td style="width:70%">AFTER SUBMISSION OF APPLICATION FORM.CANDIDATES ARE REQUIRED TO :<br><br> a) PRINT THE APPLICATION FORM<br><br> b)DULY COMPLETED APPLICATION FORM TO BE SUBMITTED DURING DOCUMENT VERIFICATION. BY SUBMITTING THE APPLICATION FORM IT SHALL BE ASSUMED THAT INFORMATION IS CORRECT ,IF FOUND FALSE/INCORRECT/INCOMPLETE, THE CANDIDATURE SHALL BE CANCELLED AT ANY STAGE.</td>
                <td style="width:20%"> <img width="100" height="100" src="upload_photo_sign/<?php echo $row['photo']; ?>" alt="photo of Candidate"></td>
            </tr>
            <tr>
                <td>1</td>
                <td style="width:70%">APPLICATION FOR GRADUATE / TECHNICIAN APPRENTICESHIP</td>
                <td style="width:20%"><?php echo $row['posta']; ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td style="width:70%">Registation No.</td>
                <td style="width:20%"><?php echo $row['regno']; ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td style="width:70%">NATS ID</td>
                <td style="width:20%"><?php echo $row['natsid']; ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td style="width:70%">Name of the Candidate ( should be same in NATS and Degree/Diploma Certificate and Aadhar card )</td>
                <td style="width:20%"><?php echo $row['fstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname']; ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td style="width:70%">Mobile Number ( same as in NATS portal )</td>
                <td style="width:20%"><?php echo $row['mobileno']; ?></td>
            </tr>
            <tr>
                <td>6</td>
                <td style="width:70%">Email ID  ( same as in NATS portal )</td>
                <td style="width:20%"><?php echo $row['email']; ?></td>
            </tr>
            <tr>
                <td>7</td>
                <td style="width:70%">Date of Registration in NATS portal</td>
                <td style="width:20%">
                <?php
                        // Assuming $row['dor'] contains the original date string
                    $originalDate = $row['dor'];

                        // Create a DateTime object from the original date
                    $date = new DateTime($originalDate);

                        // Format the date in the desired format
                    $formattedDate = $date->format('d-m-Y');

                        // Echo the formatted date
                     echo $formattedDate;
                ?> 
                </td>   
            </tr>
            <tr>
                <td>8</td>
                <td style="width:70%">Gender</td>
                <td style="width:20%"><?php echo $row['sex']; ?></td>
            </tr>
            <tr>
                <td>9</td>
                <td style="width:70%">Date of Birth (As per SSC Certificate)</td>
                <td style="width:20%">
                <?php
                        // Assuming $row['dor'] contains the original date string
                    $originalDate = $row['dob'];

                        // Create a DateTime object from the original date
                    $date = new DateTime($originalDate);

                        // Format the date in the desired format
                    $formattedDate = $date->format('d-m-Y');

                        // Echo the formatted date
                     echo $formattedDate;
                ?> 
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td style="width:70%">Fathers Name (As per SSC Certificate )</td>
                <td style="width:20%"><?php echo $row['fatherfstname']; ?> <?php echo $row['fathermiddlename']; ?> <?php echo $row['fatherlastname']; ?></td>
            </tr>
            <tr>
                <td>11</td>
                <td style="width:70%">Aadhar Card Number (showing all digits)</td>
                <td style="width:20%"><?php echo $row['aadhar']; ?></td>
            </tr>
            <tr>
                <td>12</td>
                <td style="width:70%">Educational Qualification (Degree /Diploma)</td>
                <td style="width:20%"><?php echo $row['qualification']; ?></td>
            </tr>
            <tr>
                <td>13</td>
                <td style="width:70%">Field of Specialisation</td>
                <td style="width:20%"><?php echo $row['specialisation']; ?></td>
            </tr>
            <tr>
                <td>14</td>
                <td style="width:70%">Institution Name from which passed qualifying exam(Degree/Diploma)</td>
                <td style="width:20%"><?php echo $row['institute']; ?></td>
            </tr>
            <tr>
            <tr>
                <td>15</td>
                <td style="width:70%">Date of Passing of Passing of qualifying exam(Degree/Diploma) [Note : Date of passing not earlier than 01 February 2019]</td>
                <?php
                        // Assuming $row['dor'] contains the original date string
                    $originalDate = $row['dop'];

                        // Create a DateTime object from the original date
                    $date = new DateTime($originalDate);

                        // Format the date in the desired format
                    $formattedDate = $date->format('d-m-Y');

                        // Echo the formatted date
                    //  echo $formattedDate;
                ?>
                <td style="width:20%"><?php echo $formattedDate; ?></td>
            </tr>
            <tr>
            <tr>
                <td>16</td>
                <td style="width:70%">% of Marks in qualifying exam (Degree/Diploma)</td>
                <td style="width:20%"><?php echo $row['percentd']; ?> %</td>
            </tr>
            <tr>
                <td>17</td>
                <td style="width:70%">University Roll No./Enrollment no.</td>
                <td style="width:20%"><?php echo $row['rollno']; ?></td>
            </tr>
  
            <tr>
                <td>18</td>
                <td style="width:70%">% of Marks in SSC / HSC exam ( SSC for Diploma/HSC for Degree)</td>
                <td style="width:20%"><?php echo $row['percents']; ?> %</td>
            </tr>
            <tr>
                <td>19</td>
                <td style="width:70%">Community ( Whether General, OBC , SC, ST)</td>
                <td style="width:20%"><?php echo $row['community']; ?></td>
            </tr>
            <tr>
                <td>20</td>
                <td style="width:70%">Address for communication</td>
                <td style="width:20%"><?php echo $row['presat']; ?></td>
            </tr>
            <tr>
                <td>21</td>
                <td style="width:70%">State</td>
                <td style="width:20%"><?php echo $row['presstate']; ?></td>
            </tr>
            <tr>
                <td>22</td>
                <td style="width:70%">District</td>
                <td style="width:20%"><?php echo $row['presdistt']; ?></td>
            </tr>
            <tr>
                <td>23</td>
                <td style="width:70%">PINCODE</td>
                <td style="width:20%"><?php echo $row['prespin']; ?></td>
            </tr>

                <td>24</td>
                <td style="width:70%">Bank Name</td>
                <td style="width:20%"><?php echo $row['bankname']; ?></td>
            </tr>
            <tr>
                <td>25</td>
                <td style="width:70%">Branch Name</td>
                <td style="width:20%"><?php echo $row['branchname']; ?></td>
            </tr>
            <tr>
                <td>26</td>
                <td style="width:70%">A/C no. (As mentioned in NATS portal)</td>
                <td style="width:20%"><?php echo $row['acno']; ?></td>
            </tr>
            <tr>
                <td>27</td>
                <td style="width:70%">IFSC Code</td>
                <td style="width:20%"><?php echo $row['ifsc']; ?></td>
            </tr>
            <tr>
                <td>28</td>
                <td style="width:70%">Account Holders Name</td>
                <td style="width:20%"><?php echo $row['acnoname']; ?></td>
            </tr>
            <tr>
                <td>29</td>
                <td style="width:70%">Have you undergone Apprenticeship Training in any organisation?</td>
                <td style="width:20%"><?php echo $row['apprenticeship']; ?></td>
            </tr>
            <tr>
                <td>30</td>
                <td style="width:70%">Have you obtained 1 year or more practical experience earlier?</td>
                <td style="width:20%"><?php echo $row['training']; ?></td>
            </tr>
            <tr>
                <td>31</td>
                <td style="width:70%">I hereby declare that the entries made by me in the application form are complete and true to the best of my knowledge and based on records. I further declare that my candidature may be cancelled at any stage , if I am found not eligible for and /or the information provided by me is found to be incorrect/incomplete.</td>
                <td style="width:20%">I Agree</td>
            </tr>
            <tr>
                <td>32</td>
                <td style="width:70%">Take print of this form.This form is required to be submitted at the time of document verification process before the committee.</td>
                <td style="width:20%"> <img width="100" height="100" src="upload_photo_sign/<?php echo $row['signature']; ?>" alt="signature of Candidate"></td>
            </tr>


            <!-- Add more rows as needed -->


<?php

}
}


// Close the database connection
$conn->close();
session_unset();
session_destroy();

// Prevent caching
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// Redirect to the home page or any other page after logout
header("Location: login.php");
exit();
?>
        </tbody>
    </table>

</body>
</html>