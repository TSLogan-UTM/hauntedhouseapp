<html>

    <head>

        <title>THOD Scare Camera 3</title>

        <!--Link the HTML5 Document to the CSS file styling it.-->
        <link rel = "stylesheet" href = "css/scare3css.css"></link rel>

    </head>

    <body>
    
        <!--Just here to make sure that the CSS file is linked properly.-->
        <h3>Scare Camera 3</h3>

        <!--Fetch The Video Feed From The RTSP Server.-->
        <iframe width="640" height="480" src="https://rtsp.me/embed/dkzAdSHa/" frameborder="0" allowfullscreen></iframe>
        
        <form action="" method="POST">
            <input type="submit" name="update" value="SCARE"/>
            <input type="submit" name="downdate" value="RESET"/>
        </form>

    </body>

    <!--Link this HTML5 Document to the Javascript Files Controlling It.-->
    <script src="script/scare3javascript.js"></script>
      
</html>


<?php

// NOTE:    $sql string is valid as shown by direct command line testing.
//          $dbname is valid as shown by directly logging into server.
//          $username is valid as shown by directly logging into server
//          $password is valid as shown by directly logging into server
//          $host has not been proven, but I believe it is right since the website 
//          and database are on the same server.

$host = "localhost";		         // host = localhost because database hosted on the same server where PHP files are hosted
$dbname = "thehou38_ScareActivation";              // Database name
$username = "thehou38_arduino3";		// Database username
$password = "S3T0FfSc@r33!";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//else { echo "Connected to mysql database."; }

if (isset($_POST['update'])){
    $sql = "UPDATE PropStatus SET Trigger_Status='1' WHERE Prop_Name='Monkey'"; 

    if ($conn->query($sql) === TRUE) {
	    echo "Activated Prop.";
    } 

    else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['downdate'])){
    $sql = "UPDATE PropStatus SET Trigger_Status='0' WHERE Prop_Name='Monkey'"; 

    if ($conn->query($sql) === TRUE) {
	    echo "Reset Prop.";
    } 

    else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close MySQL connection
$conn->close();

?>