<?php
// Include config file
require_once "config.php";

$fno = $_POST['formno'];

$sequel = "SELECT * FROM `apply_data` WHERE `Form No`='$fno'";
$result = mysqli_query($link, $sequel);
if (mysqli_num_rows($result) > 0) {
    if(isset($_POST['emailid']) && !empty($_POST['emailid'])){
        $emailid = $_POST['emailid'];
        $sql = "UPDATE `apply_data` SET `Email_ID`=? WHERE `Form No`=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "si",$param_email, $param_FormNo);
        $param_email = $emailid;
        $param_FormNo = $fno;
        mysqli_stmt_execute($stmt);
        echo "Email ID Updated Successfully";
        echo "<br>";
        echo "<br>";
    }

    if(isset($_POST['psw']) && !empty($_POST['psw'])){
        $password = $_POST['psw'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `apply_data` SET `Password`=? WHERE `Form No`=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "si",$param_pass, $param_FormNo);
        $param_pass = $password;
        $param_FormNo = $fno;
        mysqli_stmt_execute($stmt);
        echo "Password Updated Successfully";
        echo "<br>";
        echo "<br>";
    }

    if(isset($_POST['contno']) && !empty($_POST['contno'])){
        $contno = $_POST['contno'];
        $sql = "UPDATE `apply_data` SET `Contact_No`=? WHERE `Form No`=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "di",$param_cont, $param_FormNo);
        $param_cont = $contno;
        $param_FormNo = $fno;
        mysqli_stmt_execute($stmt);
        echo "Contact No Updated Successfully";
        echo "<br>";
        echo "<br>";
    }

    if(isset($_POST['branch']) && ($_POST['branch'] != "select")){
        $branch = $_POST['branch'];

        if($branch == "CE")
            $branch = "Computer Engineering";
        else if($branch == "IT")
            $branch = "Information Technology Engineering";
        else if($branch == "EC")
            $branch = "Electronics & Communication Engineering";
        else if($branch == "CH")
            $branch = "Chemical Engineering";
        else if($branch == "MH")
            $branch = "Mechanical Engineering";
        else if($branch == "CL")
            $branch = "Civil Engineering";
        else if($branch == "IC")
            $branch = "Instrument & Control Engineering";

        $sql = "UPDATE `apply_data` SET `Branch`=? WHERE `Form No`=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "si",$param_branch, $param_FormNo);
        $param_branch = $branch;
        $param_FormNo = $fno;
        mysqli_stmt_execute($stmt);
        echo "Branch Updated Successfully";
        echo "<br>";
        echo "<br>";
    }
}
else{
    echo '<em>Form No entered is Invalid.</em>';
}

// Close connection
mysqli_close($link);
?>