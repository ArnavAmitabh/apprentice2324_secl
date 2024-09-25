<?php
include("header.php");
include("db.php");

//for address save
if(isset($_POST['atc'])) {

  // Application Number validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }

  // Address post validation
  if(isset($_POST['atc']) && preg_match('/^[A-Z0-9\/.\s,-]+$/', trim($_POST['atc'])) && strlen(trim($_POST['atc'])) > 0 && strlen(trim($_POST['atc'])) <= 50) {
      $atc = mysqli_real_escape_string($conn, trim($_POST['atc']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Communication Address')){window.location='login.php';}</script>";
  }

  // Post office post validation
  if(isset($_POST['poc']) && preg_match('/^[A-Z\s]+$/', trim($_POST['poc'])) && strlen(trim($_POST['poc'])) > 0 && strlen(trim($_POST['poc'])) <= 50) {
      $poc = mysqli_real_escape_string($conn, trim($_POST['poc']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Communication Post Office')){window.location='login.php';}</script>";
  }


// District post validation
if(isset($_POST['districtc']) && preg_match('/^[A-Z\s]+$/', trim($_POST['districtc'])) && strlen(trim($_POST['districtc'])) > 0 && strlen(trim($_POST['districtc'])) <= 25) {
  $districtc = mysqli_real_escape_string($conn, trim($_POST['districtc']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Communication District')){window.location='login.php';}</script>";
}

// City post validation
if(isset($_POST['cityc']) && preg_match('/^[A-Z\s]+$/', trim($_POST['cityc'])) && strlen(trim($_POST['cityc'])) > 0 && strlen(trim($_POST['cityc'])) <= 25) {
  $cityc = mysqli_real_escape_string($conn, trim($_POST['cityc']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Communication City')){window.location='login.php';}</script>";
}

// Pincode post validation
if(isset($_POST['pincodeid']) && (trim($_POST['pincodeid'])) && strlen(trim($_POST['pincodeid'])) == 6) {
  $pincodec = mysqli_real_escape_string($conn, trim($_POST['pincodeid']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Communication Pincode')){window.location='login.php';}</script>";
}

$statec = $_POST['statec'];

// Address post validation
if(isset($_POST['atp']) && preg_match('/^[A-Z0-9\/.\s,-]+$/', trim($_POST['atp'])) && strlen(trim($_POST['atp'])) > 0 && strlen(trim($_POST['atp'])) <= 50) {
  $atp = mysqli_real_escape_string($conn, trim($_POST['atp']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Permanent Address')){window.location='login.php';}</script>";
}

// Post Office post validation
if(isset($_POST['pop']) && preg_match('/^[A-Z\s]+$/', trim($_POST['pop'])) && strlen(trim($_POST['pop'])) > 0 && strlen(trim($_POST['pop'])) <= 50) {
  $pop = mysqli_real_escape_string($conn, trim($_POST['pop']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Permanent Post Office')){window.location='login.php';}</script>";
}

// District post validation
if(isset($_POST['districtp']) && preg_match('/^[A-Z\s]+$/', trim($_POST['districtp'])) && strlen(trim($_POST['districtp'])) > 0 && strlen(trim($_POST['districtp'])) <= 25) {
  $districtp = mysqli_real_escape_string($conn, trim($_POST['districtp']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Permanent District')){window.location='login.php';}</script>";
}

// City post validation
if(isset($_POST['cityp']) && preg_match('/^[A-Z\s]+$/', trim($_POST['cityp'])) && strlen(trim($_POST['cityp'])) > 0 && strlen(trim($_POST['cityp'])) <= 25) {
  $cityp = mysqli_real_escape_string($conn, trim($_POST['cityp']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Permanent City')){window.location='login.php';}</script>";
}

// Pincode post validation
if(isset($_POST['pincodep']) && (trim($_POST['pincodep'])) && strlen(trim($_POST['pincodep'])) == 6) {
  $pincodep = mysqli_real_escape_string($conn, trim($_POST['pincodep']));
} else {
  echo "<script type='text/javascript'>if(!alert('Invalid Permanent Pincode')){window.location='login.php';}</script>";
}

$statep = $_POST['statep'];

$query = "insert into address (regno,presat,prespo,presdistt,prescity,presstate,prespin,permat,permpo,permdistt,permcity,permstate,permpin,createdate) values ('$reg','$atc','$poc','$districtc','$cityc','$statec','$pincodec','$atp','$pop','$districtp','$cityp','$statep','$pincodep',NOW()) ON DUPLICATE KEY UPDATE presat = '$atc', prespo = '$poc', presdistt = '$districtc', prescity = '$cityc', presstate = '$statec', prespin = '$pincodec',permat = '$atp', permpo = '$pop', permdistt = '$districtp', permcity = '$cityp', permstate = '$statep', permpin = '$pincodep' , moddate = NOW()";

try {
  if ($conn->query($query) === TRUE) {
      echo "Basic Information saved successfully!";
  } else {
      "Error: " . $query . "<br>" . $conn->error;
  }
} catch (Exception $e) {
  echo "An error occurred: " . $e->getMessage(); 
}
}

// Send address details
if(isset($_POST['reg']) && isset($_POST['filladdress'])) {
  // Application Number Validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }
  
  $sql2 ="SELECT * FROM address A, register R WHERE A.regno LIKE '$reg' and R.regno LIKE '$reg'";    
  $result2 = mysqli_query($conn, $sql2);
  $rowcount = mysqli_num_rows($result2);
  
  if($rowcount != 0) {
      while($row2 = $result2->fetch_assoc()) {
          break;
      }
      echo "<div id='check'>y</div>";
      echo "<div id='posta'>".$row2['posta']."</div>";
      echo "<div id='presat'>".$row2['presat']."</div>";
      echo "<div id='prespo'>".$row2['prespo']."</div>";
      echo "<div id='presdistt'>".$row2['presdistt']."</div>";
      echo "<div id='prescity'>".$row2['prescity']."</div>";
      echo "<div id='presstate'>".$row2['presstate']."</div>";
      echo "<div id='prespin'>".$row2['prespin']."</div>";
      echo "<div id='permat'>".$row2['permat']."</div>";
      echo "<div id='permpo'>".$row2['permpo']."</div>";
      echo "<div id='permdistt'>".$row2['permdistt']."</div>";
      echo "<div id='permcity'>".$row2['permcity']."</div>";
      echo "<div id='permstate'>".$row2['permstate']."</div>";
      echo "<div id='permpin'>".$row2['permpin']."</div>";
  } else {
      echo "<div id='check'>n</div>";
  }
  
  $sql2 = "SELECT * FROM education where regno LIKE '$reg'";    
  $result2 = mysqli_query($conn, $sql2);
  $rowcount = mysqli_num_rows($result2);
  
  if($rowcount != 0) {
      while($row2 = $result2->fetch_assoc()) {
          break;
      }
      echo "<div id='specialisation'>".$row2['specialisation']."</div>";
  } else {
      echo "<div id='specialisation'>n</div>";
  }
}

// Basic info address check
if(isset($_POST['reg']) && isset($_POST['checkBasicInfo'])) {
  $totalRows = 0;
  // Application Number validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }
  $sql = "SELECT COUNT(*) as total_rows FROM address where regno like '$reg'";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $totalRows = $row['total_rows'];
      echo $totalRows;
  } else {
      echo $totalRows;
  }
}

// Freeze Form Logic
if(isset($_POST['reg']) && isset($_POST['freezeform'])) {
  // Application Number Validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }

  $sql2 = "SELECT * FROM register WHERE regno LIKE '$reg'";
  $result2 = mysqli_query($conn, $sql2);
  $rowcount = mysqli_num_rows($result2);
  
  if($rowcount != 0) {
      while($row2 = $result2->fetch_assoc()) {
          break;
      }
      echo "<div id='status'>".$row2['status']."</div>";
  }
}

//Final Submit Logic
if(isset($_POST['reg']) && isset($_POST['finalsubmit'])) {
  // Application Number
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }

  $sqlm = "UPDATE register SET status = 'A', moddate=NOW() where regno = '$reg'";
  if ($conn->query($sqlm) === TRUE) {
  } 
}

// For upload save 

//Education details save
if(isset($_POST['institute'])) {
  // Application Number validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }

  $target_dir = "upload_pdf_files/";
  $temp1 = str_split($reg,14);

  // Institute Post Validation
  if(isset($_POST['institute']) && preg_match('/^[a-zA-Z0-9\s]+$/', trim($_POST['institute'])) && strlen(trim($_POST['institute'])) > 0 && strlen(trim($_POST['institute'])) <= 50) {
      $institute = mysqli_real_escape_string($conn, trim($_POST['institute']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Institute Name')){window.location='login.php';}</script>";
  }
  
  // DOP Post Validation
  if(isset($_POST['dop']) && strtotime($_POST['dop']) && strlen(trim($_POST['dop'])) == 10) {
      $dop = $_POST['dop'];
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Date of Passing')){window.location='login.php';}</script>";
  }

  // Roll No Post Validation
  if(isset($_POST['rollno']) && strlen(trim($_POST['rollno'])) > 0 && strlen(trim($_POST['rollno'])) <= 30) {
      $rollno = mysqli_real_escape_string($conn, trim($_POST['rollno']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Roll No')){window.location='login.php';}</script>";
  }

  // Percentage Post Validation
  if(isset($_POST['percentd']) && is_numeric($_POST['percentd']) && ($_POST['percentd'] >= 1 && $_POST['percentd'] <= 100)) {
      $percentd = $_POST['percentd']; 
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Percentage')){window.location='login.php';}</script>";
  }

  // Percentage Post Validation
  if(isset($_POST['percents']) && is_numeric($_POST['percents']) && ($_POST['percents'] >= 1 && $_POST['percents'] <= 100)) {
      $percents = $_POST['percents']; 
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Percentage')){window.location='login.php';}</script>";
  }

  // Qualification Post Validation
  if(isset($_POST['eq']) && in_array(trim($_POST['eq']), ['Degree', 'Diploma'])) {
      $qualification = $_POST['eq'];
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Qualification')){window.location='login.php';}</script>";
  }

  $specialisation = $_POST['selectOptions'];

  // File Post Validation
  $target_filem = $target_dir .$temp1[1]."_docqualification.pdf";

  if($_FILES['filenamed']['name'] != "") {
      if(isset($_FILES['filenamed']) && $_FILES['filenamed']['error'] === UPLOAD_ERR_OK && in_array(pathinfo($_FILES['filenamed']['name'], PATHINFO_EXTENSION), ['pdf', 'PDF']) && strlen(pathinfo($_FILES['filenamed']['name'], PATHINFO_FILENAME)) <= 50 && $_FILES['filenamed']['size'] < 1024 * 1024) {
          if(move_uploaded_file($_FILES["filenamed"]["tmp_name"], $target_filem)) {
              $filem = $temp1[1]."_docqualification.pdf";
          }
      } else {
          $sql = "SELECT filename FROM education WHERE regno = '$reg'";
          $result2 = mysqli_query($conn, $sql);
          $row2 = $result2->fetch_assoc();
          $filem = $row2['filename'];
      }
  } else {
      $sql = "SELECT filename FROM education WHERE regno = '$reg'";
      $result2 = mysqli_query($conn, $sql);
      $row2 = $result2->fetch_assoc();
      $filem = $row2['filename'];
      echo "<script type='text/javascript'>if(!alert('Invalid Degree/Diploma file')){window.location='login.php';}</script>";
  }

  $check_sql = "SELECT regno FROM education WHERE regno = '$reg'";
  $result_check_sql = $conn->query($check_sql);

  if($result_check_sql->num_rows > 0) {
      // Update the existing record
      $sqlm = "UPDATE education SET institute = '$institute', dop = '$dop', rollno = '$rollno', percentd = '$percentd', percents = '$percents', qualification = '$qualification', specialisation = '$specialisation', filename = '$filem', moddate = NOW() WHERE regno = '$reg'";
      if($conn->query($sqlm) === TRUE) {
          echo "Education details updated";
      }
  } else {
      // Insert a new record
      $sqlm = "INSERT INTO education (regno, institute, dop, rollno, percentd, percents, qualification, specialisation, filename, createdate) VALUES ('$reg', '$institute', '$dop', '$rollno', '$percentd', '$percents', '$qualification', '$specialisation', '$filem', NOW())";
      if($conn->query($sqlm) === TRUE) {
          echo "Education details inserted";
      }
  }

  // NATS Details Save
  // NATS Post Validation
  if(isset($_POST['regnoee']) && strlen(trim($_POST['regnoee'])) > 0 && strlen(trim($_POST['regnoee'])) <= 30) {
      $regnoee = mysqli_real_escape_string($conn, trim($_POST['regnoee']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid NATS ID')){window.location='login.php';}</script>";
  }

  // DOR Post Validation
  if(isset($_POST['dor']) && strtotime($_POST['dor']) && strlen(trim($_POST['dor'])) == 10) {
      $dor = $_POST['dor'];
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Date of Registration')){window.location='login.php';}</script>";
  }

  // Experience Post Validation
  if(isset($_POST['apprenticeship']) && in_array(trim($_POST['apprenticeship']), ['YES', 'NO'])) {
      $apprenticeship = $_POST['apprenticeship'];
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Apprenticeship')){window.location='login.php';}</script>";
  }

  // NATS File Post Validation
  $target_fileee = $target_dir .$temp1[1]."_docnatsregistration.pdf";

  if($_FILES['filenameee']['name'] != '') {
      if(isset($_FILES['filenameee']) && $_FILES['filenameee']['error'] === UPLOAD_ERR_OK && in_array(pathinfo($_FILES['filenameee']['name'], PATHINFO_EXTENSION), ['pdf', 'PDF']) && strlen(pathinfo($_FILES['filenameee']['name'], PATHINFO_FILENAME)) <= 50 && $_FILES['filenameee']['size'] < 1024 * 1024) {
          if(move_uploaded_file($_FILES["filenameee"]["tmp_name"], $target_fileee)) {
              $fileee = $temp1[1]."_docnatsregistration.pdf";
          }
      } else {
          $sql = "SELECT filename from emp_exchange where regno = '$reg'";
          $result2 = mysqli_query($conn, $sql);
          $row2 = $result2->fetch_assoc();
          $fileee = $row2['filename'];
      }
  } else {
      $sql = "SELECT filename FROM emp_exchange WHERE regno = '$reg'";
      $result2 = mysqli_query($conn, $sql);
      $row2 = $result2->fetch_assoc();
      $fileee = $row2['filename'];
      echo "<script type='text/javascript'>if(!alert('Invalid Degree/Diploma file')){window.location='login.php';}</script>";
  }

  // Training Post Validation
  if(isset($_POST['experience']) && in_array(trim($_POST['experience']), ['YES', 'NO'])) {
      $experience = $_POST['experience'];
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Training')){window.location='login.php';}</script>";
  }

  $check_sql5 = "SELECT regno FROM emp_exchange WHERE regno = '$reg'";
  $result_check_sql5 = $conn->query($check_sql5);

  if($result_check_sql5->num_rows > 0) {
      // Update the existing record for Employee Exchange details
      $sqlee = "UPDATE emp_exchange SET natsid = '$regnoee', dor = '$dor', apprenticeship = '$apprenticeship', filename = '$fileee', training = '$experience', moddate = NOW() WHERE regno = '$reg'";
      if($conn->query($sqlee) === TRUE) {
          echo "NATS details updated";
      }
  } else {
      // Insert a new record for Employee Exchange details
      $sqlee = "INSERT INTO emp_exchange (regno, natsid, dor, apprenticeship, filename, training, createdate) VALUES ('$reg', '$regnoee', '$dor', '$apprenticeship', '$fileee', '$experience', NOW())";
      if($conn->query($sqlee) === TRUE) {
          echo "NATS details inserted";
      }
  }
}

// Send upload details
if(isset($_POST['reg']) && isset($_POST['upload'])) {
  // Application Number validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }

  $sqles = "SELECT * FROM education WHERE regno LIKE '$reg'";
  $resultes = mysqli_query($conn, $sqles);
  $rowcountes = mysqli_num_rows($resultes);
  if($rowcountes != 0) {
      while($rowes = $resultes->fetch_assoc()) {
          break;
      }
      echo "<div id='a'>y</div>";
      echo "<div id='institute'>".$rowes['institute']."</div>";
      echo "<div id='dop'>".$rowes['dop']."</div>";
      echo "<div id='rollno'>".$rowes['rollno']."</div>";
      echo "<div id='percentd'>".$rowes['percentd']."</div>";
      echo "<div id='percents'>".$rowes['percents']."</div>";
      echo "<div id='specialisation'>".$rowes['specialisation']."</div>";
      echo "<div id='qualification'>".$rowes['qualification']."</div>";
      if($rowes['filename'] != '') {
          echo "<div id='filename'>"."./upload_pdf_files"."/".$rowes['filename']."</div>";
      } else {
          echo "<div id='filename'>"."a"."</div>";
      }
  } else {
      echo "<div id='a'>n</div>";
  }

  // NATS Send Details
  $sqlee1 = "SELECT * FROM emp_exchange WHERE regno LIKE '$reg'";
  $resultee1 = mysqli_query($conn, $sqlee1);
  $rowcountee1 = mysqli_num_rows($resultee1);
  if($rowcountee1 != 0) {
      while($rowee1 = $resultee1->fetch_assoc()) {
          break;
      }
      echo "<div id='a'>y</div>";
      echo "<div id='natsid'>".$rowee1['natsid']."</div>";
      echo "<div id='dor'>".$rowee1['dor']."</div>";
      echo "<div id='apprenticeship'>".$rowee1['apprenticeship']."</div>";
      echo "<div id='training'>".$rowee1['training']."</div>";
      if($rowee1['filename'] != '') {
          echo "<div id='filename1'>"."./upload_pdf_files"."/".$rowee1['filename']."</div>";
      } else {
          echo "<div id='filename1'>"."a"."</div>";
      }
  } else {
      echo "<div id='a'>n</div>";
  }
}

// Upload  check
if(isset($_POST['reg']) && isset($_POST['checkUploadDoc'])) {
  // Application Number Validation
  if(isset($_POST['reg']) && strlen(trim($_POST['reg'])) > 0 && strlen(trim($_POST['reg'])) < 21 && preg_match("/^SECL\/23-24\/HRD\/\d{5}$/", ($_POST['reg']))) {
      $reg = mysqli_real_escape_string($conn, trim($_POST['reg']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Application Number.')){window.location='login.php';}</script>";
      exit();
  }
  $sqlcu = "SELECT COUNT(*) as total_rows FROM education WHERE regno LIKE '$reg'";
  $resultcu = $conn->query($sqlcu);
  if($resultcu->num_rows > 0) {
      $rowcu = $resultcu->fetch_assoc();
      $totalRowscu = $rowcu['total_rows'];
      echo $totalRowscu;
  } else {
      echo $totalRowscu;
  }
}

// For photo and signature save
if(isset($_FILES['UploadPhoto']) || isset($_FILES['UploadSign'])) {
  $reg = $_POST['reg'];
  $target_dir = "upload_photo_sign/";
  $temp1 = str_split($reg, 14);

// Photo and Signature post validation

  if(isset($_FILES['UploadPhoto']) && $_FILES['UploadPhoto']['name'] != '') {
      $target_file1 = $target_dir .$temp1[1]."_photo.jpg";
      if(move_uploaded_file($_FILES["UploadPhoto"]["tmp_name"], $target_file1)) {
          $sql = "UPDATE register SET photo = '$temp1[1]_photo.jpg', moddate = NOW() WHERE regno LIKE '$reg' ";
          if($conn->query($sql) === TRUE) {
          }
      }
     
  }

  if(isset($_FILES['UploadSign']) && $_FILES['UploadSign']['name'] != '') {
      $target_file2 = $target_dir .$temp1[1]."_sign.jpg";
      if(move_uploaded_file($_FILES["UploadSign"]["tmp_name"], $target_file2)) {
          $sql = "UPDATE register SET signature = '$temp1[1]_sign.jpg', moddate = NOW() WHERE regno LIKE '$reg' ";
          if($conn->query($sql) === TRUE) {
          }
      }
      
  }
  echo "<div id='photo'>".$target_dir.$temp1[1]."_photo.jpg</div>";
  echo "<div id='sign'>".$target_dir.$temp1[1]."_sign.jpg</div>";
  echo "<div id='alertshow'> Photo and Signature Saved Successfully!</div>";    
}

// Photo and signature check
if(isset($_POST['reg']) && isset($_POST['ps'])) {
  $reg = $_POST['reg'];
  $sql = "SELECT * FROM register WHERE regno LIKE '$reg'";
  $result = mysqli_query($conn, $sql);  
  $row = $result->fetch_assoc();
  if(!empty($row['photo']))
      echo "1";
  else
      echo "0";
}

// Bank details
if(isset($_POST['savebank'])) {
  $reg = $_POST['reg'];

  // Bank post validation
  if(isset($_POST['bankname']) && preg_match('/^[a-zA-Z\s]*$/', trim($_POST['bankname'])) && strlen(trim($_POST['bankname'])) > 0 && strlen(trim($_POST['bankname'])) <= 50) {
      $bankname = mysqli_real_escape_string($conn, trim($_POST['bankname']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Bank Name')){window.location='login.php';}</script>";
  }

  // Branch post validation
  if(isset($_POST['branchname']) && preg_match('/^[a-zA-Z0-9\s]*$/', trim($_POST['branchname'])) && strlen(trim($_POST['branchname'])) > 0 && strlen(trim($_POST['branchname'])) <= 50) {
      $branchname = mysqli_real_escape_string($conn, trim($_POST['branchname']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Branch Name')){window.location='login.php';}</script>";
  }

  // Account Number post validation
  if(isset($_POST['acno']) && preg_match('/^[a-zA-Z0-9]*$/', trim($_POST['acno'])) && strlen(trim($_POST['acno'])) > 0 && strlen(trim($_POST['acno'])) <= 25) {
      $acno = mysqli_real_escape_string($conn, trim($_POST['acno']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Account Number')){window.location='login.php';}</script>";
  }

  // IFSC Post Validation
  if(isset($_POST['ifsc']) && preg_match('/^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/', trim($_POST['ifsc'])) && strlen(trim($_POST['ifsc'])) > 0 && strlen(trim($_POST['ifsc'])) <= 11) {
      $ifsc = mysqli_real_escape_string($conn, trim($_POST['ifsc']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid ISFC')){window.location='login.php';}</script>";
  }

  // Account Holder name Post validation
  if(isset($_POST['acnoname']) && preg_match('/^[a-zA-Z\s]*$/', trim($_POST['acnoname'])) && strlen(trim($_POST['acnoname'])) > 0 && strlen(trim($_POST['acnoname'])) <= 50) {
      $acnoname = mysqli_real_escape_string($conn, trim($_POST['acnoname']));
  } else {
      echo "<script type='text/javascript'>if(!alert('Invalid Account Holder Name')){window.location='login.php';}</script>";
  }

  $query = "INSERT INTO bank (regno, bankname, branchname, acno, ifsc, acnoname, createdate) VALUES ('$reg','$bankname','$branchname','$acno','$ifsc','$acnoname',NOW())
  ON DUPLICATE KEY UPDATE
              bankname = '$bankname', branchname = '$branchname', acno = '$acno', ifsc = '$ifsc', acnoname = '$acnoname', moddate = NOW()";
  try {
      if ($conn->query($query) === TRUE) {
          echo "Bank Details Saved Successfully!";
      } else {
          echo "Error: " . $query . "<br>" . $conn->error;
      }
  } catch (Exception $e) {
      echo "An error occurred: " . $e->getMessage(); 
      //  echo "Address already saved !You Cannot Modify the Details";
  }
}

// Send bank details
if(isset($_POST['reg']) && isset($_POST['fillbank'])) {
  $reg = $_POST['reg'];
  $sql2 = "SELECT * FROM bank WHERE regno LIKE '$reg'";
  $result2 = mysqli_query($conn, $sql2);
  $rowcount = mysqli_num_rows($result2);
  if($rowcount != 0) {
      while($row2 = $result2->fetch_assoc()) {
          break;
      }
      echo "<div id='a'>y</div>";
      echo "<div id='branchname'>".$row2['branchname']."</div>";
      echo "<div id='bankname'>".$row2['bankname']."</div>";
      echo "<div id='acno'>".$row2['acno']."</div>";
      echo "<div id='ifsc'>".$row2['ifsc']."</div>";
      echo "<div id='acnoname'>".$row2['acnoname']."</div>";
  } else {
      echo "<div id='a'>n</div>";
  }
}

$conn->close();

?>