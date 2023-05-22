<?php
    session_start();
    include_once 'functions.php';

    $sql = new DB_con();

    if (isset($_POST['function']) && $_POST['function'] == 'thisweek') {
        $row = $sql->thisweekp($_SESSION['shop_id']);
        $thisweek=mysqli_fetch_array($row);

        echo $thisweek;
    }
    
?>