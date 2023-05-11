<?php 

session_start();
include_once 'functions.php';

$sql = new DB_con();

// File upload path
$targetDir = "../img/";

if (isset($_POST['checkout'])) {
    $pro_id = $_POST['pro_id'];
    $user_id = $_SESSION['id']; //แปลรหัสเป็น md5
    $ord_name = $_POST['name'];
    $ord_amount = $_POST['quant'];
    $sumprice = $_POST['sum'];
    $sentprice = $_POST['sent'];
    $totalprice = $_POST['total'];
    $ord_tel = $_POST['tel'];
    $ord_address = $_POST['address'];
    $ord_road = $_POST['road'];
    $ord_soi = $_POST['soi'];
    $ord_province = $_POST['province'];
    $ord_district = $_POST['district'];
    $ord_subdistrict = $_POST['subdistrict'];
    $ord_postID = $_POST['zipcode'];
    $ord_note = $_POST['note'];
    $payment = $_POST['payment'];

    $insert = $sql->addorders($pro_id,$user_id,$ord_name,$ord_amount,$sumprice,$sentprice,$totalprice,$ord_tel,$ord_address,$ord_road,$ord_soi,$ord_province,$ord_district,$ord_subdistrict,$ord_postID,$ord_note,$payment);
    if ($insert) {
        $_SESSION['statusOrders'] = "ส่งคำสั่งซื้อแล้ว กรุณารอร้านค้าตอบรับออร์เดอร์";
        header("location: allorder.php"); 
    } else {
        $_SESSION['statusOrders'] = "ส่งคำสั่งซื้อผิดพลาด กรุณาลองใหม่อีกครั้ง";
        header("location: window.history.back()");
    }
            
}

?>