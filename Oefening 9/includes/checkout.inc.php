<?php
require '../../fpdf/fpdf.php';
include 'connect.inc.php';

function createPdfFile($id) {
    global $connection;

    $order_id = $id;

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Order ID:');
    $pdf->Cell(40, 10, $order_id);

    $pdf_file = 'order_' . $order_id . '.pdf';
    $pdf->Output('F', $pdf_file);

    $pdf_data = file_get_contents('order_' .$order_id . '.pdf');
    $pdf_data = mysqli_real_escape_string($connection, $pdf_data);

    $sql = "INSERT INTO orders (pdf) VALUES ('$pdf_data')";
    if ($connection->query($sql) === TRUE) {
        echo "PDF file saved to database.";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    echo ' <a href="' . $pdf_file . '">Download PDF</a>';
}