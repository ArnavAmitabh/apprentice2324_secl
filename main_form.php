<?php
// include("header.php");

session_start();

// Check if the user is authenticated
if (!(isset($_SESSION["regno"]) && isset($_SESSION["status"]) && $_SESSION["status"]=="S")) {
	
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
	<link rel="icon" type="image/x-icon" href="secllogo1.jpg">
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

 
    <script type="text/javascript" src="temp.js"></script>
<script src="jquery.min.js" ></script>

    <style>
     body{
      background-color: #F5F5DC;
      /* background: url("login\ bg3.jpg") no-repeat center center fixed; */
      -webkit-background-size: cover;
      -moz-background-size: cover;
      background-size: cover;
      -o-background-size: cover;
    }

#loading{
	postition : fixed;
	width : 100%;
	height: 100vh;
	background : #fff
	 url("200w.gif") no-repeat center;
	z-index:99999;
	
}

    </style>
      <script>
       $(document).ajaxStart(function() {
  $("#loading").show();
  $("#mainbody").hide();
  
 
});

$(document).ajaxStop(function() {
  $("#loading").hide();
  $("#mainbody").show();
 
 
});  

function filladd()
{

	 if(check.checked == true) 
     {      
            var atpp =document.getElementById("atc").value;
            var popp =document.getElementById("poc").value;
			      var distpp =document.getElementById("districtc").value;
			      var citypp =document.getElementById("cityc").value;
            var pinpp =document.getElementById("pincodeid").value;
            var statepp =document.getElementById("statec").value;

            var copyatpp =atpp ;
            var copypopp =popp ;
            var copydistpp =distpp ;
            var copycitypp =citypp ;
            var copypinpp =pinpp ;
            var copystatepp =statepp ;
 
            document.getElementById("atp").value = copyatpp;
            document.getElementById("pop").value = copypopp;
            document.getElementById("districtp").value = copydistpp;
            document.getElementById("cityp").value = copycitypp;
            document.getElementById("pincodep").value = copypinpp;
            document.getElementById("statep").value = copystatepp;
            
	 }
	 else if(check.checked == false)
	 {
		        document.getElementById("atp").value='';
            document.getElementById("pop").value='';
		        document.getElementById("districtp").value='';
		        document.getElementById("cityp").value='';
            document.getElementById("pincodep").value='';
            document.getElementById("statep").value='';

	 }
}

//Get Address Values from Database Table
function filladdressfromtable()
{

var reg = "<?php echo $reg; ?>"; 
$.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg , filladdress:1}, 
            success: function(data) {
              
              
              if(data)
              {
                  const parser = new DOMParser();
                  const doc = parser.parseFromString(data, 'text/html');
                  var atc = document.getElementById("atc"); 
                  atc.value = doc.getElementById("presat").innerHTML;        
                  var poc =document.getElementById("poc");
                  poc.value =  doc.getElementById("prespo").innerHTML; 
                  var doca = document.getElementById("districtc");
                  doca.value =  doc.getElementById("presdistt").innerHTML; 
                  var cit = document.getElementById("cityc");
                  cit.value =  doc.getElementById("prescity").innerHTML; 
                  var pinc = document.getElementById("pincodeid");
                  pinc.value =  doc.getElementById("prespin").innerHTML; 
                  var sta = document.getElementById("statec");
                  sta.value =  doc.getElementById("presstate").innerHTML; 

                  var atp = document.getElementById("atp");
                  atp.value =  doc.getElementById("permat").innerHTML; 
                  var pop = document.getElementById("pop");
                  pop.value =  doc.getElementById("permpo").innerHTML; 
                  var districtp = document.getElementById("districtp");
                  districtp.value =  doc.getElementById("permdistt").innerHTML; 
                  var cityp = document.getElementById("cityp"); 
                  cityp.value =  doc.getElementById("permcity").innerHTML; 
                  var pincodep = document.getElementById("pincodep");
                  pincodep.value = doc.getElementById("permpin").innerHTML; 
                  var statep = document.getElementById("statep");
                  statep.value =  doc.getElementById("permstate").innerHTML;
                  var eq =document.getElementById("eq"); 
				          var qual1 = doc.getElementById("posta").innerHTML;
                  var branch = doc.getElementById("specialisation").innerHTML;
                  if( qual1 == 'GRADUATE')
                  {
                  eq.value="Degree"
                  }
                  else
                  {
                    eq.value="Diploma"
                  }
				          var selectOptions = document.getElementById("selectOptions");
				          // Add options based on the selected radio button
				          if (qual1 === 'GRADUATE' && eq === 'Degree') {
				          // selectOptions.add(new Option('--Select Field of Specialisation--', 'f'));
				           selectOptions.add(new Option('Mining Engineering', 'Mining Engineering'));
				          selectOptions.add(new Option('Electrical Engineering', 'Electrical Engineering'));
				          selectOptions.add(new Option('Mechanical Engineering', 'Mechanical Engineering'));
				          selectOptions.add(new Option('Civil Engineering', 'Civil Engineering'));
				          selectOptions.add(new Option('Electronics and Telecommunication Engineering', 'Electronics and Telecommunication Engineering')); 
                  if(branch != 'n')
                  selectOptions.value=branch;
              
				          } 
				          else if (qual1 === 'TECHNICIAN' && eq === 'Diploma') 
				          {
				          // selectOptions.add(new Option('--Select Field of Specialisation--', 'f'));
				           selectOptions.add(new Option('Mining and Mine Surveying Engineering', 'Mining and Mine Surveying Engineering'));
				          selectOptions.add(new Option('Electrical Engineering', 'Electrical Engineering'));
				          selectOptions.add(new Option('Mechanical Engineering', 'Mechanical Engineering'));
				          selectOptions.add(new Option('Civil Engineering', 'Civil Engineering')); 
                  if(branch != 'n')
                  selectOptions.value=branch;
				          }   
              }

            }
        });

}




//Get Upload Educational Values from Database table
function filluploadsfromtable()
{

var reg = "<?php echo $reg; ?>"; 
$.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg , upload:1}, 
            success: function(data) {
              if(data){
                  const parser = new DOMParser();
                  const doc = parser.parseFromString(data, 'text/html');
				          var test = doc.getElementById('a').innerHTML;
				          if(test == "y"){
                  var institute = document.getElementById("institute"); 
                  institute.value = doc.getElementById("institute").innerHTML;        
                  var dop=document.getElementById("dop");
                  dop.value =  doc.getElementById("dop").innerHTML; 
                  var rollno = document.getElementById("rollno");
                  rollno.value =  doc.getElementById("rollno").innerHTML;  
                  var percentd = document.getElementById("percentd");
                  percentd.value =  doc.getElementById("percentd").innerHTML; 
                  var percents = document.getElementById("percents");
                  percents.value =  doc.getElementById("percents").innerHTML; 
				          // var selectOptions = document.getElementById("selectOptions");
				          // selectOptions.value=doc.getElementById("specialisation").innerHTML;
                
                  
                  if(doc.getElementById('filename').innerHTML=='a')
                  {
                   
                  }
                  else
                  {
                    var myAnchor = document.getElementById("up1");
                    myAnchor.setAttribute("href", doc.getElementById('filename').innerHTML);
                    myAnchor.setAttribute("target", "_blank");
                    myAnchor.innerHTML = "Uploaded File";
                    
                   
                  }
                  
                  var regnoee = document.getElementById("regnoee"); 
                  regnoee.value = doc.getElementById("natsid").innerHTML;
                  var dor = document.getElementById("dor"); 
                  dor.value = doc.getElementById("dor").innerHTML;        
                  var apprenticeshipy =document.getElementById("apprenticeshipy");
                  var apprenticeshipn =document.getElementById("apprenticeshipn");
                  var apprenticeship = doc.getElementById("apprenticeship").innerHTML;
                  if(apprenticeship == 'YES')
                  {
                    apprenticeshipy.checked = true;
                  }
                  else{
                    apprenticeshipn.checked = true;
                  }

                  var experiencey =document.getElementById("experiencey");
                  var experiencen =document.getElementById("experiencen");
                  var experience = doc.getElementById("training").innerHTML;
                  if(experience == 'YES'){
                    experiencey.checked = true;
                  }
                  else{
                    experiencen.checked = true;
                  }
                  
                  if(doc.getElementById('filename1').innerHTML=='a')
                  {
                   
                  }
                  else
                  {

                    var myAnchor = document.getElementById("up5");
                    myAnchor.setAttribute("href", doc.getElementById('filename1').innerHTML);
                    myAnchor.setAttribute("target", "_blank");
                    myAnchor.innerHTML = "Uploaded File";
 
                  }
				  }

              }
              
            }
        });

}

