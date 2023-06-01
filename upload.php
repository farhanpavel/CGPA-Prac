<?php
// Code to handle file upload and CGPA calculation
require_once 'F:/Php/vendor/autoload.php'; // Include PHPExcel library

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file']['tmp_name'];

    // Load the Excel file
    $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet = $reader->load($file);

    // Access the required sheet (assuming it's the first sheet)
    $sheet = $spreadsheet->getActiveSheet();

    // Get the highest row number (assuming data starts from the first row)
    $lastRow = $sheet->getHighestRow();

    $totalCredit = 0;
    $totalGradePoint = 0;

    // Loop through each row to calculate CGPA
    for ($row = 2; $row <= $lastRow; $row++) {
        // Assuming the grade is in column A and the credit hours in column B
        $percentage = $sheet->getCell('A' . $row)->getValue();
        $creditHours = $sheet->getCell('B' . $row)->getValue();

        // Calculate grade points based on the percentage range
        // Add more cases for other percentage ranges if needed
        if ($percentage >= 80) {
            $gradePoint = 4.0;
        } elseif ($percentage >= 75) {
            $gradePoint = 3.75;
        } elseif ($percentage >= 70) {
            $gradePoint = 3.5;
        } elseif ($percentage >= 65) {
            $gradePoint = 3.25;
        } elseif ($percentage >= 60) {
            $gradePoint = 3.0;
        } elseif ($percentage >= 55) {
            $gradePoint = 2.75;
        } elseif ($percentage >= 50) {
            $gradePoint = 2.5;
        } elseif ($percentage >= 45) {
            $gradePoint = 2.25;
        } elseif ($percentage >= 40) {
            $gradePoint = 2.0;
        } else {
            $gradePoint = 0.0;
        }

        // Update the total credit hours and total grade points
        $totalCredit += $creditHours;
        $totalGradePoint += $gradePoint * $creditHours;
    }

    // Calculate CGPA
    $cgpa = $totalGradePoint / $totalCredit;

    // Redirect back to the main page with the CGPA result
    header("Location: index.php?cgpa=" . $cgpa);
    exit();
}
?>
