
<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$fullname = trim($_POST["fullname"] ?? "");
$studentid = trim($_POST["studentid"] ?? "");
$committee = trim($_POST["committee"] ?? "");
$leavetype = trim($_POST["leavetype"] ?? "");
$startdate = trim($_POST["startdate"] ?? "");
$enddate = trim($_POST["enddate"] ?? "");
$reason = trim($_POST["reason"] ?? "");

if (
    $fullname === "" ||
    $studentid === "" ||
    $committee === "" ||
    $leavetype === "" ||
    $startdate === "" ||
    $enddate === "" ||
    $reason === ""
) {
    die("Please complete all required fields.");
}

if ($enddate < $startdate) {
    die("End date cannot be earlier than start date.");
}

$googleScriptUrl = "https://script.google.com/macros/s/AKfycbyALUdyN9WWqGmoy79jawLXNy4uM4fHRZxQVCzhz7eB8AcyXFyN3ijHhjWDWOdrhC8i/exec";

$postData = [
    "fullname" => $fullname,
    "studentid" => $studentid,
    "committee" => $committee,
    "leavetype" => $leavetype,
    "startdate" => $startdate,
    "enddate" => $enddate,
    "reason" => $reason
];

$ch = curl_init($googleScriptUrl);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);

$response = curl_exec($ch);
$error = curl_error($ch);

curl_close($ch);

if ($response === false || $error !== "") {
    die("Unable to submit application to Google Sheets. Please try again.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Received</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="application">
        <div class="form-container">
            <div class="form-heading">
                <h2>Application Received!</h2>
                <p>Your leave application has been submitted.</p>
            </div>

            <p>Full Name: <?php echo $fullname; ?></p>
            <p>Student Number: <?php echo $studentid; ?></p>
            <p>Committee / Position: <?php echo $committee; ?></p>
            <p>Type of Leave: <?php echo $leavetype; ?></p>
            <p>Start Date: <?php echo $startdate; ?></p>
            <p>End Date: <?php echo $enddate; ?></p>
            <p>Reason: <?php echo $reason; ?></p>
            
            <br>
            <a href="index.php" class="btn">Back to Home</a>
        </div>
    </section>

</body>
</html>