//Get Photo and Signature Values from Database Table
function fillphotosignfromtable()
{
  var path="upload_photo_sign/";
  var photo = "<?php if(isset($row)) echo $row['photo']; ?>";
  var sign="<?php if(isset($row)) echo $row['signature']; ?>";
  if(photo!='' && sign!=''){
    var photoFileName = photo.split('/').pop(); // Extract the file name from the path
    var signFileName = sign.split('/').pop(); // Extract the file name from the path

    $("#uploadedPhoto").attr("src", path+photo);
    $("#uploadedSign").attr("src", path+sign);
    $("#uploadedPhoto1").show();
    $("#uploadedSign1").show();
   
    

  }
}

//Pincode Validation
function checkpincode(str)
{
	if(isNaN(str))
	{
	alert("Please enter only numeric digits");
	document.getElementById("pincodeid").value='';
	return false;
	}
	return true;
}

//Pincode Validation
function validateInput() 
{
      var inputField = document.getElementById("pincodeid");
      var inputValue = inputField.value;

      // Regular expression to match exactly 6 digits
      var regex = /^\d{6}$/;

      if (regex.test(inputValue)) {
        // alert("Input is valid!");
      } else {
        alert("Input is not valid. Please enter exactly 6 digits.");
		    inputField.value='';
        inputField.focus();
      }
    }

//Pincode Validation    
function checkpincodee(str)
{
	if(isNaN(str))
	{
	alert("Please enter only numeric digits");
	document.getElementById("pincodep").value='';
	return false;
	}
	return true;
}

//Pincode Validation
function validateInputt() 
{
      var inputField = document.getElementById("pincodep");
      var inputValue = inputField.value;

      // Regular expression to match exactly 6 digits
      var regex = /^\d{6}$/;

      if (regex.test(inputValue)) 
      {
        
      } else 
      {
        alert("Input is not valid. Please enter exactly 6 digits.");
        inputField.value='';
		    inputField.focus();
      }
    }



function loadmain()
{

            const tabContentsbasic = document.querySelectorAll('.tab-content');
            const tabsbasic = document.querySelectorAll('.tab');
            tabContentsbasic[3].classList.add('active');
            tabsbasic[3].classList.add('active');
}

function changeTab(tabIndex)
{
      // Hide all tab contents and remove active class from tabs
      const tabContents = document.querySelectorAll('.tab-content');
      const tabs = document.querySelectorAll('.tab');
      tabContents.forEach(content => content.classList.remove('active'));
      tabs.forEach(tab => tab.classList.remove('active'));
      // Show the selected tab content and add active class to the tab
      tabContents[tabIndex].classList.add('active');
      tabs[tabIndex].classList.add('active');
}

//Photograph Size Validation
function validateFileSizep() 
{
  // Get the selected file from the input element
  const fileInput = document.getElementById("UploadPhoto");
  const selectedFile = fileInput.files[0];

  // Check if a file is selected
  if (selectedFile) {
    // Check if the file size is less than or equal to 500KB (500 * 1024 bytes)
    if (selectedFile.size <= 500 * 1024) {
  
    }
     else 
     {
      
      alert("File size exceeds the allowed limit (500KB). Please select a smaller file.");
      UploadPhoto.value = "";
    }
  }
}

//Signature Size Validation
function validateFileSizes()
{
  // Get the selected file from the input element
  const fileInput = document.getElementById("UploadSign");
  const selectedFile = fileInput.files[0];

  // Check if a file is selected
  if (selectedFile) {
    // Check if the file size is less than or equal to 500KB (500 * 1024 bytes)
    if (selectedFile.size <= 500 * 1024)
    {

    } 
    else
    {
      alert("File size exceeds the allowed limit (500KB). Please select a smaller file.");
      UploadSign.value = "";
    }
  }
}

//Photo Resolution Validation
function validateImageResolutionp()
{
  // Get the selected image file from the input element
  const imageInput = document.getElementById("UploadPhoto");
  const selectedImage = imageInput.files[0];

  // Create an Image object to check the resolution
  const img = new Image();
  
  img.onload = function() {
    // Check if the image resolution is 200x200 pixels
    if (img.width === 200 && img.height === 200) {

    } 
    else
     {
      alert("Image resolution should be 200x200 pixels. Please select an image with the correct resolution.");
      UploadPhoto.value = "";
    }
  };
  
  // Set the source of the Image object to the selected image file
  if (selectedImage) {
    img.src = URL.createObjectURL(selectedImage);
  }
}

//Signature Resolution Validation
function validateImageResolutions()
{
  // Get the selected image file from the input element
  const imageInput = document.getElementById("UploadSign");
  const selectedImage = imageInput.files[0];

  // Create an Image object to check the resolution
  const img = new Image();
  
  img.onload = function() {
    // Check if the image resolution is 200x200 pixels
    if (img.width === 200 && img.height === 200) {
   
    } 
    else
     {
      alert("Image resolution should be 200x200 pixels. Please select an image with the correct resolution.");
      UploadSign.value = "";
    }
  };
  
  // Set the source of the Image object to the selected image file
  if (selectedImage) {
    img.src = URL.createObjectURL(selectedImage);
  }
}

//Photo format Validation
function validateFilep()
{
    const fileInput = document.getElementById('UploadPhoto');
    const file = fileInput.files[0];    
    
    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if (!allowedExtensions.exec(file.name)) {
        alert('Invalid file type. Only JPG, JPEG, and PNG files are allowed.');
        UploadPhoto.value = "";
        return;
    }

}

//Sign format Validation
function validateFiles()
{
    const fileInput = document.getElementById('UploadSign');
    const file = fileInput.files[0];
   
    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if (!allowedExtensions.exec(file.name)) {
        alert('Invalid file type. Only JPG, JPEG, and PNG files are allowed.');
        UploadSign.value = "";
        return;
    }
    
   
}

//Address empty Field Validation
    function AddressForm () {
    var atc = document.getElementById('atc');
    var poc = document.getElementById('poc');
    var disc = document.getElementById('districtc');
    var ctc = document.getElementById('cityc');
    var pcc = document.getElementById('pincodeid');
    var stc = document.getElementById('statec');
    var atp = document.getElementById('atp');
    var pop = document.getElementById('pop');
    var disp = document.getElementById('districtp');
    var ctp = document.getElementById('cityp');
    var pcp = document.getElementById('pincodep');
    var stp = document.getElementById('statep');

    if (atc.value == 0) {
      alert('Please Enter Address');
      atc.style;
      atc.focus();
      return false;
    }
    if (poc.value == 0) {
      alert('Please Enter PO');
      poc.focus();
      return false;
    }
  
    if (disc.value == 0) {
      alert('Please Enter District');
      disc.focus();
      return false;
    }
    if (ctc.value == 0) {
      alert('Please Enter City');
      ctc.focus();
      return false;
    }
  
   if (pcc.value == 0 ) {
      alert('Please Enter Pincode');
      pcc.focus();
      return false;
    }
  
    if (stc.value == 's') {
      alert('Please Select State');
      stc.focus();
      return false;
    }

    if (atp.value == 0) {
      alert('Please Enter Address');
      atp.style;
      atp.focus();
      return false;
    }

    if (pop.value == 0) {
      alert('Please Enter PO');
      pop.focus();
      return false;
    }
  
    if (disp.value == 0) {
      alert('Please Enter District');
      disp.focus();
      return false;
    }

    if (ctp.value == 0) {
      alert('Please Enter City');
      ctp.focus();
      return false;
    }
  
   if (pcp.value == 0 ) {
      alert('Please Enter Pincode');
      pcp.focus();
      return false;
    }
  
    if (stp.value == 'ss') {
      alert('Please Select State');
      stp.focus();
      return false;
    }
    return true;
}

