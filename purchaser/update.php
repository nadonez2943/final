<?php
    include_once('functions.php'); 
        
    $sql = new DB_con();

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


?>