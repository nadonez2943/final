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

    if (isset($_POST['addPro'])) {
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_amount = $_POST['pro_amount'];
        $pro_detail = $_POST['pro_detail'];
        $cat_id = $_POST['cat_id'];
        $shop_id = $_SESSION['shop_id'];
        $pro_send = $_POST['pro_send'];

        if (!empty($_FILES["file"]["name"])) {
            $tempPath = $_FILES['file']['tmp_name'];
            $result = (new UploadApi())->upload($tempPath);
            $imageName = $result['public_id'];
            $imageUrl = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;

            $insert = $sql->insertProduct($shop_id,$cat_id, $pro_name, $pro_price, $pro_amount, $pro_detail, $pro_send, $imageUrl);
            if ($insert) {
                $_SESSION['statusMsg'] = "เพิ่มสินค้าสำเร็จ";
                header("location: addproduct.php"); 
            } else {
                $_SESSION['statusMsg'] = "อัพโหลดสินค้าผิดพลาดกรุณาลองใหม่อีครั้ง";
                header("location: addproduct.php");
            }
                
            
        }
    }

    if (isset($_POST['updatePro'])) {
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $pro_price = $_POST['pro_price'];
        $pro_amount = $_POST['pro_amount'];
        $pro_detail = $_POST['pro_detail'];
        $cat_id = $_POST['cat_id'];
        $pro_send = $_POST['pro_send'];
        $img_name = $_POST['img_name'];

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
                    $insert = $sql->update_product($pro_id,$cat_id, $pro_name, $pro_price, $pro_amount, $pro_detail, $pro_send, $fileName);
                    if ($insert) {
                        $_SESSION['statusMsg'] = "แก้ไขสินค้าสำเร็จ";
                        header("location: editproduct.php?pro_id=".$pro_id); 
                    } else {
                        $_SESSION['statusMsg'] = "อัพโหลดสินค้าผิดพลาดกรุณาลองใหม่อีครั้ง";
                        header("location: editproduct.php");
                    }
                }else{
                    echo "1";
                }
            }else{
                echo "2";
            }
        }else{
           $insert = $sql->update_product($pro_id,$cat_id, $pro_name, $pro_price, $pro_amount, $pro_detail, $pro_send, $img_name);
            if ($insert) {
                $_SESSION['statusMsg'] = "แก้ไขสินค้าสำเร็จ";
                header("location: editproduct.php?pro_id=".$pro_id); 
            } else {
                $_SESSION['statusMsg'] = "อัพโหลดสินค้าผิดพลาดกรุณาลองใหม่อีครั้ง";
                header("location: editproduct.php");
            }
                
        }
    }

?>