//Next button logic for Address
function AddressFormNext()
{

    var atc = document.getElementById('atc');
    var poc = document.getElementById('poc');
    var disc = document.getElementById('districtc');
    var ctc = document.getElementById('cityc');
    var pcc = document.getElementById('pincodeid');
    var stc = document.getElementById('statec');
    var atp = document.getElementById('atp');
    var pop = document.getElementById('pop');
    var disp = document.getElementById('districtp');
    var ctp = document.getElementById('cityp');
    var pcp = document.getElementById('pincodep');
    var stp = document.getElementById('statep'); 
     if (atc.value == 0 || poc.value == 0 || disc.value == 0 || ctc.value == 0 || pcc.value == 0 || stc.value == 's' || atp.value == 0 || pop.value == 0 || disp.value == 0 || ctp.value == 0 || pcp.value == 0 || stp.value == 'ss'){
      alert("Please Fill all the details in Basic Information.");
      return false;
     }

    if (1){
      $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg , checkBasicInfo : 1}, 
            success: function(data) {
              if(data == 0){
               //alert(data);
                 alert('Please Fill all the details in Basic Information and Save.');
				 
              }
               
        
         

      
  else{
    
      if(AddressForm()){
    var atc = $("#atc").val();
    var poc = $("#poc").val();
    var districtc = $("#districtc").val();
    var cityc = $("#cityc").val();
    var pincodeid = $("#pincodeid").val();
    var statec = $("#statec").val();
    var atp = $("#atp").val();
    var pop = $("#pop").val();
    var districtp = $("#districtp").val();
    var cityp = $("#cityp").val();
    var pincodep = $("#pincodep").val();
    var statep = $("#statep").val();


        // Perform your AJAX request here
        $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg ,atc: atc, poc : poc,districtc : districtc, cityc:cityc,pincodeid:pincodeid,statec:statec,atp:atp,pop:pop ,districtp:districtp,cityp:cityp,pincodep:pincodep,statep:statep}, 
            success: function(data) {
              if(data){
                filladdressfromtable();  
                //alert(data);
                // window.location.reload();
                console.log(data);
                
              }

            }
        });
      }
        changeTab(2);
		
		
		
			}
   }
        });
    }
}


//for next button logic for upload all the qualifications documents
function uploadDocNext(){

  if(UploadDoc ()){
      var formDataedu = new FormData(document.getElementById("test2"));

        $.ajax({
            type: 'POST', 
            url: 'response.php',
            data: formDataedu, 
            contentType : false,
            processData : false,
            success: function(data) {
            },
            error: function(xhr, textStatus, errorThrown) {
        console.error('AJAX error:', textStatus, errorThrown);
      }
        });

        $.ajax({
          type: 'POST', // or 'GET', depending on your needs
          url: 'response.php',
          data: { reg: reg ,checkUploadDoc:1}, 
          success: function(data) {
            if(data > 0){
 
              changeTab(1); 
              
            }
            else
            {
				alert("Please fill educational qualification and save first.");

            }

          }
        });

      }

      }
      
//for next button logic photo and signature
function PSNext(){
	         var filename1 = document.getElementById("UploadPhoto").value.trim();
                var filename2 = document.getElementById("UploadSign").value.trim();
                var checkStatus = 0;      
  $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg ,ps:1}, 
            success: function(data) {
				//alert(data);
				if(data==0)
				{
					alert("Please save Photo and Signatutre first");
				}
             else if(data == 1 && filename1 == "" && filename2 == ""){
                
                 changeTab(0);
              }
              else 
              { 
            
	/* if( $("#uploadedPhoto1").is(":hidden") || filename1=="" )
    {
      alert('Please Upload Photograph');
	  	UploadPhoto.value="";
      checkStatus =1;
      return false;
    }
	  if($("#uploadedSign1").is(":hidden") || filename2=="" )
    {
      alert('Please Upload signature');
	  	UploadSign.value="";
      checkStatus =1;

      return false;
    } */
	
  if(filename1!="" && filename1.length > 50 )
    {
      alert('Please change your photo filename to 50 characters');
      UploadPhoto.value="";
      checkStatus =1;
      return false;
    }
	if(filename2!="" && filename2.length > 50 )
    {
      alert('Please change your signature filename to 50 characters');
	  	UploadSign.value="";
      checkStatus =1;
      return false;

    }
    if (  filename1!="" && (!(filename1.endsWith('.jpg') || filename1.endsWith('.jpeg')))) {

 
      alert("Only JPG JPEG format are allowed in Photo");
      UploadPhoto.value="";
      checkStatus =1;
    }
    if (filename2!="" && (!(filename2.endsWith('.jpg') || filename2.endsWith('.jpeg')))) 
    {

    
    alert("Only JPG JPEG format are allowed in Singature");
    UploadSign.value="";
    checkStatus =1;
  }
    
    var formData = new FormData(document.getElementById("test3"));
    formData.append("reg", reg);

    if(checkStatus == 0){
        // Perform your AJAX request here
        $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: formData, 
            contentType : false,
            processData : false,
            success: function(data) {
              const parser = new DOMParser();
              const doc = parser.parseFromString(data, 'text/html');
              // alert(data);
              var alertshow = doc.getElementById("alertshow").innerHTML;
              var photo = doc.getElementById("photo").innerHTML;
              var sign = doc.getElementById("sign").innerHTML;


              alert(alertshow);

                $("#uploadedPhoto").attr("src", photo+ "?cache=" + new Date().getTime());
                $("#uploadedSign").attr("src", sign+ "?cache=" + new Date().getTime());
                $("#uploadedPhoto1").show();
                $("#uploadedSign1").show();
  
            }
        });
        changeTab(0);
                
      }

              return;
            }
                
            }
        });

}     

function chkdop(inputField) {
    var compareDate = new Date("2019-02-01"); // February 1, 2019
    
    // Get the value from the input field
    var inputValue = new Date(inputField.value);

    if (inputValue < compareDate) {
        alert("Date of passing should be greater than February 1, 2019");
        inputField.value = ""; // Clear the input field
        return false; // Prevent form submission
    }
    if (inputField.value == 0) {
      alert('Date of Passing of qualifying exam(Degree/Diploma) cannot be Blank');
      inputField.value="";
      inputField.focus();
      return false;
    }
    return true; // Allow form submission
}



function chkupload(inputField)
{
            // Get the value from the input field
            var inputValue = inputField.value;

            // Define a regular expression pattern to match only alphabetic and numeric characters
            var pattern = /^[a-zA-Z0-9\s]+$/;

            // Test if the input matches the pattern
            if (!pattern.test(inputValue)) {
                // If it doesn't match, show an error message
                alert("Please enter only alphabetic and numeric characters.");
                // Clear the input field
                inputField.value = '';
                inputField.focus();
                // Return false to prevent the form from submitting
                return false;
            }
}

function chkupload1(inputField)
{
            // Get the value from the input field
            var inputValue = inputField.value;

            // Define a regular expression pattern to match only alphabetic and numeric characters
            var pattern =  /^[a-zA-Z0-9/()-]+$/;

            // Test if the input matches the pattern
            if (!pattern.test(inputValue)) {
                // If it doesn't match, show an error message
                alert("Please enter only alphabetic and numeric characters and Symbol like / ( ) - is allowed");
                // Clear the input field
                inputField.value = '';
                inputField.focus();
                // Return false to prevent the form from submitting
                return false;
            }

}        
        
