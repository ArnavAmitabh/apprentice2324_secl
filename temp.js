
function capitaliseFirstLetter(string)
{

var str=string.value.toUpperCase();
 document.getElementById(string.id).value=str;
}

function chkname(str)
{
  var newValue = str.value;
  var newLength = newValue.length;
  var extraChars=". -,";

  var search;
  for(var i = 0; i != newLength; i++) {
     aChar = newValue.substring(i,i+1);
     aChar = aChar.toUpperCase();

     if(aChar < "A" || aChar > "Z" ) {
   alert("Only Alphabetic Characters are allowed.No other characters such as space,., Numeric, Special characters etc. are allowed");
     str.value='';
      str.focus();
      return false;
      exit();

     }
  }



}
function chknamea(str) {
  var newValue = str.value;
  var newLength = newValue.length;
  var allowedChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz0123456789,-./";

  for (var i = 0; i != newLength; i++) {
    var aChar = newValue.charAt(i);

    if (allowedChars.indexOf(aChar) === -1) {
      alert("Only Alphabetic Characters, spaces, - , . / and numeric characters are allowed. No special characters are allowed.");
      str.value = '';
      str.focus();
      return false;
    }
  }
}
function chknameb(str) {
  var newValue = str.value;
  var newLength = newValue.length;
  var allowedChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ abcdefghijklmnopqrstuvwxyz";

  for (var i = 0; i != newLength; i++) {
    var aChar = newValue.charAt(i);

    if (allowedChars.indexOf(aChar) === -1) {
      alert("Only Alphabetic Characters and space are allowed.No other characters such as ., Numeric, Special characters etc. are allowed");
      str.value = '';
      str.focus();
      return false;
    }
  }
}

function valid()
{

 //var x = keyCode();
}


function checkmobile(str)
{
	if(isNaN(str))
	{
	alert("Please enter only numeric digits");
	document.getElementById("mobileno").value='';
	return false;
	}
	return true;
}


function checkmobile_confirm(str)
{
	if(isNaN(str))
	{
	alert("Please enter only numeric digits");
	document.getElementById("mobileno_confirm").value='';
	return false;
	}
	return true;
}


function showHint(str)
{

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {

   if(xmlhttp.responseText==1)
   		{
 	alert("This emailid is already exist");
     document.getElementById("Email").value="";

   		}


    }
  }
xmlhttp.open("GET","oraauth/candidate/emailcheck.php?q="+str,true);
xmlhttp.send();
}


function minlen(str)
{
 if( (str.value).length<10 )
 {
  alert("Invalid Password(Minimum 10 characters required)");

   number.classList.remove("valid");
   number.classList.add("invalid");
   letter.classList.remove("valid");
   letter.classList.add("invalid");
   capital.classList.remove("valid");
   capital.classList.add("invalid");
   length.classList.remove("valid");
   length.classList.add("invalid");
   document.getElementById("message").style.display = "none";
   document.getElementById("message").style.display = "none";
   str.value='';
   str.focus();
   return false;

 }
  if( (str.value).length>20 )
 {
   alert("Invalid Password(Maximum 20 characters required)");
   str.value="";
   number.classList.remove("valid");
    number.classList.add("invalid");
    letter.classList.remove("valid");
   letter.classList.add("invalid");
   capital.classList.remove("valid");
   capital.classList.add("invalid");
    length.classList.remove("valid");
   length.classList.add("invalid");

              document.getElementById("message").style.display = "none";
str.focus();
  return false;

 }
var  re5digit=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]{10,20}$/;

if (str.value.search(re5digit)==-1)
     {//if match failed
    alert("Invalid Password");
   number.classList.remove("valid");
    number.classList.add("invalid");
    letter.classList.remove("valid");
   letter.classList.add("invalid");
   capital.classList.remove("valid");
   capital.classList.add("invalid");
    length.classList.remove("valid");
   length.classList.add("invalid");

                document.getElementById("message").style.display = "none";

    str.value="";
     str.focus();
   return false;
       }

}

