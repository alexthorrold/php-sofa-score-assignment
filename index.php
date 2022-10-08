<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Patient Details</title>
</head>
<body>

<?php
$patientNHI = "";
$patientSurname = "";
$patientFirstName = "";

if (isset($_SESSION["patient-nhi"])) {
    $patientNHI = $_SESSION["patient-nhi"];
}

if (isset($_SESSION["patient-surname"])) {
    $patientSurname = $_SESSION["patient-surname"];
}

if (isset($_SESSION["patient-firstname"])) {
    $patientFirstName = $_SESSION["patient-firstname"];
}
?>

<form action="sofa.php" method="post">
    <div>
        <label for="patient-nhi">NHI number:</label>
        <input id="patient-nhi" name="patient-nhi" type="text" value="<?php echo $patientNHI ?>" required>
    </div>
    <div>
        <label for="patient-surname">Patient surname:</label>
        <input id="patient-surname" name="patient-surname" type="text" value="<?php echo $patientSurname ?>" required>
    </div>
    <div>
        <label for="patient-firstname">Patient first name:</label>
        <input id="patient-firstname" name="patient-firstname" type="text" value="<?php echo $patientFirstName ?>" required>
    </div>
    <button>Submit</button>
</form>
</body>
</html>