<?php 
include("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "HTTPS://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="HTTPS://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>SECL Graduate &amp; Technician Apprentices Recruitment </title>
	<link rel="icon" type="image/x-icon" href="secllogo1.jpg">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <script type="text/javascript" src="temp.js"></script>
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script>
        let captcha;
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

    function printmsg()
    {

    }

    // Pan Validation
    function isValidPAN(panInput) 
    {
       const panRegex = /^[A-Za-z]{5}[0-9]{4}[A-Za-z]{1}$/;
       return panRegex.test(panInput);
    }

    function checkPAN()
    {
       const inputText = document.getElementById("panInput").value.trim();
        if (isValidPAN(inputText)) 
        {
   
        }
        else
        {
        alert("Invalid PAN card number!");
        document.getElementById("panInput").value="";
        return false;
        }

    }

    // Mobile No Validation
    function validateInput(mobileno) 
    {
      var pattern = /^[6-9]\d*$/;
      return pattern.test(mobileno);
    }

    function chkmobile()
    {
        const inputText = document.getElementById("mobileno").value.trim();
    if (validateInput(inputText)) 
    {
    // alert("Valid PAN card number!");
    } 
    else 
    {
    alert("Mobile Number must starts with 6 , 7 , 8 ,9");
    document.getElementById("mobileno").value="";
    return false;
    }

    }

    // Aadhar No.Validation
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
        return false; 
        }
    }

    </script>
    <style>
        #image{
	margin-top: 5px;
	/* box-shadow: 5px 5px 5px 5px gray; */
	width: 90px;;
	padding: 20px;
	font-weight: 400;
	padding-bottom: 0px;
	height: 40px;
	user-select: none;
	text-decoration:line-through;
	font-style: italic;
	font-size: x-large;
	border: black 2px solid;
	margin-left: 10px;
	
}


input
{
	border:1px black solid;
}

.inline
{
	display:inline-block;
}

#btn
{
	box-shadow: 5px 5px 5px grey;
	color: aqua;
	margin: 10px;
	background-color: brown;
}

body
{
      background-color: #F5F5DC;
      /* background: url("login\ bg3.jpg") no-repeat center center fixed; */
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
}

    /* The message box is shown when the user clicks on the password field */
#message
{
        display: none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 10px;
        margin-top: 5px;
}

#message div 
{
        width: 300px;

        padding: 2px 25px;
        font-size: 11px;
}

    /* Add a green text color and a checkmark when the requirements are right */
.valid 
{
        color: green;
}

.valid:before
{
        position: relative;
        left: -15px;
        content: "✔";
}

    /* Add a red text color and an "x" when the requirements are wrong */
.invalid 
{
        color: red;
}

.invalid:before
{
        position: relative;
        left: -15px;
        content: "✖";
}

input[type=textbox]:focus, textarea:focus, select:focus, input[type=text]:focus, input[type=password]:focus{
        box-shadow: 0 0 5px rgba(81, 203, 238, 1);
        border: 1px solid rgba(81, 203, 238, 1);
}

</style>
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
function loader(){
	var preloader = document.getElementById("loading");
	preloader.style.display="block";


}
</script>

