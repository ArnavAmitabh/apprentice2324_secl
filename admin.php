<?php
session_start();
if (!(isset($_SESSION["email"]))) {
	
    header("Location: admin_login.php");
    exit();
  }
include("db.php");

// Fetch data from database
$sql = "SELECT 
    register.id, 
    register.regno, 
    register.fstname, 
    register.sex,
    register.community,
    register.dob,
    register.aadhar,
    address.permat, 
    address.permcity, 
    bank.bankname, 
    bank.acno, 
    education.institute, 
    education.qualification
FROM 
    register
JOIN 
    address ON register.regno = address.regno
JOIN 
    bank ON register.regno = bank.regno
JOIN 
    education ON register.regno = education.regno
WHERE register.status = 'A'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Data</title>
    <link rel="icon" type="image/x-icon" href="secllogo1.jpg">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
</head>
<body>
    <h1>Candidate Details</h1>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>RegNo</th>
                <th>FstName</th>
                <th>Sex</th>
                <th>Community</th>
                <th>DOB</th>
                <th>Aadhar</th>
                <th>Address</th>
                <th>City</th>
                <th>Bank</th>
                <th>AcNo</th>
                <th>Institute</th>
                <th>Qualification</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['id']) . "</td>
                            <td>" . htmlspecialchars($row['regno']) . "</td>
                            <td>" . htmlspecialchars($row['fstname']) . "</td>
                            <td>" . htmlspecialchars($row['sex']) . "</td>
                            <td>" . htmlspecialchars($row['community']) . "</td>
                            <td>" . htmlspecialchars($row['dob']) . "</td>
                            <td>" . htmlspecialchars($row['aadhar']) . "</td>
                            <td>" . htmlspecialchars($row['permat']) . "</td>
                            <td>" . htmlspecialchars($row['permcity']) . "</td>
                            <td>" . htmlspecialchars($row['bankname']) . "</td>
                            <td>" . htmlspecialchars($row['acno']) . "</td>
                            <td>" . htmlspecialchars($row['institute']) . "</td>
                            <td>" . htmlspecialchars($row['qualification']) . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='13'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Download'
                    }
                ]
            });
        });
    </script>
</body>
</html>

<?php
$conn->close();
?>