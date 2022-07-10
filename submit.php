<?php
// Database connection
include "config.php";
if(isset($_POST['submit1'])){
    $name = $_POST['fname'];
    $dob = $_POST['dob'];
    $emailid = $_POST['emailid'];
    $password = $_POST['psw'];
    $contno = $_POST['contno'];
    $branch = $_POST['branch'];

    $password = password_hash($password, PASSWORD_DEFAULT);

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

    $stmt = $link->prepare("INSERT INTO apply_data (Name, DOB, Email_ID, Password, Contact_No, Branch) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssds", $name, $dob, $emailid, $password, $contno, $branch);
    $stmt->execute();
    $stmt->close();
    echo "Information Submitted Successfully<br>";
    echo "Your Form No is : ";
    $squel = "SELECT * FROM `apply_data` WHERE `Name`='$name'";
    $result = mysqli_query($link, $squel);
    $row = mysqli_fetch_assoc($result);
    echo $row['Form No'];
    echo "<br>";
    echo "(Kindly Save it for your Future Reference)";
}
// Image Upload
if(isset($_POST['submit2'])){
    $target_dir = "uploads/"; //specify the dir
    $target_file1 = $target_dir . basename($_FILES["fileUpload"]["name"][0]);
    $target_file2 = $target_dir . basename($_FILES["fileUpload"]["name"][1]);
    $target_file3 = $target_dir . basename($_FILES["fileUpload"]["name"][2]);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'][0],$target_file1);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'][1],$target_file2);
    move_uploaded_file($_FILES['fileUpload']['tmp_name'][2],$target_file3);
    $sql = "INSERT INTO image (image1_path, image2_path, image3_path) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $param_path1, $param_path2, $param_path3);
    $param_path1 = $target_file1;
    $param_path2 = $target_file2;
    $param_path3 = $target_file3;
    if(mysqli_stmt_execute($stmt)){
        echo "Images Uploaded Successfully";
    }
    else {
        echo "Image(s) couldn't be uploaded.";
    }	
}	
$link->close();
//header("Location:Apply.html");
?>