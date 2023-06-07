<?php 

session_start();
include_once 'functions.php';

require 'cloudinary/vendor/autoload.php';
    use Cloudinary\Configuration\Configuration;
    use Cloudinary\Api\Upload\UploadApi;

    Configuration::instance([
        'cloud' => [
            'cloud_name' => 'dlne5j5ub',
            'api_key' => '232327965775433',
            'api_secret' => 'jJbI7p20xpDJzI4tPNNf9w8R_zg'],
        'url' => ['secure' => true]]);

$sql = new DB_con();

// File upload path
$targetDir = "img/";

if (isset($_POST['register'])) {
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

    if (!empty($_FILES["file"]["name"])) {
        $tempPath = $_FILES['file']['tmp_name'];
        $result = (new UploadApi())->upload($tempPath);
        $imageName = $result['public_id'];
        $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;

        if($user_subdistrict=='191010'){
            $insertuser = $sql->registrationLocal($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$fileName);
            if ($insertuser) {
                $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ระบบ";
                header("location: index.php"); 
            }else {
                $_SESSION['statusMsg'] = "ลงทะเบียนไม่สำเร็จกรุณาลงทะเบียนใหม่อีกครั้ง";
                header("location: registers.php");
            }
        }else{
            $insertuser = $sql->registrationWorld($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$fileName);
            if ($insertuser) {
                $id = $sql->searchid($user_email);
                $user=mysqli_fetch_array($id);
                $sub = $sql->address($user_subdistrict);
                $address=mysqli_fetch_array($sub);
                $insertaddress = $sql->insertaddress($user['user_id'],$user['user_fullname'],$user['user_tel'],$user['user_address'],$user['user_road'],$user['user_soi'],$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$address['zip_code']);
                if ($insertaddress) {
                    $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ระบบ";
                    header("location: index.php"); 
                }else {
                    $_SESSION['statusMsg'] = "ลงทะเบียนไม่สำเร็จกรุณาลงทะเบียนใหม่อีกครั้ง";
                    header("location: registers.php");
                }
            }
        } 
            
    } else {
        $_SESSION['statusMsg'] = "Please select a file to upload.";
        header("location: registers.php");
    }
}

?>