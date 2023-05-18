<?php 

session_start();
include_once 'functions.php';

$sql = new DB_con();

// File upload path
$targetDir = "\roengrang\img/";

if (isset($_POST['RegWord'])) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']); //แปลรหัสเป็น md5
    $user_fullname = $_POST['user_fullname'];
    $user_tel = $_POST['user_tel'];
    $user_address = $_POST['address'];
    $user_road = $_POST['road'];
    $user_soi = $_POST['soi'];
    $user_provinces = $_POST['provinces'];
    $user_district = $_POST['district'];
    $user_subdistrict = $_POST['subdistrict'];
    $user_postID = $_POST['zip_code'];

    if (!empty($_FILES["file"]["name"])) {
        $tmp = $_FILES['file']['tmp_name'];
        $namefile = $_FILES['file']['name'];
        $fileBasame = basename($_FILES["file"]["name"]);
        $fileType = pathinfo($fileBasame, PATHINFO_EXTENSION);
        $fileName = md5(time().$namefile.$tmp).'.'.$fileType;
        $targetFilePath = $targetDir . $fileName;

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $sql->registrationWorld($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_district,$user_provinces,$user_postID,$fileName);
                if ($insert) {
                    $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ละบบ";
                    header("location: index.php"); 
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: regWorld.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: regWorld.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: regWorld.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: regWorld.php");
    }
}

if (isset($_POST['RegLog'])) {
    $user_email = $_POST['user_email'];
    $user_password = md5($_POST['user_password']); //แปลรหัสเป็น md5
    $user_fullname = $_POST['user_fullname'];
    $user_tel = $_POST['user_tel'];
    $user_address = $_POST['address'];
    $user_road = $_POST['road'];
    $user_soi = $_POST['soi'];
    $user_provinces = $_POST['provinces'];
    $user_district = $_POST['district'];
    $user_subdistrict = $_POST['subdistrict'];
    $user_postID = $_POST['zip_code'];

    if (!empty($_FILES["file"]["name"])) {
        $tmp = $_FILES['file']['tmp_name'];
        $namefile = $_FILES['file']['name'];
        $fileBasame = basename($_FILES["file"]["name"]);
        $fileType = pathinfo($fileBasame, PATHINFO_EXTENSION);
        $fileName = md5(time().$namefile.$tmp).'.'.$fileType;
        $targetFilePath = $targetDir . $fileName;

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
                $insert = $sql->registrationLocal($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_district,$user_provinces,$user_postID,$fileName);
                if ($insert) {
                    $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ละบบ";
                    header("location: index.php"); 
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: regLog.php");
                }
            } else {
                $_SESSION['statusMsg'] = "Sorry, there was an error uploading your file.";
                header("location: regLog.php");
            }
        } else {
            $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
            header("location: regLog.php");
        }
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: regLog.php");
    }
}

?>