function UploadDoc()
{
     // Education Details
    var institute = document.getElementById('institute').value.trim();
    var dop = document.getElementById('dop').value.trim();
    var rollno = document.getElementById('rollno').value.trim();
    var percentd = document.getElementById('percentd').value.trim();
    var percents = document.getElementById('percents').value.trim();
    var filenamed = document.getElementById("filenamed").value.trim();
    var selectOptions = document.getElementById("selectOptions").value.trim();
    var Degree = document.getElementById("Degree");
    var Diploma = document.getElementById("Diploma");

    // NATS Validation
    var regnoee = document.getElementById('regnoee').value.trim();
    var dor = document.getElementById('dor').value.trim();
    var filenameee = document.getElementById('filenameee').value.trim();
    var yesRadio = document.getElementById("apprenticeshipy");
    var noRadio = document.getElementById("apprenticeshipn");
    var yesRadio1 = document.getElementById("experiencey");
    var noRadio1 = document.getElementById("experiencen");
       
    // if (!(Degree.checked || Diploma.checked)) 
    // {
    //     alert("Please select Educational Qualification (Degree/Diploma).");
    //     return false;
    // }
    
    if (selectOptions == "f") {
      alert('Please Select Field of Specialisation');
      // selectOptions.value="";
      return false;
    }
    if(institute == "")
    {
      alert('Please Enter Institute name');
      return false;
    }

    if (dop == 0) {
      alert('Date of Passing of qualifying exam(Degree/Diploma) cannot be Blank');
      dop.value="";
      return false;
    }
    
    if (rollno == 0) {
      alert('University Roll No./Enrollment No cannot be Blank');
      rollno.value="";
      return false;
    }
    if (percentd == 0) {
      alert('Percentage of Marks in qualifying exam (Degree/Diploma) Cannot be Blank');
      percentd.value="";
      return false;
    }
    if (percents == "") {
      alert('Percentage of Marks in SSC / HSC exam Cannot be Blank');
      percents.value="";
      return false;
    }

    if(filenamed=="" )
    {
      if(document.getElementById('up1').innerHTML != 'Uploaded File' ){
        alert('Please Upload Educational Qualification (Degree/Diploma) File');
        filenamed.value="";
        return false;
      }
     
    }

    if (regnoee == 0) {
      alert('NATS ID Cannot be Blank');
      regnoee.value="";
      return false;
    }
    if (dor == 0) {
      alert('Date of NATS Registration Cannot be Blank');
      dor.value="";
      return false;
    }
 
    if(filenameee=="" )
    {
      if(document.getElementById('up5').innerHTML!='Uploaded File'){
      alert('Please Upload NATS Registration File');
	  	filenameee.value="";
      return false;
      }
    }
    if (!(yesRadio.checked || noRadio.checked)) 
    {
            alert("Please select whether you have undergone Apprenticeship Training.");
            return false;
    }

    if (!(yesRadio1.checked || noRadio1.checked)) 
    {
            alert("Have you obtained 1 year or more practical experience earlier?");
            return false;
    }
    return true;
     }  


function checkPdffile(inputElement)
{
  const fileName = inputElement.value;
  
  if (fileName.endsWith('.pdf')||fileName.endsWith('.PDF')) {
    // The file has a PDF extension, so it's valid.
  } else {
    alert('Only PDF files are allowed.');
    inputElement.value = ''; // Clear the file input field
    inputElement.onfocus();

  }

  if (fileName.length > 50) {
    alert('Filename must be less than 50 characters.');
    inputElement.value = ''; // Clear the file input field
    inputElement.focus(); } else {
  }


  const selectedFile = inputElement.files[0];

  // Check if a file is selected
  if (selectedFile) {
    // Check if the file size is less than or equal to 500KB (500 * 1024 bytes)
    if (selectedFile.size <= 1024 * 1024) {
      // File size is within the allowed limit, you can proceed with further actions
    //   alert("File size is within the allowed limit.");
    } else {
      // File size exceeds the allowed limit, show an error message
      alert("File size exceeds the allowed limit (1MB). Please select a smaller file.");
      // Clear the input field
      inputElement.value = ''; // Clear the file input field
      inputElement.onfocus();
    }
  }
}


function capitaliseFirstLetter1(string)
{
var str=string.value.toUpperCase();
string.value=str;
}

//final check
function finalCheck()
{
	
	
	
    var agreementCheckbox = document.getElementById("agreementCheckbox");

    if (agreementCheckbox.checked) {
		
		
        var result = confirm("Once you finally submit, the form cannot be edited. Please save all the details first. Do you still want to proceed?");
        if (result) {
       
           
            $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg , finalsubmit:1}, 
            success: function(data) {
			freezeform();
				 window.location.replace("applicationform.php");
				
            }
            });
            //window.location.replace("logout.php");
            //var myElement = document.getElementById("finalsubmit");
           // myElement.style.display = "none";
			 //window.open("applicationform.php");
			 return true;
        } else {
             
            return false;
        }
    } else {
      
      alert("Please agree to the terms and conditions before final submit!");
      return false;
      
    }

     // Prevent default form submission
}

function freezeform()
{
  var reg = "<?php echo $reg; ?>"; 
$.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg , freezeform:1}, 
            success: function(data) {
              if(data){
                  const parser = new DOMParser();
                  const doc = parser.parseFromString(data, 'text/html'); 
                  var abcd = doc.getElementById("status").innerHTML;  
                  // alert(abcd);
                  if(abcd == 'A'){
                      var myElement = document.getElementById("printthispage");
                      myElement.style.display = "block"; 
                      var myElement = document.getElementById("printthispagelogin");
                      myElement.style.display = "block";
                      var myElement = document.getElementById("finalsubmit");
                      myElement.style.display = "none"; 

                       var myForm1 = document.getElementById('test1');

                      // Get all form elements within the form
                      var formElements1 = myForm1.elements;

                      // Iterate through each form element and set disabled to true
                      for (var i = 0; i < formElements1.length; i++) {
                        var elementType = formElements1[i].type;

                        // Check if the element is an input and not a button or submit
                        if (elementType === 'text' || elementType === 'radio'  || elementType === 'select-one' || elementType === 'file' || elementType === 'date' || elementType === 'number') {
                          formElements1[i].disabled = true;
                        }
                      }

                      var myForm2 = document.getElementById('test2');

                      // Get all form elements within the form
                      var formElements2 = myForm2.elements;

                      // Iterate through each form element and set disabled to true
                      for (var i = 0; i < formElements2.length; i++) {
                        var elementType = formElements2[i].type;

                        // Check if the element is an input and not a button or submit
                        if (elementType === 'text' || elementType === 'radio'  || elementType === 'select-one' || elementType === 'file' || elementType === 'date' || elementType === 'number') {
                          formElements2[i].disabled = true;
                        }
                      }

                      var myForm3 = document.getElementById('test3');

                      // Get all form elements within the form
                      var formElements3 = myForm3.elements;

                      // Iterate through each form element and set disabled to true
                      for (var i = 0; i < formElements3.length; i++) {
                        var elementType = formElements3[i].type;

                        // Check if the element is an input and not a button or submit
                        if (elementType === 'text' || elementType === 'radio'  || elementType === 'select-one' || elementType === 'file' || elementType === 'date' || elementType === 'number') {
                          formElements3[i].disabled = true;
                        }
                      }

                      var myForm4 = document.getElementById('test4');

                      // Get all form elements within the form
                      var formElements4 = myForm4.elements;

                      // Iterate through each form element and set disabled to true
                      for (var i = 0; i < formElements4.length; i++) {
                        var elementType = formElements4[i].type;

                        // Check if the element is an input and not a button or submit
                        if (elementType === 'text' || elementType === 'radio'  || elementType === 'select-one' || elementType === 'file' || elementType === 'date' || elementType === 'number') {
                          formElements4[i].disabled = true;
                        }
                      }

                  }
                  else if(abcd == 'S'){
                     var myElement = document.getElementById("finalsubmit");
                     myElement.style.display = "none"; 
                    var myElement = document.getElementById("printthispage");
                    myElement.style.display = "none"; 
                    var myElement = document.getElementById("printthispagelogin");
                      myElement.style.display = "none";

                  }

           
                
              }
               
   
            }
        });
        
}