<body onload=" generate() ; ">
<div id="loading" style="display:none"></div>
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


                        <!-- End Message OK -->

            <!-- Message Error -->
            <!-- End Message Error -->

            <!-- Main -->
            <div id="main">
                <div class="cl">&nbsp;</div>

                <!-- Content -->
                <div id="content">
                    <!-- Box -->
                    <div class="box" id="loginform">
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2 class="left">REGISTRATION<span style="font-size:11px; color:#FFFFFF"> (All Fields are Mandatory)</span></h2>
                        </div>
                        <!-- End Box Head -->

                        <!-- Table -->
                        <div>
                            <form method="POST" action="save.php" >
                                <div>
                                    <br><table width="100%" class="front" style="background:transparent;">
                                        <tbody>
                                            <!-- First Name -->
                                        <tr>
                                            <td class="req" width="30%"> <b>Name of the Candidate ( should be same in NATS and Degree/Diploma Certificate and Aadhar card )</b> </td>
                                            <td>
                                                <input style="border: solid 1px #4AB8FF;" placeholder="First Name" maxlength="25" type="textbox" name="fstname" id="fstname" value="" size="25" onblur="capitaliseFirstLetter(this)" onchange="return chkname(this);" required>
                                                <input style="border: solid 1px #4AB8FF;" placeholder="Middle Name" maxlength="18" type="textbox" name="middlename" id="middlename" size="18" value="" onblur="capitaliseFirstLetter(this)" onchange="return chkname(this);">
                                                <input style="border: solid 1px #4AB8FF;" placeholder="Last Name" maxlength="25" type="textbox" name="lastname" id="lastname" size="25" value="" onblur="capitaliseFirstLetter(this)" onchange="return chkname(this);">
                                                <br><span class="note">[Note 1: Please do not use any prefix such as Shri/ Mr./ Ms./ Dr./ Mrs. Etc.]</span>
                                                
                                            </td>
                                           
                                        </tr>
                                            <!-- Father Name  -->
                                        <tr>
                                            <td class="req" width="30%"> <b>Father's Name (As per SSC Certificate )</b></td>
                                            <td>
                                                <input style="border: solid 1px #4AB8FF;" placeholder="First Name" maxlength="25" type="textbox" name="fatherfstname" value="" id="fatherfstname" size="25" onkeydown="valid()" onblur="capitaliseFirstLetter(this)" onchange="return chkname(this);">
                                                <input style="border: solid 1px #4AB8FF;" placeholder="Middle Name" maxlength="15" type="textbox" name="fathermiddlename" id="fathermiddlename" value="" size="18" onblur="capitaliseFirstLetter(this)" onchange="return chkname(this);">
                                                <input style="border: solid 1px #4AB8FF;" placeholder="Last Name" maxlength="25" type="textbox" name="fatherlastname" id="fatherlastname" value="" size="25" onblur="capitaliseFirstLetter(this)" onchange="return chkname(this);">
                                                <br><span class="note">[Note 1 : Please do not use any prefix such as Shri/ Mr./ Dr. Etc.]<br></span>

                                            </td>
                                        </tr>
                                            <!-- Post -->
                                        <tr>
                                            <td width="30%" class="req"><b>Application for Graduate/Technician Apprenticeship</b> </td>
                                            <td>
                                                <select name="posta" id="posta">
                                                    <option value="p">--Select Category--</option>
                                                    <option value="GRADUATE">GRADUATE</option>
                                                    <option value="TECHNICIAN">TECHNICIAN</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <!-- Gender -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Gender </b> </td>
                                            <td>
                                                <select name="sex" id="sex">
                                                    <option value="s">--Select Gender--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
													<option value="Others">Others</option>
                                                </select>
                                            </td>
                                        </tr>
                                            <!-- Community  -->
                                        <tr>
                                            <td valign="top" class="req"><strong>Community (Whether General , OBC , SC , ST)</strong> </td>
                                            <td>
                                                <select name="community" id="community" onchange="ajaxcom()">
                                                <option value="0">--Select Community--</option>
                                                <option value="GENERAL">GENERAL</option>
                                                <option value="OBC">OBC</option>
                                                <option value="SC">SC</option>
                                                <option value="ST">ST</option>
                                                </select> 
                                            </td>
                                        </tr>
                                            <!-- DOB -->
                                        <tr>   
                                            <td width="30%" class="req"> <b>Date Of Birth (As per SSC Certificate )</b> </td>
                                            <td style="text-align:justify">
                                                <input style="border: solid 1px #4AB8FF;" type="date" min="1970-01-31" max="2006-02-13" name="dob" id="dob" size="15"  value="">
                                                <br>
                                                <span style="text-align:justify" class="note">[<strong style="text-align:justify">Note :</strong>DOB as recorded in the
                                                    Matriculation/10th Standard or equivalent certificate.]</span>
                                            </td>
                                        </tr>
                                        <!-- Aadhar No. -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Aadhar No.(showing all digits)</b> </td>
                                            <td style="text-align:justify">
                                                <input style="border: solid 1px #4AB8FF;" type="text" name="aadhar" id="aadhar" size="15" maxlength="12" value="" onchange="return validateAadhaar()">
                                                <br>
                                            </td>
                                        </tr>
                                        <!-- Mobile Number -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Mobile Number </b></td>
                                            <td>
                                                <input style="border: solid 1px #4AB8FF;" onkeyup="return checkmobile(this.value)" onchange= "chkmobile()" name="mobileno" id="mobileno" value="" type="text" maxlength="10" size="10" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off">
                                                <br>
                                                <span class="note">[Enter Your Mobile Number without 91 or +91 As. 9999988888]</span>
                                                <br>
                                                <span class="note">[Please provide Mobile No. same as in NATS Portal.]</span>

                                            </td>
                                        </tr>
                                        <!-- Confirm Mobile Number -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Confirm Mobile Number </b>
                                            </td>
                                            <td>
                                                <input style="border: solid 1px #4AB8FF;" onkeyup="return checkmobile_confirm(this.value)" onchange ="ch_mobileconfirm()" name="mobileno_confirm" id="mobileno_confirm" value="" type="text" maxlength="10" size="10" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off" >
                                            </td>
                                        </tr>

                                        <!--Email Address-->
                                        <tr>
                                            <td width="30%" class="req"><b>E-mail Address</b> </td>
                                            <td>
                                                <input style="border: solid 1px #4AB8FF;" name="Email" value="" onblur="return showHint(this.value)" onchange ="return ch_mail();" id="Email" type="email" maxlength="60" size="45" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off"><br>
                                                <span class="note">[Please provide E-Mail ID same as in NATS Portal.]</span>
                                            </td>
                                        </tr>

                                        <!-- Confirm Email Address  -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Confirm E-mail Address </b>
                                            </td>
                                            <td>
                                                <input style="border: solid 1px #4AB8FF;" name="confirmEmail" id="confirmEmail" value="" onchange="ch_mailconfirm();" type="email" maxlength="60" size="45" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off">
                                            </td>
                                        </tr>
                                            <!-- Desired password -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Desired Password</b> </td>
                                            <td>
                                                <div style="float:left;"><input style="border: solid 1px #4AB8FF;" maxlength="20" size="22" type="password" id="DesiredPassword" name="DesiredPassword" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off">
                                                </div>
                                                <div id="showimage"><img style="margin-top:10px;" onclick="showPassword()" height="20" width="20" src="./files/pwd_eye1.png"></div>
                                                <div style="display:none" id="hideimage"><img style="margin-top:10px;" onclick="hidePass()" height="20" width="20" src="./files/pwd_eye.png"></div>


                                                <div style="float:none" id="message">
                                                    <div class="note" align="left">Password must fulfil following
                                                        conditions:</div>
                                                    <div id="letter" class="invalid">A <b>Lowercase</b> Letter(a-z)
                                                    </div>
                                                    <div id="capital" class="invalid">An <b>Uppercase</b> Letter(A-Z)
                                                    </div>
                                                    <div id="number" class="invalid">A <b>Number (0-9)</b></div>
                                                    <div id="length" class="invalid">Length of Password should be 10 to 20 characters</div>
                                                </div>

                                            </td>
                                        </tr>
                                        <!-- Confirm password -->
                                        <tr>
                                            <td width="30%" class="req"><b>Confirm Password</b> </td>
                                            <td>
                                                <input size="22" style="border: solid 1px #4AB8FF;" name="ConfirmPassword" type="password" maxlength="34" id="ConfirmPassword" value="" onfocus="return minlen(document.getElementById(&#39;DesiredPassword&#39;));" onchange="return checkmatchpassword(this.value);" oncopy="return false" ondrag="return false" ondrop="return false" onpaste="return false" autocomplete="off"> &nbsp;<span id="showmatchpassword"></span>
                                            </td>
                                        </tr>
                                        <!-- Captcha -->
                                        <tr>
                                            <td width="30%" class="req"> <b>Confirm Captcha</b>
                                            </td>
                                            <td>
                                            	<div id="user-input" class="inline">
		                                        <input style="border: solid 1px #4AB8FF;" type="text" id="submitt" name="submitt" placeholder="Captcha code"  /></div>
	                                            <div class="inline" onclick="generate()">
		                                                <i class="fas fa-sync"></i>
	                                            </div>

	                                            <div id="image" class="inline" selectable="False"></div>

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </div>
                                    <!-- Reset and Submit Button -->
                                <div align="center"><br>
                                <input type="checkbox" id="agreementCheckbox" name="agreementCheckbox" required>
                                                  <label for="agreementCheckbox">
                                                      <strong>
                                                      I hereby declare that the entries made by me in the register form are complete and true to the best of my knowledge and based on records. I further declare that my candidature may be cancelled at any stage , if I am found ineligible for and /or the information provided by me is found to be incorrect/incomplete.
                                                      </strong>
                                                  </label>
                                <br><input type="reset" value="Reset" class="button" tabindex="-1">&nbsp;<input type="submit" class="button" name="submit" value="Submit" onclick="return RegistrationForm();loader();"> <br><br></div>

                            <div><br>


                        </div>
                                
                            


                        </form></div>
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
        </div>

        <!-- End Container -->




