<?
$session_lifetime = 3600 * 24 * 5; // 5 days
session_set_cookie_params($session_lifetime);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Six Subscores</title>
</head>
<body>

<?php
if (isset($_POST["patient-nhi"]) && isset($_POST["patient-surname"]) && isset($_POST["patient-firstname"])) {
    $patientNHI = $_POST["patient-nhi"];
    $patientSurname = $_POST["patient-surname"];
    $patientFirstName = $_POST["patient-firstname"];

    $regex = "/[A-Z]{3}[0-9]{4}/";

    if (preg_match($regex, $patientNHI)) {
        echo "<h1>$patientNHI</h1>";
        echo "<h1>$patientSurname</h1>";
        echo "<h1>$patientFirstName</h1>";
        $_SESSION["patient-nhi"] = $patientNHI;
        $_SESSION["patient-surname"] = $patientSurname;
        $_SESSION["patient-firstname"] = $patientFirstName;
    }
}
?>

<form action="result.php" method="post">
    <div>
        <label for="respiratory-system">Respiratory system (PaO<sub>2</sub>):</label>
        <input id="respiratory-system" name="respiratory-system" type="number" min="0" required>
        <label for="mechanically-ventilated">Mechanically ventilated</label>
        <input id="mechanically-ventilated" name="mechanically-ventilated" type="checkbox">
    </div>
    <div>
        <label for="nervous-system">Nervous system:</label>
        <input id="nervous-system" name="nervous-system" type="number" min="0" required>
    </div>
    <div>
        <label for="cardiovascular-system">Cardiovascular System:</label>
        <input id="cardiovascular-system" name="cardiovascular-system" type="number" min="0" required>
        <label for="cardiovascular-option">MAP or vasopressors:</label>
        <select name="cardiovascular-option" id="cardiovascular-option">
            <option value="map">MAP</option>
            <option value="dopamine">Dopamine</option>
            <option value="dobutamine">Dobutamine</option>
            <option value="epinephrine">Epinephrine</option>
            <option value="norepinephrine">Norepinephrine</option>
        </select>
    </div>
    <div>
        <label for="liver">Liver:</label>
        <input id="liver" name="liver" type="number" min="0" step="0.1" required>
    </div>
    <div>
        <label for="coagulation">Coagulation:</label>
        <input id="coagulation" name="coagulation" type="number" min="0" required>
    </div>
    <div>
        <label for="kidneys">Kidneys:</label>
        <input id="kidneys" name="kidneys" type="number" min="0" step="0.1" required>
    </div>
    <button>Submit</button>
</form>
</body>
</html>