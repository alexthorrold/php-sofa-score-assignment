<?php
$session_lifetime = 3600 * 24 * 5; // 5 days
session_set_cookie_params($session_lifetime);
session_start();
?>

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