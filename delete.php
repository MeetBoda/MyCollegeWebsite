<?php
// Include config file
require_once "config.php";

$fno = $_POST['formno'];

$sequel = "SELECT * FROM `apply_data` WHERE `Form No`='$fno'";
$result = mysqli_query($link, $sequel);
if (mysqli_num_rows($result) > 0) {
    $sql = "DELETE FROM `apply_data` WHERE `Form No`=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "i", $param_FormNo);
    $param_FormNo = $fno;
    mysqli_stmt_execute($stmt);
    echo "Record Deleted Successfully";
}
else{
    echo '<em>Form No entered is Invalid.</em>';
}
// Close connection
mysqli_close($link);
?>