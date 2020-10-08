<html>

    <head>
        
        <title>THOD Scare Camera 1</title>

        <!--Link the HTML5 Document to the CSS file styling it.-->
        <link rel = "stylesheet" href = "css/scare1css.css"></link rel>

    </head>

    <body>
    
        <!--Just here to make sure that the CSS file is linked properly.-->
        <h3>Scare Camera 1</h3>

        <!--Create the placeholder div for the video to go into.-->
        <!-- <div style="width:100%;height:0;padding-bottom:56.25%;overflow:hidden;position:relative;"><iframe src="https://v.angelcam.com/iframe?v=n8l92z55y0&amp;autoplay=1" frameborder="0" webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true" style="height:50%;position:absolute;top:0;width:100%;left:0;"></iframe></div> -->
        <iframe width="580" height="300" src="https://rtsp.me/embed/Ernbib56/" frameborder="0" allowfullscreen></iframe>
        
        <form action="" method="POST">
            <input type="submit" name="update" value="SCARE"/>
            <input type="submit" name="downdate" value="RESET"/>
        </form>

    </body>

    <!--Link this HTML5 Document to the Javascript Files Controlling It.-->
    <script src="script/scare1javascript.js"></script>
      
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
$username = "thehou38_arduino1";		// Database username
$password = "S3T0FfSc@r31!";	        // Database password


// Establish connection to MySQL database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//else { echo "Connected to mysql database."; }

if (isset($_POST['update'])){
    $sql = "UPDATE PropStatus SET Trigger_Status='1' WHERE Prop_Name='PeekBear'"; 

    if ($conn->query($sql) === TRUE) {
	    echo "Activated Prop.";
    } 

    else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_POST['downdate'])){
    $sql = "UPDATE PropStatus SET Trigger_Status='0' WHERE Prop_Name='PeekBear'"; 

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