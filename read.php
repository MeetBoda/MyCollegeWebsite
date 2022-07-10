<?php
// Include config file
require_once "config.php";

$fno = $_POST['formno'];

// Attempt select query execution
$sql = "SELECT * FROM `apply_data` WHERE `Form No`='$fno'";
if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo "Form No : " . $row['Form No'] . "<br>";
            echo "Name : " . $row['Name'] . "<br>";
            echo "Date of Birth : " . $row['DOB'] . "<br>";
            echo "Email ID : " . $row['Email_ID'] . "<br>";
            echo "Contact No :". $row['Contact_No'] . "<br>";
            echo "Branch : ".$row['Branch']."<br>";
        }
        // Free result set
        mysqli_free_result($result);
    } else {
        echo '<em>No records were found.</em>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($link);
?>