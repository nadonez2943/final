<?php
    include_once('functions.php'); 

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

    $targetDir = "../img/";

    if (isset($_POST['function']) && $_POST['function'] == 'update_order_status') {
        $update = $sql->update_order_status($_POST['id'], $_POST['order_status']);
        
        if ($update) {
            $order_status = $sql->checkst($_POST['id']);
            $st = mysqli_fetch_array($order_status);

            $num = mysqli_num_rows($order_status);

            if ($num > 0) {
                echo $st['order_status'];
            } else {
                echo "Failed to fetch the updated order status.";
            }
        } else {
            echo "Failed to update the order status.";
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'update_order_status1') {
        $update = $sql->update_order_status1($_POST['id'], $_POST['order_status']);
        
        if ($update) {
            $order_status = $sql->checkst($_POST['id']);
            $st = mysqli_fetch_array($order_status);

            $num = mysqli_num_rows($order_status);

            if ($num > 0) {
                echo $st['order_status'];
            } else {
                echo "Failed to fetch the updated order status.";
            }
        } else {
            echo "Failed to update the order status.";
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'update_order_status6') {
        $orders = $sql->order($_POST['id']);
        $orders = mysqli_fetch_array($orders);

        $pro_amount = $orders['pro_amount'] + $orders['ord_amount'];
        $pro_selled = $orders['pro_selled'] - $orders['ord_amount'];

        $update = $sql->update_order_status6($_POST['id'], $_POST['order_status'],$_POST['cancleReason'],$orders['pro_id'],$pro_amount,$pro_selled);
        
        if ($update) {
            $order_status = $sql->checkst($_POST['id']);
            $st = mysqli_fetch_array($order_status);

            $num = mysqli_num_rows($order_status);

            if ($num > 0) {
                echo $st['order_status'];
            } else {
                echo "Failed to fetch the updated order status.";
            }
        } else {
            echo "Failed to update the order status.";
        }
    }
    if (isset($_POST['receive_order'])) {
        if (!empty($_FILES["receive_img"]["name"]) && !empty($_FILES["payment_img"]["name"])) {
            $receive_imgUploaded = false;
            $payment_imgUploaded = false;
            if (!empty($_FILES["receive_img"]["name"])) {
                $tempPath = $_FILES['receive_img']['tmp_name'];
                $result = (new UploadApi())->upload($tempPath);
                $imageName = $result['public_id'];
                $receive_imgName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                $receive_imgUploaded = true;
            }
            if (!empty($_FILES["payment_img"]["name"])) {
                $tempPath = $_FILES['payment_img']['tmp_name'];
                $result = (new UploadApi())->upload($tempPath);
                $imageName = $result['public_id'];
                $payment_imgName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                $payment_imgUploaded = true;
            }
    
            if ($receive_imgUploaded && $payment_imgUploaded) {
                $update = $sql->update_order_status4($_POST['id'], 5, $receive_imgName, $payment_imgName);
                if ($update) {
                    $order_status = $sql->checkst($_POST['id']);
                    $st = mysqli_fetch_array($order_status);
    
                    $num = mysqli_num_rows($order_status);
    
                    if ($num > 0) {
                        header("location: order_detail.php?id=" . $_POST['id']);
                    } else {
                        header("location: order_detail.php?id=" . $_POST['id']);
                    }
                } else {
                    echo "Failed to update the order status.";
                }
            } else {
                echo "File upload failed.";
            }
        } else {
            echo "Please upload both files.";
        }
    }
    if (isset($_POST['radios']) && isset($_POST['review'])) {
        $point = floatval($_POST['radios']);
        $review = $_POST['review'];
        
        $Allord = $sql->order($_POST['id']);
        $allord=mysqli_fetch_array($Allord);
        
        $allordpro = $sql->orderproduct($allord['pro_id']);
        $num = mysqli_num_rows($allordpro);

        if($num>10){
            $points = $sql->point($allord['pro_id']);
            $points = $points['points'];
        }else{
            $product = $sql->product($allord['pro_id']);
            $Product=mysqli_fetch_array($product);

            $points = ($point+($Product['pro_point'] * 10 ))/11 ;
        }
        
        
        $update = $sql->review($_POST['id'], $points,$_POST['review'],$allord['pro_id']);

        header("location: order_detail.php?id=" . $_POST['id']);
    }
    if (isset($_POST['reportproduct'])) {

        $product = $sql->reportproduct($_POST['user_id'],$_POST['topic'],$_POST['detail'],$_POST['pro_id']);
        echo '<script>alert("รายงานสินค้าสำเร็จแล้ว");</script>';
        echo '<script>window.location.href = "productdetails.php?pro_id=' . $_POST['pro_id'] . '";</script>';
  
    }
    if (isset($_POST['reportshop'])) {
        $product = $sql->reportshop($_POST['user_id'],$_POST['topic'],$_POST['detail'],$_POST['shop_id']);
        echo '<script>alert("รายงานร้านค้าสำเร็จแล้ว");</script>';
        echo '<script>window.location.href = "shopdetails.php?shop_id=' . $_POST['shop_id'] . '";</script>';
    }


?>