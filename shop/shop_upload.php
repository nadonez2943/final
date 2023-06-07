<?php 

    session_start();
    include_once 'functions.php';

    require '../cloudinary/vendor/autoload.php';
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
    $targetDir = "../img/";

    if (isset($_POST['addShop'])) {
        $shop_name = $_POST['shop_name'];
        $shop_detail = $_POST['shop_detail'];
        

        if (!empty($_FILES["file"]["name"])) {
            $tempPath = $_FILES['file']['tmp_name'];
            $result = (new UploadApi())->upload($tempPath);
            $imageName = $result['public_id'];
            $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
            $insert = $sql->insertShop($_SESSION['id'], $shop_name, $shop_detail, $fileName);
            if ($insert) {
                $shop = $sql->usershop($_SESSION['id']);
                $num = mysqli_fetch_array($shop);
                if ($num > 0) {
                    $_SESSION['shop_id'] = $num['shop_id'];
                    header("location: index.php"); 
                }else{
                    $_SESSION['statusMsg'] = "เพิ่มร้านค้าสำเร็จ";
                    header("location: index.php"); 
                }
            } else {
                $_SESSION['statusMsg'] = "ผิดพลาดกรุณาลองใหม่อีครั้ง";
                header("location: registershop.php");
            }
                
        } else {
            $_SESSION['statusMsg'] = "Please select a file to upload.";
            header("location: registershop.php");
        }
    }

?>