<?php
function checkVariablesSet() {
    return isset($_POST["patient-nhi"]) && isset($_POST["patient-surname"]) && isset($_POST["patient-firstname"]);
}

$patientNHI = "";
$patientSurname = "";
$patientFirstName = "";

$regex = "/[A-Z]{3}[0-9]{4}/";

if (checkVariablesSet()) {
    $patientNHI = $_POST["patient-nhi"];
    $patientSurname = $_POST["patient-surname"];
    $patientFirstName = $_POST["patient-firstname"];

    if (preg_match($regex, $patientNHI)) {
        setcookie("patient-nhi", $patientNHI, time() + 3600 * 24 * 5);
        setcookie("patient-surname", $patientSurname, time() + 3600 * 24 * 5);
        setcookie("patient-firstname", $patientFirstName, time() + 3600 * 24 * 5);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Six Subscores</title>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>

<div class="center">
    <div class="container">
        <?php if (checkVariablesSet() && preg_match($regex, $patientNHI)): ?>
            <ul>
                <li>NHI Number: <?php echo $patientNHI ?></li>
                <li>Patient Surname: <?php echo $patientSurname ?></li>
                <li>Patient First Name: <?php echo $patientFirstName ?></li>
            </ul>
        <?php endif ?>
        <form action="result.php" method="post">
            <div>
                <label for="respiratory-system">Respiratory system (PaO<sub>2</sub>/FiO<sub>2</sub>):</label>
                <input id="respiratory-system" name="respiratory-system" type="number" min="0" required>
                <label for="mechanically-ventilated">Mechanically ventilated</label>
                <input id="mechanically-ventilated" name="mechanically-ventilated" type="checkbox">
            </div>
            <div>
                <label for="nervous-system">Nervous system (Glasgow coma scale):</label>
                <input id="nervous-system" name="nervous-system" type="number" min="0" required>
            </div>
            <div>
                <label for="cardiovascular-system">Cardiovascular System:</label>
                <input id="cardiovascular-system" name="cardiovascular-system" type="number" min="0" required>
                <label for="cardiovascular-option">MAP or vasopressors required:</label>
                <select name="cardiovascular-option" id="cardiovascular-option">
                    <option value="map">MAP</option>
                    <option value="dopamine">Dopamine</option>
                    <option value="dobutamine">Dobutamine</option>
                    <option value="epinephrine">Epinephrine</option>
                    <option value="norepinephrine">Norepinephrine</option>
                </select>
            </div>
            <div>
                <label for="liver">Liver (Bilirubin mg/dl):</label>
                <input id="liver" name="liver" type="number" min="0" step="0.1" required>
            </div>
            <div>
                <label for="coagulation">Coagulation (Platelets×10<sup>3</sup>/μl):</label>
                <input id="coagulation" name="coagulation" type="number" min="0" required>
            </div>
            <div>
                <label for="kidneys">Kidneys (Creatinine mg/dl):</label>
                <input id="kidneys" name="kidneys" type="number" min="0" step="0.1" required>
            </div>
            <div>
                <button>Calculate Results</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>