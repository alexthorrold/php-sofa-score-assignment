<?php
if (isset($_POST["patient-nhi"]) && isset($_POST["patient-surname"]) && isset($_POST["patient-firstname"])) {

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Six Subscores</title>
</head>
<body>
<form action="result.php" method="post">
    <div>
        <label for="respiratory-system">Respiratory system (PaO<sub>2</sub>):</label>
        <input id="respiratory-system" name="respiratory-system" type="number">
        <label for="mechanically-ventilated">Mechanically ventilated</label>
        <input id="mechanically-ventilated" name="mechanically-ventilated" type="checkbox">
    </div>
    <div>
        <label for="nervous-system">Nervous system:</label>
        <input id="nervous-system" name="nervous-system" type="number">
    </div>
    <div>
        <label for="cardiovascular-system">Cardiovascular System:</label>
        <input id="cardiovascular-system" name="cardiovascular-system" type="number">
        <label for="cardiovascular-option">MAP or vasopressors:</label>
        <select name="cardiovascular-option" id="cardiovascular-option">
            <option selected disabled hidden value=""></option>
            <option value="map">MAP</option>
            <option value="dopamine">Dopamine</option>
            <option value="dobutamine">Dobutamine</option>
            <option value="epinephrine">Epinephrine</option>
            <option value="norepinephrine">Norepinephrine</option>
        </select>
    </div>
    <div>
        <label for="liver">Liver:</label>
        <input id="liver" name="liver" type="number">
    </div>
    <div>
        <label for="coagulation">Coagulation:</label>
        <input id="coagulation" name="coagulation" type="number">
    </div>
    <div>
        <label for="kidneys">Kidneys:</label>
        <input id="kidneys" name="kidneys" type="number">
    </div>
    <button>Submit</button>
</form>
</body>
</html>