function finalPrint()
{
  // window.location.assign("applicationform.php");
  //window.open("applicationform.php");
}

var reg = "<?php echo $reg; ?>"; 
$(document).ready(function(){

  $("#fadein1").fadeIn(1000);
  $("#fadein2").fadeIn(1000);
  $("#fadein3").fadeIn(1000);
  $("#fadein4").fadeIn(1000);
  $("#saveaddress").click(function(e) { // for Address Save
    e.preventDefault();
if(AddressForm()){
    var atc = $("#atc").val();
    var poc = $("#poc").val();
    var districtc = $("#districtc").val();
    var cityc = $("#cityc").val();
    var pincodeid = $("#pincodeid").val();
    var statec = $("#statec").val();
    var atp = $("#atp").val();
    var pop = $("#pop").val();
    var districtp = $("#districtp").val();
    var cityp = $("#cityp").val();
    var pincodep = $("#pincodep").val();
    var statep = $("#statep").val();


        // Perform your AJAX request here
        $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg ,atc: atc, poc : poc,districtc : districtc, cityc:cityc,pincodeid:pincodeid,statec:statec,atp:atp,pop:pop ,districtp:districtp,cityp:cityp,pincodep:pincodep,statep:statep}, 
            success: function(data) {
              if(data){
                
                filladdressfromtable();  
                alert(data);
                console.log(data);
                
              }
 
            }
        });
      }


    });

 // for Photograph and Signature Save
    $("#saveuploadps").click(function(e) {
    e.preventDefault();

    var filename1 = document.getElementById("UploadPhoto").value.trim();
    var filename2 = document.getElementById("UploadSign").value.trim();
    var checkStatus = 0;
    var up =document.getElementById("uploadedPhoto");
    var us =document.getElementById("uploadedSign");
    
  
	if(filename1=="")
    {
      if(!up.src){
      alert('Upload Photo ');
	  	UploadPhoto.value="";
      checkStatus =1;
      return false;
      }
    }
   
    
	  if(filename2=="" )
    {

      if(!us.src){
      alert('Upload Signature ');
	  	UploadSign.value="";
      checkStatus =1;
      return false;
      }
 
    }
	
if(filename1.length > 50 )
    {
      if(!up.src){
      alert('Please change your photo filename to 50 characters');
      UploadPhoto.value="";
      checkStatus =1;
      return false;
      }
    }
	if(filename2.length > 50 )
    {
      if(!us.src){
      alert('Please change your signature filename to 50 characters');
	  	UploadSign.value="";
      checkStatus =1;
      return false;
      }

    }
    if (filename1.endsWith('.jpg') || filename1.endsWith('.jpeg'))
    {

    } else 
    {
      if(!up.src){
      alert("Only JPG JPEG format are allowed in Photo");
      UploadPhoto.value="";
      checkStatus =1;
      }
    }

    if (filename2.endsWith('.jpg') || filename2.endsWith('.jpeg'))
    {
    
    } else
    {
    if(!us.src){
    alert("Only JPG JPEG format are allowed in Singature");
    UploadSign.value="";
    checkStatus =1;
    }
    }
    
    var formData = new FormData(document.getElementById("test3"));
    formData.append("reg", reg);



    if(checkStatus == 0){
        // Perform your AJAX request here
        $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: formData, 
            contentType : false,
            processData : false,
            success: function(data) {
              const parser = new DOMParser();
              const doc = parser.parseFromString(data, 'text/html');
              
              var alertshow = doc.getElementById("alertshow").innerHTML;
              var photo = doc.getElementById("photo").innerHTML;
              var sign = doc.getElementById("sign").innerHTML;

alert(alertshow);
         

                $("#uploadedPhoto").attr("src", photo+ "?cache=" + new Date().getTime());
                $("#uploadedSign").attr("src", sign+ "?cache=" + new Date().getTime());
                $("#uploadedPhoto1").show();
                $("#uploadedSign1").show();
  
      

            }
        });
     
                
      }

    });


});


//Bank empty field validation
function checkbank() {
    var bankname = document.getElementById('bankname').value.trim();
    var branchname = document.getElementById('branchname').value.trim();
    var acno = document.getElementById('acno').value.trim();
    var ifsccode = document.getElementById("ifsccode").value.trim();
    var acholdername = document.getElementById("acholdername").value.trim();
      
    
    if (bankname == "") {
      alert('Please Enter Bank Name');
      bankname.value="";
      return false;
    }

    if (branchname == "") {
      alert('Please Enter Branch Name');
      branchname.value="";
      return false;
    }

    if (acno == "") {
      alert('Please Enter Account Number');
      acno.value="";
      return false;
    }

    if (ifsccode == "") {
      alert('Please Enter IFSC Code');
      ifsccode.value="";
      return false;
    }

    if (acholdername == "") {
      alert('Please Enter Account Holder Name');
      acholdername.value="";
      return false;
    }
    return true;
}

//save bank logic
function savebank() {
  event.preventDefault();
    if (checkbank()) {
        var bankname = $("#bankname").val();
        var branchname = $("#branchname").val();
        var acno = $("#acno").val();
        var ifsc = $("#ifsccode").val();
        var acnoname = $("#acholdername").val();

        // Perform your AJAX request here
        $.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { 
                reg: reg,
                bankname: bankname,
                branchname: branchname,
                acno: acno,
                ifsc: ifsc,
                acnoname: acnoname,
                savebank: 1
            }, 
            success: function(data) {
                if (data) {
                    alert(data);
					//finalcheck();
                    var fs = document.getElementById("finalsubmit");
                    fs.style.display="block";
                    
                }
            }
        });

        return true;
    }
    else{

      return false;
    }
    
}


function fillbankfromtable(){
var reg = "<?php echo $reg; ?>"; 
$.ajax({
            type: 'POST', // or 'GET', depending on your needs
            url: 'response.php',
            data: { reg: reg , fillbank:1}, 
            success: function(data) {
              if(data){
                const parser = new DOMParser();
                const doc = parser.parseFromString(data, 'text/html');
				  // alert(data);
                  // alert(doc.getElementById("a").innerHTML);
				  if(doc.getElementById("a").innerHTML == "y"){
                  var bankname = document.getElementById("bankname"); 
				  bankname.value = doc.getElementById("bankname").innerHTML; 					
                  var branchname =document.getElementById("branchname");
                  branchname.value =  doc.getElementById("branchname").innerHTML; 
                  var acno = document.getElementById("acno");
                  acno.value =  doc.getElementById("acno").innerHTML;                  
                  var ifsccode = document.getElementById("ifsccode");
                  ifsccode.value =  doc.getElementById("ifsc").innerHTML;                  
                  var acholdername = document.getElementById("acholdername");
                  acholdername.value =  doc.getElementById("acnoname").innerHTML;
                 // var fs = document.getElementById("finalsubmit");
                 // fs.style.display="block";
				  }
                
              }
 
            }
        });
        

}

function saveuploadqualedu(){
  if(UploadDoc ()){
      var formDataedu = new FormData(document.getElementById("test2"));

        $.ajax({
            type: 'POST', 
            url: 'response.php',
            data: formDataedu, 
            contentType : false,
            processData : false,
            success: function(data) {
              alert('Upload saved Successfully!');
            
            },
            error: function(xhr, textStatus, errorThrown) {
        console.error('AJAX error:', textStatus, errorThrown);
      }
        });
        return true;

      }

}




$(document).ready(function() {
    $("#psNextButton").click(function() {
        PSNext();
    });
});

function logoutFunction() {
          
          
            // Redirect to a logout page or homepage
            loaderon();
            window.location.href = 'logout.php';
        }


//Bank Details validation 
function checkbankname(input) {
    // Regular expression to match only alphabets and spaces
    var regex = /^[a-zA-Z\s]*$/;
    
    // Test the input value against the regex
    if (!regex.test(input.value)) {
        // If the input doesn't match, clear the input field and show an alert
        input.value = "";
        alert("Only alphabets and spaces are allowed.");

        input.focus();
    }
}

