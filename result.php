<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>

<?php
function checkVariablesSet()
{
    return isset($_POST["respiratory-system"]) && isset($_POST["nervous-system"]) &&
        isset($_POST["cardiovascular-system"]) && isset($_POST["liver"]) && isset($_POST["coagulation"]) &&
        isset($_POST["kidneys"]);
}

function checkValuesValid()
{
    return $_POST["respiratory-system"] >= 0 && $_POST["nervous-system"] >= 0 &&
        $_POST["cardiovascular-system"] >= 0 && $_POST["liver"] >= 0 && $_POST["coagulation"] >= 0 &&
        $_POST["kidneys"] >= 0;
}

$respiratoryScore = "";
$nervousScore = "";
$cardiovascularScore = "";
$liverScore = "";
$coagulationScore = "";
$kidneyScore = "";

if (checkVariablesSet() && checkValuesValid()) {
    $respiratorySystem = $_POST["respiratory-system"];
    $isMechanicallyVentilated = isset($_POST["mechanically-ventilated"]);
    $nervousSystem = $_POST["nervous-system"];
    $cardiovascularSystem = $_POST["cardiovascular-system"];
    $cardiovascularOption = $_POST["cardiovascular-option"];
    $liver = $_POST["liver"];
    $coagulation = $_POST["coagulation"];
    $kidneys = $_POST["kidneys"];

    $respiratoryScore = 0;
    $nervousScore = 0;
    $cardiovascularScore = 0;
    $liverScore = 0;
    $coagulationScore = 0;
    $kidneyScore = 0;

    if ($respiratorySystem < 100 && $isMechanicallyVentilated) {
        $respiratoryScore = 4;
    } else if ($respiratorySystem < 200 && $isMechanicallyVentilated) {
        $respiratoryScore = 3;
    } else if ($respiratorySystem < 300) {
        $respiratoryScore = 2;
    } else if ($respiratorySystem < 400) {
        $respiratoryScore = 1;
    } else {
        // Score remains at 0 if respiratory system value is greater than 400
        $respiratoryScore = 0;
    }

    if ($nervousSystem >= 15) {
        $nervousScore = 0;
    } else if ($nervousSystem >= 13) {
        $nervousScore = 1;
    } else if ($nervousSystem >= 10) {
        $nervousScore = 2;
    } else if ($nervousSystem >= 6) {
        $nervousScore = 3;
    } else {
        $nervousScore = 4;
    }

    if ($cardiovascularOption == "map") {
        if ($cardiovascularSystem >= 70) {
            $cardiovascularScore = 0;
        } else {
            $cardiovascularScore = 1;
        }
    } else if ($cardiovascularOption == "dopamine") {
        if ($cardiovascularSystem > 15) {
            $cardiovascularScore = 4;
        } else if ($cardiovascularSystem > 5) {
            $cardiovascularScore = 3;
        } else {
            $cardiovascularScore = 2;
        }
    } else if ($cardiovascularOption == "dobutamine") {
        $cardiovascularScore = 2;
    } else if ($cardiovascularOption == "epinephrine" || $cardiovascularOption == "norepinephrine") {
        if ($cardiovascularScore <= 0.1) {
            $cardiovascularScore = 3;
        } else {
            $cardiovascularScore = 4;
        }
    }

    if ($liver < 1.2) {
        $liverScore = 0;
    } else if ($liver <= 1.9) {
        $liverScore = 1;
    } else if ($liver <= 5.9) {
        $liverScore = 2;
    } else if ($liver <= 11.9) {
        $liverScore = 3;
    } else {
        $liverScore = 4;
    }

    if ($coagulation < 20) {
        $coagulationScore = 4;
    } else if ($coagulation < 50) {
        $coagulationScore = 3;
    } else if ($coagulation < 100) {
        $coagulationScore = 2;
    } else if ($coagulation < 150) {
        $coagulationScore = 1;
    } else {
        $coagulationScore = 0;
    }

    if ($kidneys < 1.2) {
        $kidneyScore = 0;
    } else if ($kidneys <= 1.9) {
        $kidneyScore = 1;
    } else if ($kidneys <= 3.4) {
        $kidneyScore = 2;
    } else if ($kidneys <= 4.9) {
        $kidneyScore = 3;
    } else {
        $kidneyScore = 4;
    }

    $totalScore = $respiratoryScore + $nervousScore + $cardiovascularScore + $liverScore + $coagulationScore + $kidneyScore;
} else {
    echo "<h1>Error obtaining patient data, please start again</h1>";
}
?>

<div class="center">
    <div class="container">
        <h1>Results</h1>
        <div class="results">
            <?php if (checkVariablesSet() && checkValuesValid()): ?>
                <p>Respiratory system score: <?php echo $respiratoryScore ?></p>
                <p>Nervous system score: <?php echo $nervousScore ?></p>
                <p>Cardiovascular system score: <?php echo $cardiovascularScore ?></p>
                <p>Liver score: <?php echo $liverScore ?></p>
                <p>Coagulation score: <?php echo $coagulationScore ?></p>
                <p>Kidney score: <?php echo $kidneyScore ?></p>
                <hr>
                <h3>Total score: <?php echo $totalScore ?></h3>
            <?php else: ?>
                <h2 class="text-center">Error getting results, please start again.</h2>
            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>