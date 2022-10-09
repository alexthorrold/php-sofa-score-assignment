<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Patient Details</title>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>

<?php
$patientNHI = "";
$patientSurname = "";
$patientFirstName = "";

if (isset($_COOKIE["patient-nhi"])) {
    $patientNHI = $_COOKIE["patient-nhi"];
}

if (isset($_COOKIE["patient-surname"])) {
    $patientSurname = $_COOKIE["patient-surname"];
}

if (isset($_COOKIE["patient-firstname"])) {
    $patientFirstName = $_COOKIE["patient-firstname"];
}
?>

<div class="center">
    <div class="container">
        <h1>Patient Details</h1>
        <form action="sofa.php" method="post">
            <div>
                <label for="patient-nhi">NHI number:</label>
                <input id="patient-nhi" name="patient-nhi" type="text" value="<?php echo $patientNHI ?>"
                       pattern="[A-Z]{3}[0-9]{4}" oninvalid="this.setCustomValidity('Format should be AAANNNN')" required>
            </div>
            <div>
                <label for="patient-surname">Patient surname:</label>
                <input id="patient-surname" name="patient-surname" type="text" value="<?php echo $patientSurname ?>" required>
            </div>
            <div>
                <label for="patient-firstname">Patient first name:</label>
                <input id="patient-firstname" name="patient-firstname" type="text" value="<?php echo $patientFirstName ?>" required>
            </div>
            <div>
                <button>Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>