<?php

//  NOTE:   This script will return either a 1 or a 0 depending on what the current value is in the
//          Trigger_Status field of the Monkey row in the PropStatus Table. ARDUINO3 should be
//          able to use this to retrieve the value remotely.

//  NOTE:   $sql string is valid as shown by direct command line testing.
//          $dbname is valid as shown by directly logging into server.
//          $username is valid as shown by directly logging into server
//          $password is valid as shown by directly logging into server
//          $host has not been proven, but I believe it is right since the website 
//          and database are on the same server.

$host = "localhost";		            // localhost because PHP files & database are on same server
$dbname = "thehou38_ScareActivation";   // Database name
$username = "thehou38_arduino3";		// Database username
$password = "S3T0FfSc@r33!";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Send Query.
$sql = "SELECT Trigger_Status FROM PropStatus WHERE Prop_Name='Monkey'"; 
$status = mysqli_query($conn,$sql);

// Show the response.
if (mysqli_num_rows($status)>0) {
	$row = mysqli_fetch_assoc($status);
	echo "" .$row["Trigger_Status"]. "";
}

// Close MySQL connection
$conn->close();

?>