function checkbranchname(input) {
    // Regular expression to match only alphabets and spaces
    var regex = /^[a-zA-Z0-9\s]*$/;
    
    // Test the input value against the regex
    if (!regex.test(input.value)) {
        // If the input doesn't match, clear the input field and show an alert
        input.value = "";
        alert("Only alphabets , Numbers and spaces are allowed.");

        input.focus();
    }
}

function checkaccountno(input) {
    // Regular expression to match only alphabets and spaces
    var regex = /^[a-zA-Z0-9]*$/;
    
    // Test the input value against the regex
    if (!regex.test(input.value)) {
        // If the input doesn't match, clear the input field and show an alert
        input.value = "";
        alert("Only alphabets and Numbersare allowed.");

        input.focus();
    }
}

function ifsccodes(input) {
    var regex = /^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;

    // Test the input value against the regex
    if (!regex.test(input)) {
        // If the input doesn't match, clear the input field and show an alert
        document.getElementById('ifsccode').value = "";
        alert("Invalid IFSC code. Please enter a valid IFSC code.");
        // Set focus back to the input field
        document.getElementById('ifsccode').focus();
    }
}



function onloadboddycall(){
	//loaderon();
  loadmain();
  filladdressfromtable();
  filluploadsfromtable();
  fillphotosignfromtable();
  fillbankfromtable();
  freezeform();
}
function saveupload(){

  saveuploadqualedu();
  filluploadsfromtable();

}
function freeze(){
	
    if(finalCheck()){
		savebank();
      //finalPrint();
      //freezeform();
    }
  
}

function loaderon(){
	var preloader = document.getElementById("loading");
	preloader.style.display="block";
	var x = document.getElementById("mainbody");
	x.style.display="none";

}
</script>
</head>
<!-- <body  onload="loadmain();setTimeout(filluploadsfromtable, 200);filladdressfromtable();fillbankfromtable();fillphotosignfromtable();freezeform();" > -->
<body  onload="onloadboddycall();" >
<div id="loading" style="display:none">Loading...</div>
    <!-- Header -->
	<div id="mainbody" style="display:block">
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

        <div class="tab" id="fadein1" style="display:none;" >Bank Details</div>
        <div class="tab" id="fadein2" style="display:none;" >Photograph & Signature</div>
        <div class="tab" id="fadein3" style="display:none;" >Education Details</div>
        <div class="tab" id="fadein4" style="display:none;" >Basic Information</div>

        <?php
       /*  $sqlprint = "SELECT status FROM register WHERE regno LIKE '$reg'";
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
        } */
        ?>
    
  </div>

  <div class="tab-content" id="tabContent1" >

  <div id="main">
                <div class="cl">&nbsp;</div>

                <!-- Content -->
                <div id="content" >
                    <!-- Box -->
                    <div class="box" id="loginform" >
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2 class="left">BANK DETAILS</h2>
                        </div>
                        <!-- End Box Head -->

                        <!-- Table -->
                        <div>
                            <form method="post" action="" name="test4" id="test4" autocomplete="off">
                                

                                <div id="prntdiv">

                                    
                                        &nbsp;&nbsp;
                                        <table id="bankDetailsTable" class="front" style="background:transparent;font-size:14px;">
                                        <tbody>
                                            <tr>
                                            <td width="49%"><strong class="req" style="padding-left:20px;">Bank Name </strong></td>
                                            <td width="51%">
                                            <input style="border: solid 1px #4AB8FF;" placeholder="Enter Bank Name" maxlength="50" type="textbox" name="bankname" id="bankname" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="checkbankname(this);" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="req" style="padding-left:20px;">Branch Name</strong></td>
                                            <td>
                                            <input style="border: solid 1px #4AB8FF;" placeholder="Enter Branch Name" maxlength="50" type="text" name="branchname" id="branchname" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="checkbranchname(this);" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong class="req"  style="padding-left:20px;">A/C no.</strong></td>
                                            <td>
                                            <input style="border: solid 1px #4AB8FF;" placeholder="Enter Account Number" maxlength="25" type="text" name="acno" id="acno" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="checkaccountno(this);" required><br>
                                            <span class="note"> [Note : As mentioned in NATS Portal -Aadhar linked Bank Account]</span></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="req" style="padding-left:20px;">IFSC Code</strong></td>
                                            <td>
                                            <input style="border: solid 1px #4AB8FF;" placeholder="Enter IFSC Code" maxlength="11" type="text" name="ifsccode" id="ifsccode" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="ifsccodes(this.value);" required></td>
                                        </tr>
                                        <tr>
                                            <td><strong class="req" style="padding-left:20px;">Account Holders Name</strong></td>
                                            <td>
                                            <input style="border: solid 1px #4AB8FF;" placeholder="Enter Account Holder Name" maxlength="50" type="text" name="acholdername" id="acholdername" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="checkbankname(this);" required>
                                            </td>
                                        </tr>
                                                                     
                                        <tr>
                                            <td align="center" colspan="2">
                                                <strong style="padding-top:5px; color:#993333;"></strong><br><br>
                                                <input type="button" id="backButton" onclick="changeTab(1);" value="Back" class="button">        
                                                <input type="button" id="" class="button" name="submit" onclick="return savebank();" value="Save Details" >
                                            </td>
                                        </tr>
                                        <tr>
                                              <td align="center" colspan="2">
                                                  <input type="checkbox" id="agreementCheckbox" name="agreementCheckbox">
                                                  <label for="agreementCheckbox">
                                                      <strong>
                                                      I hereby declare that the entries made by me in the application form are complete and true to the best of my knowledge and based on records. I further declare that my candidature may be cancelled at any stage , if I am found ineligible for and /or the information provided by me is found to be incorrect/incomplete.
                                                      </strong>
                                                  </label>
                                                  <br>
                                                  <input style="display:none;" type="button" id="finalsubmit" class="button" name="finalsubmit" value="Final Submit" onclick="freeze(); ">
                                                  <!--input style="display:none;" type="button" id="printthispage" class="button" name="printthispage" value="Print Application" onclick="finalPrint();"-->
                                              </td>
                                          </tr>
                                        </tbody>
                                      </table>                                                                           
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

  </div>

  <div class="tab-content" id="tabContent2">
  <div id="main">
                <div class="cl">&nbsp;</div>

                <!-- Content -->
                <div id="content" >
                    <!-- Box -->
                    <div class="box" id="loginform" >
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2 class="left">Photograph & Signature</h2>
                        </div>
                        <!-- End Box Head -->

                        <!-- Table -->
                        <div>
                            <form method="post" action="main_form.php" enctype="multipart/form-data" name="test3" id="test3" autocomplete="off">
                                

                                <div id="prntdiv">

                                    
                                        &nbsp;&nbsp;
                                        <table class="front" style="background:transparent;font-size:14px;">
                                        <tbody>
                                        <tr>
                                            <td width="30%" class="td1" ><strong class="req" style="padding-left:20px;">Upload Photograph</strong></td>
                                            <td>
                                            <input type="file" value="Choose file" id="UploadPhoto" name="UploadPhoto" accept="image/jpg,image/jpeg,image/png" onchange="validateFileSizep();validateImageResolutionp();validateFilep();">
                                            <br>
                                            <span class="note"> [Note : Image resolution should be 200x200 pixels]</span>
                                            <br>
                                            <span class="note"> [Note : Size of photo should be less than 500 KB]</span>
                                            
                                            <!-- <div id="photoDisplay"></div> -->
                                            </td>
                                            <td style="display:none" id="uploadedPhoto1" ><img id="uploadedPhoto"  height="200px"width="200px">
                                            
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td width="30%" class="td1" ><strong class="req" style="padding-left:20px;">Upload Signature</strong></td>
                                            <td>
                                            <input type="file" value="Choose file" id="UploadSign" name="UploadSign" accept="image/jpg, image/jpeg,image/png" onchange="validateFileSizes();validateImageResolutions();validateFiles();"><br>
                                            <span class="note"> [Note : Size of signature should be less than 500 KB]</span>
                                            <br>
                                            <span class="note"> [Note : Image resolution should be 200x200 pixels]</span>
                                            </td>
                                            <td style="display:none" id="uploadedSign1"><img id="uploadedSign" height="200px"width="200px">
                                            </td>
                                        </tr>    
                                               
                                            
                                        <tr>
                                            <td align="center" colspan="3">
                                                <strong style="padding-top:5px; color:#993333;">Please Verify that the
                                                    above details are correct.</strong><br><br>
                                                <input type="button" id="backButton" onclick="changeTab(2);" value="Back" class="button">    
                                                <input type="submit"  class="button" name="submit" id="saveuploadps" value="Save Details" >
                                                <input type="button" id="psNextButton" value="Next" class="button">
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
        </div>

        <!-- End Container -->
 
  

  <div class="tab-content" id="tabContent3">
  <div id="main">
                <div class="cl">&nbsp;</div>

                <!-- Content -->
                <div id="content" >
                    <!-- Box -->
                    <div class="box" id="loginform" >
                        <!-- Box Head -->
                        <div class="box-head">
                            <h2 class="left">Uploads</h2>
                        </div>
                        <!-- End Box Head -->

                        <!-- Table -->
                        <div>
                            <form method="post" action="response.php" enctype="multipart/form-data"  id="test2" autocomplete="off" >
                                

                                <div id="prntdiv">

                                    
                                        &nbsp;&nbsp;
                                        
