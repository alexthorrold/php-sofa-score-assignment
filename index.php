<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Input Patient Details</title>
</head>
<body>
<form action="sofa.php" method="post">
    <div>
        <label for="patient-nhi">NHI number:</label>
        <input id="patient-nhi" name="patient-nhi" type="text">
    </div>
    <div>
        <label for="patient-surname">Patient surname:</label>
        <input id="patient-surname" name="patient-surname" type="text">
    </div>
    <div>
        <label for="patient-firstname">Patient first name:</label>
        <input id="patient-firstname" name="patient-firstname" type="text">
    </div>
    <button>Submit</button>
</form>
</body>
</html>