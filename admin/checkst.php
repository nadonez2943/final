<?php 

    include_once('functions.php');

    $sql = new DB_con();

    if (isset($_POST['function']) && $_POST['function'] == 'newuser') {
        $countrequest = $sql->countrequest();
        $countrequest=mysqli_fetch_array($countrequest);
        if ($countrequest['countrequest'] != $_POST['numnew']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    

?>