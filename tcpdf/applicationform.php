<?php
require_once('library/tcpdf.php');

// Create instance of TCPDF
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Database Data to PDF');

// Add a page
$pdf->AddPage();

// Set font for the title
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Database Data to PDF', 0, 1, 'C'); // Centered title
$pdf->SetFont('helvetica', '', 12); // Reset font for the content

// Database connection
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
$sql = "SELECT regno, fstname, fatherfstname FROM register";
$result = $conn->query($sql);

// Check if there are records
if ($result->num_rows > 0) {
    // Add table with borders
    $pdf->SetFillColor(200, 220, 255); // Background color for header
    $pdf->SetTextColor(0); // Text color

    // Loop through the result set and add data to the PDF
    while ($row = $result->fetch_assoc()) {
        $labelText = 'PLEASE PROVIDE E-MAIL ID AND MOBILE NO. SAME AS NATS PORTAL';
        $dataText = ''; // You can add your data here

        // Set the font size for the label
        $pdf->SetFont('helvetica', '', 10);

        // Add label and data to the table
        $pdf->MultiCell(60, 10, $labelText, 1,0, 'L', true); // Label
        $pdf->MultiCell(0, 10, $dataText, 1,1, 'L'); // Data

        // Reset font size for subsequent cells
        $pdf->SetFont('helvetica', '', 12);

        // Add other cells similarly

        // Add label and data to the table
        $pdf->Cell(60, 10, 'PLEASE PROVIDE E-MAIL ID AND MOBILE NO. SAME AS NATS PORTAL', 1, 0, 'L', true); // Label
        //$pdf->Cell(0, 10, $row['regno'], 1, 1, 'L'); // Data
        $pdf->Cell(0, 10,'' , 1, 1, 'L'); // Data

        $pdf->Cell(60, 10, 'LAST DATE OF SUBMISSION OF APPLICATION 28.01.2023 ( 12.00 hrs. Midnight)', 1, 0, 'L', true); // Label
        $pdf->Cell(0, 10,'' , 1, 1, 'L'); // Data

        $pdf->Cell(60, 10, 'AFTER SUBMISSION OF APPLICATION FORM, CANDIDATE WILL RECEIVE A SYSTEM GENERATED EMAIL.CANDIDATES ARE REQUIRED TO : a) PRINT THE RECEIVED E MAIL b)PASTE RECENT PASSPORT SIZE PHOTOGRAPH HERE AND PUT SIGNATURE AT THE LAST PAGE OF APPLICATION C) DULY COMPLETED APPLICATION FORM TO BE SUBMITTED DURING DOCUMENT VERIFUICATION. BY SUBMITTING THE APPLICATION FORM IT SHALL BE ASSUMED INFORMATION IS CORRECT ,IF FOUND FALSE/INCORRECT/INCOMPLETE, THE CANDIDATURE SHALL BE CANCELLED AT ANY STAGE.', 1, 0, 'L', true); // Label
        $pdf->Cell(0, 10, '', 1, 1, 'L'); // Data

        $pdf->Ln(); // Move to the next line
    }
} else {
    $pdf->Cell(0, 10, 'No records found', 0, 1);
}

// Close the database connection
$conn->close();

// Output the PDF to the browser or save it to a file
$pdf->Output('applicationform.pdf', 'I');
?>