<style>
#passwordStrength {
    height: 10px;
    display: block;
    float: left;
}

.strength0 {
    width: 250px;
    background: #cccccc;
}

.strength1 {
    width: 50px;
    background: #ff0000;
}

.strength2 {
    width: 100px;
    background: #ff5f5f;
}

.strength3 {
    width: 150px;
    background: #56e500;
}

.strength4 {
    background: #4dcd00;
    width: 200px;
}

.strength5 {
    background: #399800;
    width: 250px;
}
</style>


<script>
function passwordStrength(password) {
    var desc = new Array();
    desc[0] = "Very Weak";
    desc[1] = "Weak";
    //desc[2] = "Not good";
    desc[2] = "Medium";
    desc[3] = "Strong";
    desc[4] = "Strongest";

    var score = 0;
    if (password.length > 3) {
        document.getElementById("strength").innerHTML = 'Password strength';
    } else {
        document.getElementById("strength").innerHTML = '';
    }
    //if password bigger than 6 give 1 point
    if (password.length > 3)
        score++;

    //if password has both lower and uppercase characters give 1 point
    if ((password.match(/[a-z]/)) && (password.match(/[A-Z]/)))
        score++;

    //if password has at least one number give 1 point
    if (password.match(/\d+/))
        score++;
    document.getElementById("passwordStrength").className = "strength" + score;
}