<!-- NEW -->
                                                  <table id ="certificateupload1" cellpadding="15" class="front" style="background:transparent;font-size:14px;">
                                            <tbody>
                                                    <tr>

                                            <td colspan="5" align="center" style = "background-color:light grey;">
                                                <strong>EDUCATIONAL QUALIFICATION</strong> </td>
                                            </tr> 
                                            <tr>
                                            
                                            <td colspan="2" style="text-align:center;">
                                            <strong class="req">Educational Qualification (Degree/Diploma)</strong>
                                            </td>
    
                                            <td colspan="2" >
                                            <input  maxlength="30" type="textbox" name="eq" id="eq"  size="30" readonly value="
                                            <?php
 if( $row['posta'] == "GRADUATE")
 {
 echo "Degree";
 }
 else if( $row['posta'] == "TECHNICIAN")
 {
   echo "Diploma";
 }



?>
                                           ">
                                            </td>
                                            <br>
                                            
                                              
                                            
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Field of Specialisation </strong></td>
                                            <td colspan="4" >
                                                <select name="selectOptions" id="selectOptions" >
                                                    
													 <?php
													 

 if( $row['posta'] == "GRADUATE" && $row['status'] == "S" && ISSET($row3['specialisation']) == "")
 {
	echo' <option value="f">--Select Field of Specialisation--</option>';
 echo "<option value='Mining Engineering'>Mining Engineering</option>";
 echo "<option value='Electrical Engineering'>Electrical Engineering</option>";
 echo "<option value='Mechanical Engineering'>Mechanical Engineering</option>";
 echo "<option value='Civil Engineering'>Civil Engineering</option>";
 echo "<option value='Electronics and Telecommunication Engineering'>Electronics and Telecommunication Engineering</option>";
				          
              
				          } 
				        else if( $row['posta'] == "TECHNICIAN" && $row['status'] == "S" && ISSET($row3['specialisation']) == "")
				          {
							  echo' <option value="f">--Select Field of Specialisation--</option>';
							   echo "<option value='Mining and Mine Surveying Engineering'>Mining and Mine Surveying Engineering</option>";
 echo "<option value='Electrical Engineering'>Electrical Engineering</option>";
 echo "<option value='Mechanical Engineering'>Mechanical Engineering</option>";
 echo "<option value='Civil Engineering'>Civil Engineering</option>";
 
				         
				          }
		 if(ISSET($row3['specialisation']) != "")  
			 echo "<option value='".$row3['specialisation']."'>".$row3['specialisation']."</option>";
							  



?>
                                                </select>
                                               
                                            </td>
                                        </tr>

                               

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Date of Passing of qualifying exam(Degree/Diploma)</strong></td>
                                            <td colspan="4"><input type="date" name="dop" min="2019-02-01" id="dop" value="" pattern="\d{4}-\d{2}-\d{2}" onblur="return chkdop(this);"><br>
                                            <span class="note"> [Note : Date of passing not earlier than 01 February 2019]</span><br>
                                            <span class="note"> [Note : If Exact Date is not available , select "01" day of month of passing exam]</span>
                                            </td>
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Institution Name from which passed qualifying exam(Degree/Diploma)</strong></td>
                                            <td colspan="4"><input placeholder="Enter Name of the Institute" maxlength="50" type="textbox" name="institute" id="institute" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="return chkupload(this);"></td>
                                            </tr>
                                            <tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">University Roll No./Enrollment No</strong></td>
                                            <td colspan="4"><input placeholder="Enter University Roll No./Enrollment No" maxlength="30" type="textbox" name="rollno" id="rollno" value="" size="30" onblur="capitaliseFirstLetter(this)" onchange="return chkupload1(this);"></td>
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Percentage of Marks in qualifying exam (Degree/Diploma)</strong></td>
                                            <td colspan="4" ><input name="percentd" id="percentd" placeholder="00.00"   maxlength="5" size="5" type="number"  min="1" max="100" step="0.01"onKeyUp=" if(this.value>100 || this.value<1){this.value='';}"><br>
                                            <span class="note"> [Note : Marks in CGPA should be properly converted into Percentage]</span></td>
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Percentage of Marks in SSC / HSC exam</strong></td>
                                            <td colspan="4" ><input name="percents" id="percents" placeholder="00.00"   maxlength="5" size="5" type="number"  min="1" max="100" step="0.01"onKeyUp=" if(this.value>100 || this.value<1){this.value='';}"><br>
                                            <span class="note"> [Note : For Degree- % age of Marks in HSC]</span><br>
                                            <span class="note"> [Note : For Diploma- % age of Marks in SSC]</span></td>
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Educational  Qualification (Degree/Diploma) upload.</strong></td>
                                            <td colspan="4" ><input type="file" value="Choose file" id="filenamed" name="filenamed" onchange="checkPdffile(this)" accept="/.pdf , /.PDF">
                                            <div style="display:inline;" id="uploadDegreeFile">
                                            <a  id="up1" ></a>
                                            </div>
                                            <br><span class="note">[Note : Please upload pdf of Diploma/Degree Certificate of size less than 1 MB only.]</span>
                                            
                                            </td>
                                            </tr>
                                    

                                                  </tbody>
                                                  </table>      
