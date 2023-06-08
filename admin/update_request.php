<?php 

    session_start();
    include_once 'functions.php';

    $sql = new DB_con();
    
    if (isset($_POST['update_request'])) {
        $user_email = $_POST['user_email'];
        $user_subdistrict = $_POST['subdistrict'];
    
        
        $id = $sql->searchid($user_email);
        $user=mysqli_fetch_array($id);
        $sub = $sql->address($user_subdistrict);
        $address=mysqli_fetch_array($sub);
        $insertaddress = $sql->insertaddress($user['user_id'],$user['user_fullname'],$user['user_tel'],$user['user_address'],$user['user_road'],$user['user_soi'],$address['provinces_id'],$address['district_id'],$address['subdistrict_id'],$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$address['zip_code']);
        if ($insertaddress) {
            $update = $sql->update_request($user['user_id'],2);
            if ($update) {
                $_SESSION['statusMsg'] = "ตอบรับคำขอสำเร็จ";
                header("location: request.php");
            }else{
                $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด";
                header("location: request.php");
            }
        }else{
            $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด";
            header("location: request.php");
        }
                
    }
    if (isset($_POST['update_request5'])) {
        $user_email = $_POST['user_email'];
    
        $id = $sql->searchid($user_email);
        $user=mysqli_fetch_array($id);
        $update = $sql->update_request($user['user_id'],5);
        if ($update) {
            $_SESSION['statusMsg'] = "ปฎิเสธิคำขอสำเร็จ";
            header("location: request.php");
        }else{
            $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด";
            header("location: request.php");
        }
                
    }
    
?>