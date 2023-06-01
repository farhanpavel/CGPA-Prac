<!DOCTYPE html>
<html>
<head>
    <title>CGPA Calculator</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>CGPA Calculator</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" accept=".xlsx, .xls">
        <input type="submit" value="Calculate CGPA">
    </form>

    <?php
    // Display CGPA result if available
    if (isset($_GET['cgpa'])) {
        $cgpa = $_GET['cgpa'];
        echo "<div id='cgpaResult'>CGPA: $cgpa</div>";
    }
    ?>

    <script src="script.js"></script>
</body>
</html>
