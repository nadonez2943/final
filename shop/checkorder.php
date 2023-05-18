<?php 

    session_start();
    include_once('functions.php');

    $sql = new DB_con();

    if (isset($_POST['function']) && $_POST['function'] == 'numnew') {

        $allord = $sql->orders(0,$_SESSION['shop_id']);
        $numnew=mysqli_num_rows($allord);

        if ($numnew) {
            echo $numnew;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numdoing') {

        $allord = $sql->orders(1,$_SESSION['shop_id']);
        $numdoing=mysqli_num_rows($allord);

        if ($numdoing) {
            echo $numdoing;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numprepare') {

        $allord = $sql->orders(2,$_SESSION['shop_id']);
        $numprepare=mysqli_num_rows($allord);

        if ($numprepare) {
            echo $numprepare;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numship') {

        $allord = $sql->orders(3,$_SESSION['shop_id']);
        $numship=mysqli_num_rows($allord);

        if ($numship) {
            echo $numship;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numshiped') {

        $allord = $sql->orders(4,$_SESSION['shop_id']);
        $numshiped=mysqli_num_rows($allord);

        if ($numshiped) {
            echo $numshiped;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numsuccess') {

        $allord = $sql->orders(5,$_SESSION['shop_id']);
        $numsuccess=mysqli_num_rows($allord);

        if ($numsuccess) {
            echo $numsuccess;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numcancle') {

        $allord = $sql->orders(6,$_SESSION['shop_id']);
        $numcancle=mysqli_num_rows($allord);

        if ($numcancle) {
            echo $numcancle;
        } else {
            echo 0;
        }
    }
    if (isset($_POST['function']) && $_POST['function'] == 'numall') {

        $allord = $sql->allorder($_SESSION['shop_id']);
        $numall=mysqli_num_rows($allord);

        if ($numall) {
            echo $numall;
        } else {
            echo 0;
        }
    }

    

?>