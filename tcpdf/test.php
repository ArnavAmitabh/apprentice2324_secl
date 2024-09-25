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
    @page {size:landscape;}
    .bordered-element {
    /* border: 1px solid black; */
    }
}
@media print {
            header, footer {
                display: none;
            }
        }
</style>



<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "apprentice";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the database
$sql = "SELECT *  FROM register";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bordered Table Example</title>
    <style>
        /* Add some basic styling to the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body onload='hello();'>
<button class="btn btn-danger" onclick="hello();" id="printButton"><i class="fa fa-print"></i> Print This Page </button>
    <h2>Bordered Table Example</h2>

    <table>
        <thead>
            <tr>
                <th>Header 1</th>
                <th>Header 2</th>
              
            </tr>
        </thead>
        <tbody>
        <?php
// Check if there are records
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {





?>


            <tr>
                <td>userid</td>
                <td><?php echo $row['regno']; ?></td>
  
            </tr>
            <tr>
                <td>Name</td>
                <td><?php echo $row['fstname']; ?></td>

            </tr>
            <tr>
                <td>photo</td>
               
                <td> <img src="./upload_photo_sign/<?php echo $row['photo']; ?>" alt="no photo"> </td>

            </tr>
            <!-- Add more rows as needed -->


<?php

}
}


// Close the database connection
$conn->close();
?>
        </tbody>
    </table>
    <img src="/upload_photo_sign/<?php echo $row['photo']; ?>" alt="no photo"> 
</body>
</html>