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
    if (isset($_POST['function']) && $_POST['function'] == 'update_order_status0') {
        $update = $sql->update_order_status0($_POST['id'], $_POST['order_status'],$_POST['sentprice']);
        
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
        $orders = $sql->orderb($_POST['id']);
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

    if (isset($_POST['status2'])) {

        if (!empty($_FILES["file"]["name"])) {
            $tempPath = $_FILES['file']['tmp_name'];
            $result = (new UploadApi())->upload($tempPath);
            $imageName = $result['public_id'];
            $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
            $update = $sql->update_order_status2($_POST['id'], 3,$fileName);
            if ($update) {
                $order_status = $sql->checkst($_POST['id']);
                $st = mysqli_fetch_array($order_status);
    
                $num = mysqli_num_rows($order_status);
    
                if ($num > 0) {
                    header("location: order_detail.php?id=".$_POST['id']); 
                } else {
                    header("location: order_detail.php?id=".$_POST['id']); 
                }
            } else {
                echo "Failed to update the order status.";
            }
        } else{
            echo "f";
        }
    }

    if (isset($_POST['status3'])) {
        if (!empty($_FILES["file1"]["name"]) && !empty($_FILES["file2"]["name"])) {
            $file1Uploaded = false;
            $file2Uploaded = false;
            if (!empty($_FILES["file1"]["name"])) {
                $tempPath = $_FILES['file1']['tmp_name'];
                $result = (new UploadApi())->upload($tempPath);
                $imageName = $result['public_id'];
                $file1Name = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                $file1Uploaded = true;
            }
            if (!empty($_FILES["file2"]["name"])) {
                $tempPath = $_FILES['file2']['tmp_name'];
                $result = (new UploadApi())->upload($tempPath);
                $imageName = $result['public_id'];
                $file2Name = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                $file2Uploaded = true;
            }
    
            if ($file1Uploaded && $file2Uploaded) {
                $update = $sql->update_order_status3($_POST['id'], 4, $file1Name, $file2Name);
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
    

?>