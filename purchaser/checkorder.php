<?php 

    session_start();
    include_once('functions.php');

    $sql = new DB_con();

    if (isset($_POST['function']) && $_POST['function'] == 'numnew') {
        $allord = $sql->countorder(0, $_SESSION['id']);
        $numnew = mysqli_fetch_array($allord);
        if ($numnew['row_count'] != $_POST['numnew']) {
            echo 1;
        }else{
            echo 0;
        }
    }
    
    

    if (isset($_POST['function']) && $_POST['function'] == 'numdoing') {
        $allord = $sql->countorder(1,$_SESSION['id']);
        $numdoing=mysqli_fetch_array($allord);

        if ($numdoing['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    if (isset($_POST['function']) && $_POST['function'] == 'numprepare') {

        $allord = $sql->countorder(2,$_SESSION['id']);
        $numprepare=mysqli_fetch_array($allord);

        if ($numprepare['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    if (isset($_POST['function']) && $_POST['function'] == 'numship') {

        $allord = $sql->countorder(3,$_SESSION['id']);
        $numship=mysqli_fetch_array($allord);

        if ($numship['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    if (isset($_POST['function']) && $_POST['function'] == 'numshiped') {

        $allord = $sql->countorder(4,$_SESSION['id']);
        $numshiped=mysqli_fetch_array($allord);

        if ($numshiped['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    if (isset($_POST['function']) && $_POST['function'] == 'numsuccess') {

        $allord = $sql->countorder(5,$_SESSION['id']);
        $numsuccess=mysqli_fetch_array($allord);

        if ($numsuccess['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    if (isset($_POST['function']) && $_POST['function'] == 'numcancle') {

        $row = $sql->countorder(6,$_SESSION['id']);
        $numcancle=mysqli_fetch_array($row);

        if ($numcancle['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }
    
    if (isset($_POST['function']) && $_POST['function'] == 'numall') {

        $row = $sql->countallorder($_SESSION['id']);
        $numall=mysqli_fetch_array($row);

        if ($numall['row_count']!=$_POST['row']) {
            echo 1;
        }else{
            echo 0;
        }
    }

    

?>