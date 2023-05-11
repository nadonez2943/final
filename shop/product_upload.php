<?php 

    session_start();
    include_once 'functions.php';

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
                    $insert = $sql->insertProduct($shop_id,$cat_id, $pro_name, $pro_price, $pro_amount, $pro_detail, $pro_send, $fileName);
                    if ($insert) {
                        $_SESSION['statusMsg'] = "เพิ่มสินค้าสำเร็จ";
                        header("location: addproduct.php"); 
                    } else {
                        $_SESSION['statusMsg'] = "อัพโหลดสินค้าผิดพลาดกรุณาลองใหม่อีครั้ง";
                        header("location: addproduct.php");
                    }
                } 
            }
        }
    }

?>