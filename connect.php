<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Separate the form data
$patientInfo = array(
    'patientname' => $_POST['patientname'],
    'age' => $_POST['age'],
    'gender' => $_POST['gender'],
    'phonenumber' => $_POST['phonenumber'],
    'illness' => $_POST['illness'],
    'admitteddate' => $_POST['admitteddate'],
    'wardno' => $_POST['wardno'],
    'doctorassigned' => $_POST['doctorassigned'],
    'dischargedate' => $_POST['dischargedate'],
    'totalbill' =>  $_POST['totalbill']
);


// Insert into personal_info table
$sql_patient = "INSERT INTO  patientinf (patientname, age, gender, phonenumber, illness, admitteddate, wardno, doctorassigned, dischargedate, totalbill)
        VALUES ('" . $patientInfo['patientname'] . "', '" . $patientInfo['age'] . "', '" . $patientInfo['gender'] . "', '" . $patientInfo['phonenumber'] . "', '" . $patientInfo['illness'] . "', '" . $patientInfo['admitteddate'] . "', '" . $patientInfo['wardno'] . "', '" . $patientInfo['doctorassigned'] . "', '" . $patientInfo['dischargedate'] . "', '" . $patientInfo['totalbill'] . "')";

if ($conn->query($sql_patient) === TRUE) {
    echo "Patient information stored successfully<br>";
} else {
    echo "Error: " . $sql_patient . "<br>" . $conn->error;
}

$conn->close();
?>