function RegistrationForm () {
    var f = document.getElementById('fstname');
    var l = document.getElementById('lastname');
    var ff = document.getElementById('fatherfstname');
    var fl = document.getElementById('fatherlastname');
    // var mf = document.getElementById('motherfstname');
    // var ml = document.getElementById('motherlastname');
    var pos = document.getElementById('posta');
    var s = document.getElementById('sex');
    var cm = document.getElementById('community');
    // var re = document.getElementById('religion');
    var d = document.getElementById('dob');
    var db = document.getElementById('dob').value;
    var n = document.getElementById('nationality');
    var em = document.getElementById('Email');
    var cem = document.getElementById('confirmEmail');
    var dp = document.getElementById('DesiredPassword');
    var cp = document.getElementById('ConfirmPassword');
    var mob = /^[1-9]{1}[0-9]{9}$/;
    var Mobileno = document.getElementById('mobileno');
    var Mobileno_confirm = document.getElementById('mobileno_confirm');
    
    var usr_input = document.getElementById('submitt').value;
    var captcha = document.getElementById('image');
    var adh = document.getElementById('aadhar');
    var agreementCheckbox = document.getElementById('agreementCheckbox');
   
    
  
    var re5digit = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!@#$%^&*!%^&()+=-[]\';,.{}|":<>?~_]{10,20}$/;
  
    dbs = db.split('/');
  
    var calday = dbs[0];
  
    var calmon = dbs[1];

    var calyear = dbs[2];
  
  
    // alert("center------"+gg.value);
  
    if (f.value == 0) {
      alert('Please Enter First Name');
      f.style;
      f.focus();
      return false;
    }
    if (l.value == "") {
      alert('Please Enter Last Name');
      l.style;
      l.focus();
      return false;
    }
  
    if (ff.value == 0) {
      alert('Please Enter Father First Name');
      ff.focus();
      return false;
    }
    if (fl.value == 0) {
      alert('Please Enter Father Last Name');
      fl.focus();
      return false;
    }
    // if (mf.value == 0) {
    //   alert('Please Enter Mother First Name');
    //   mf.focus();
    //   return false;
    // }
  
   if (pos.value == 'p' ) {
      alert('Please Select Post');
      pos.focus();
      return false;
    }
  
    if (s.value == 's') {
      alert('Please Select Gender');
      s.focus();
      return false;
    }
    if (cm.value == 0) {
      alert('Select Community');
      cm.focus();
      return false;
    }
    // if (re.value == 're') {
    //   alert('Select Religion');
    //   re.focus();
    //   return false;
    // }
  
  
  
    if (d.value == '') {
      alert('Please Select Your Date OF Birth');
      d.focus();
      return false;
    }
    
    if (adh.value == '')
    {
      alert('Please Enter Aadhar ');
      adh.focus();
      return false;
    }

    if (adh.value.length != 12)
    {
      alert('Please Enter Aadhar ');
      adh.focus();
      return false;
    }
    
 
  
    if (Mobileno.value == '') {
      alert('Please enter  mobile number.');
      Mobileno.value = '';
      Mobileno.focus();
      return false;
    }
  
    if (mob.test(Mobileno.value) == false) {
      alert('Please enter valid mobile number.');
      Mobileno.value = '';
      Mobileno.focus();
      return false;
    }
    if (Mobileno_confirm.value == '') {
      alert('Please enter Confirm mobile number.');
      Mobileno_confirm.focus();
      return false;
    }
    if (Mobileno.value != Mobileno_confirm.value) {
      alert('Mobile Number Mismatch.');
      Mobileno_confirm.focus();
      return false;
    }
    if (em.value == 0) {
      alert('Enter Your Email Address');
      em.focus();
      return false;
    }
  
    if (cem.value == 0) {
      alert('Confirm Your Email Address');
      cem.focus();
      return false;
    }
  
    if (dp.value == 0) {
      alert('Enter Desired Password');
      dp.focus();
      return false;
    }
  
    var dpv = dp.value
    if (dpv.length < 10) {
      alert('Password Too Short');
      dp.focus();
      return false;
    }
  
    if (dpv.length > 20) {
      alert('Password Too Long');
  
      dp.focus();
      return false;
    }
    var re5digit = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]{10,20}$/;
  
    if (dp.value.search(re5digit) == -1) {
      alert('Password Invalid');
      return false;
    }
    if (cp.value != dp.value) {
      alert('Password Mismatch');
      // cp.focus();
      return false;
    }
  
  
	if (usr_input != captcha.innerHTML) {
    if(usr_input == "")
    {
      alert('please enter CAPTCHA !');
      return false;
    }
	
    alert("Incorrect CAPTCHA !");
        return false;
	}

  if (!agreementCheckbox.checked)
  {
    alert('Please agree to the terms by checking the checkbox.');
    return false;
  }

     

  
  }
  