<!-- NEW -->
                                            <table id ="certificateupload2" cellpadding="15" class="front" style="background:transparent;font-size:14px;">
                                            <tbody>


                                            <td colspan="5" align="center" style = "background-color:light grey;">
                                                <strong>NATS REGISTRATION DETAILS</strong> </td>
                                            </tr> 
                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">NATS ID</strong></td>
                                            <td colspan="4"><input placeholder="Enter NATS ID" maxlength="30" type="textbox" name="regnoee" id="regnoee" value="" size="30" onblur="capitaliseFirstLetter(this)" onchange="return chkupload1(this);"></td>
                                            </tr>

                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Date of Registration in NATS portal</strong></td>
                                            <td colspan="4"><input type="date" name="dor" id="dor" value=""></td>
                                            </tr>
                          
                                            <tr>
                                            <td colspan="2" style="text-align:center;"><strong class="req">Upload NATS Registration Document</strong></td>
                                            <td colspan="4" ><input type="file" value="Choose file" id="filenameee" name="filenameee" onchange="checkPdffile(this)" accept="/.pdf , /.PDF">
                                            <div style="display:inline;" id="uploadRegistrationFile">
                                            <a  id="up5" ></a>
                                            </div>
                                            <br><span class="note">[Note : Please upload pdf of NATS Registration of size less than 1 MB  only.]</span></td>
                                            </tr>
                                            <tr>
                                            
                                            <td colspan="2" style="text-align:center;">
                                            <strong class="req">Have you undergone Apprenticeship Training in any organisation?</strong>
                                            </td>
    
                                            <td colspan="2" style="text-align:center;">
                                            <input type="radio" name="apprenticeship" id="apprenticeshipy" value="YES">
                                            <label for="apprenticeshipy">Yes</label>
                                            </td>
    
                                            <td colspan="2" style="text-align:center;">
                                            <input type="radio" name="apprenticeship" id="apprenticeshipn" value="NO">
                                            <label for="apprenticeshipn">No</label>
                                            </td>
                                            </tr>


                                            <tr>
                                            
                                            <td colspan="2" style="text-align:center;">
                                            <strong class="req">Have you obtained 1 year or more practical experience earlier?</strong>
                                            </td>
    
                                            <td colspan="2" style="text-align:center;">
                                            <input type="radio" name="experience" id="experiencey" value="YES">
                                            <label for="experiencey">Yes</label>
                                            </td>
    
                                            <td colspan="2" style="text-align:center;">
                                            <input type="radio" name="experience" id="experiencen" value="NO">
                                            <label for="experiencen">No</label>
                                            </td>
                                            </tr>
                                                  </tbody>
                                                  </table>


                                            <table id ="certificateupload4" cellpadding="15" class="front" style="background:transparent;font-size:14px;">
                                            <tbody>
     
                                            <!-- <tr>
                                            <td align="center" colspan="8"></td>
                                            </tr> -->
  
                                        <tr>
                                            <td align="center" colspan="8">
                                                <strong style="padding-top:5px; color:#993333;">Please Verify that the
                                                    above details are correct.</strong><br><br>
                                                <input type="button" id="backButton" onclick="changeTab(3);" value="Back" class="button">        
                                                <input type="text" name="reg" value="<?php echo "$reg" ?>" style="display: none;">
                                                <button type="button" onclick="saveupload();" id="saveuploadqual" class="button">Save Details</button>
                                                <button class="button" type="button" onclick="uploadDocNext();"  class="button">Next</button>
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
        </div>

        <!-- End Container -->
  
  <div class="tab-content"   id="tabContent4">
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
                                        <div class="box-head"> <h2 class="left">ADDRESS DETAILS</h2>
                                        </div>     
                                        <table class="front" style="background:transparent;font-size:14px;">
                                        <tbody>
                                        <tr>
                                            <td align="center" colspan="2">
                                            </td>
                                        </tr>  
                                        <tr class="verifyRow">
                                            <td colspan="2" align="center">
                                                <strong>COMMUNICATION ADDRESS</strong> </td>
                                        </tr> 
                                        <tr>
                                            <td width="30%" class="req"> <b>AT: </b> </td>
                                            <td>
                                                <input placeholder="AT" value=""  maxlength="50" type="textbox" name="atc" id="atc" value="" size="90" onblur="capitaliseFirstLetter(this)" onchange="return chknamea(this);">
                                                <br>
                                                <br><span class="note">[Note : Please do not use special character]</span>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>PO: </b> </td>
                                            <td>
                                                <input placeholder="Post Office" value="" maxlength="50" type="textbox" name="poc" id="poc" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="return chknameb(this);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>District:</b> </td>
                                            <td>
                                                <input placeholder="District" value="" maxlength="25" type="textbox" name="districtc" id="districtc" value="" size="25" onblur="capitaliseFirstLetter(this)" onchange="return chknameb(this);">
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>City:</b> </td>
                                            <td>
                                                <input placeholder="City" value="" maxlength="25" type="textbox" name="cityc" id="cityc" value="" size="25" onblur="capitaliseFirstLetter(this)" onchange="return chknameb(this);">
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>Pincode:</b> </td>
                                            <td>
                                                <input placeholder="Pincode" value="" maxlength="6" type="textbox" name="pincodec" id="pincodeid" onkeyup="return checkpincode(this.value)" onchange="validateInput()"  value="" size="6">
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"><b>State</b> </td>
                                            <td>
                                                <select name="statec" id="statec" >
                                                    <option Value="s">--Select State--</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Ladakh">Ladakh</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Pondicherry">Puducherry</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttaranchal">Uttaranchal</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2">
                                            </td>
                                        </tr>  
                                        <tr class="verifyRow">
                                            <td colspan="2" align="center">
                                                <strong>PERMANENT ADDRESS</strong> </td>
                                        </tr> 
                                        <tr>
                                            <td align="center" colspan="2">
                                                <input id="check" type = "checkbox" value = "check" name="check" onclick="filladd()">  Same as Communication Address
                                            </td>
                                        </tr>
                                        
                                        <td width="30%" class="req"> <b>AT:</b> </td>
                                            <td>
                                                <input placeholder="At" maxlength="50" type="textbox" name="atp" id="atp" value="" size="90" onblur="capitaliseFirstLetter(this)" onchange="return chknamea(this);">
                                                <br>
                                                <br><span class="note">[Note : Please do not use special character]</span>
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>PO: </b> </td>
                                            <td>
                                                <input placeholder="Post Office" maxlength="50" type="textbox" name="pop" id="pop" value="" size="50" onblur="capitaliseFirstLetter(this)" onchange="return chknameb(this);">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>District:</b> </td>
                                            <td>
                                                <input placeholder="District" maxlength="25" type="textbox" name="districtp" id="districtp" value="" size="25" onblur="capitaliseFirstLetter(this)" onchange="return chknameb(this);">
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>City:</b> </td>
                                            <td>
                                                <input placeholder="City" maxlength="25" type="textbox" name="cityp" id="cityp" value="" size="25" onblur="capitaliseFirstLetter(this)" onchange="return chknameb(this);">
                                                <br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="30%" class="req"> <b>Pincode:</b> </td>
                                            <td>
                                                <input placeholder="Pincode" maxlength="6" type="textbox" name="pincodep" id="pincodep" value="" size="6" onkeyup="return checkpincodee(this.value)" onchange="validateInputt()">
                                                <br>
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td width="30%" class="req"><b>State</b> </td>
                                            <td>
                                            <!-- onmousedown="if(this.options.length>3){this.size=3;}"  onchange='this.size=0;' onblur="this.size=0;" -->
                                                <select name="statep" id="statep" >
                                                    <option value="ss">--Select State--</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Ladakh">Ladakh</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Pondicherry">Puducherry</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Telangana">Telangana</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttaranchal">Uttaranchal</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                </select>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" colspan="2">
                                                <strong style="padding-top:5px; color:#993333;">Please Verify that the
                                                    above details are correct.</strong><br><br>
                                                <!-- <input type="button" id="backButton" value="Back" class="button">         -->
                                                <input type="submit" id="saveaddress" class="button" name="submit" value="Save Details" >
                                                <input type="button" onclick="AddressFormNext();" value="Next" class="button">
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
        </div>

        <!-- End Container -->
  </div>


</div>

       

<center> <br> 
  <span style="font-size:12px;" >Best viewed in latest versions of <strong>Google Chrome Version 122 or above</strong>/<strong>Firefox Version 123 or above</strong>.</span>
  <br><span style="font-size:12px;" >Copyright © <?php echo date('Y'); ?>
              <a href="https://www.secl-cil.in" target="_blank">SECL</a>. All rights reserved.</span></center>
			
	</div>	
<script>
        document.onreadystatechange = function () {
            if (document.readyState !== "complete") {
                document.querySelector(
                    "#mainbody").style.visibility = "hidden";
                document.querySelector(
                    "#loading").style.visibility = "visible";
            } else {
                document.querySelector(
                    "#loading").style.display = "none";
                document.querySelector(
                    "#mainbody").style.visibility = "visible";
            }
        };
    </script>
	<script src="jquery.min.js" ></script>
  </body>  
  </html>