var myInput = document.getElementById("DesiredPassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {

    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 10 && myInput.value.length <= 20) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}

// Mobile Validation
function ch_mobileconfirm() {

    if (document.getElementById('mobileno_confirm').value != document.getElementById('mobileno').value) {
        alert('Mobile and Confirm Mobile Number not match');
        document.getElementById('mobileno_confirm').value = '';
        document.getElementById('mobileno_confirm').focus();

        // return false;

    }

}

// Mail Validation
function ch_mail() {
    umail = document.getElementById('Email').value;
    if ((umail.length == 0) || (umail.search(
            /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z_]([-.]?[0-9a-zA-Z_])*.[a-zA-Z]{2,4}$/) == -1)) {

        alert('Incorrect or empty Email');
        document.getElementById('Email').value = '';
        document.getElementById('Email').focus();
        return false;

    }
}

//Confirm Mail Validation
function ch_mailconfirm() 
{

        if (document.getElementById('confirmEmail').value != document.getElementById('Email').value) {
            alert('Email And confirm Email Not match');
            document.getElementById('confirmEmail').value = '';
            
            return false;

        // }
    }
}

// Match Password
function checkmatchpassword(value) {
    if (value != document.getElementById('DesiredPassword').value) {
        document.getElementById('ConfirmPassword').value = '';
        alert('Confirm Password and Desired Password Mismatch');
        document.getElementById('ConfirmPassword').focus();
        return false;
    }
}

// Show Password
function showPassword()
{

    document.getElementById('hideimage').style.display = "block";
    document.getElementById('showimage').style.display = "none";
    var x = document.getElementById("DesiredPassword");


    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

// Hide Password
function hidePass() 
{

    document.getElementById('hideimage').style.display = "none";
    document.getElementById('showimage').style.display = "block";


    var x = document.getElementById("DesiredPassword");

    if (x.type === "text") {
        x.type = "password";
    } else {
        x.type = "text";
    }
}


</script>

</div>

<div class="container2"><center><br> 
  <span style="font-size:12px;" >Best viewed in latest versions of <strong>Google Chrome Version 122 or above</strong>/<strong>Firefox Version 123 or above</strong>.</span>
  <br><br>
     <span style="font-size:12px;" >Copyright © <?php echo date('Y'); ?>
              <a href="https://www.secl-cil.in" target="_blank">SECL</a>. All rights reserved.</span>
</div>
</body></html>