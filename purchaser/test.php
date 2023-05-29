<?php 
    session_start();
    include_once('functions.php');  

	$sql = new DB_con();

	$cart = $sql->cart($_SESSION['id']);
	$rs = $sql->rowsum($_SESSION['id']);
	$RS=mysqli_fetch_array($rs);

	if ($RS[0]>0){
		$row = $RS[0];
	}else{$row = 0 ;}

    $or = $sql->rowor($_SESSION['id']);
    $OR=mysqli_fetch_array($or);
		

    if ($_SESSION['user_role'] != 2) {
        header("location: /roengrang/error/401.php");
    }else{
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Roengrang Shop</title>

	
</head>
<body class="js">
	
                <?php
                    $numnew = $sql->countorder(0,$_SESSION['id']);
                    $numnew=mysqli_fetch_array($numnew);

                    $numdoing = $sql->countorder(1,$_SESSION['id']);
                    $numdoing=mysqli_fetch_array($numdoing);

                    $numprepare = $sql->countorder(2,$_SESSION['id']);
                    $numprepare=mysqli_fetch_array($numprepare);

                    $numship = $sql->countorder(3,$_SESSION['id']);
                    $numship=mysqli_fetch_array($numship);

                    $numshiped = $sql->countorder(4,$_SESSION['id']);
                    $numshiped=mysqli_fetch_array($numshiped);

                    $numsuccess = $sql->countorder(5,$_SESSION['id']);
                    $numsuccess=mysqli_fetch_array($numsuccess);

                    $numcancle = $sql->countorder(6,$_SESSION['id']);
                    $numcancle=mysqli_fetch_array($numcancle);
                ?>
                <input type="number" id="numnew" value="<?=$numnew['row_count']?>" onchange="reloadPage()">
                <input type="number" id="numdoing" value="<?=$numdoing['row_count']?>" onchange="reloadPage()">
                <input type="number" id="numprepare" value="<?=$numprepare['row_count']?>" onchange="reloadPage()">
                <input type="number" id="numship" value="<?=$numship['row_count']?>" onchange="reloadPage()">
                <input type="number" id="numshiped" value="<?=$numshiped['row_count']?>" onchange="reloadPage()">
                <input type="number" id="numsuccess" value="<?=$numsuccess['row_count']?>" onchange="reloadPage()">
                <input type="number" id="numcancle" value="<?=$numcancle['row_count']?>" onchange="reloadPage()">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        function reloadPage() {
            location.reload();
        }

        checkOrder();

        function checkOrder() {
            var numnew = $('#numnew').val();
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row:$('#numnew').val(),function: 'numnew' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numnew').val(data);
                    } 
                },
                complete: function() {
                    setTimeout(checkOrder, 5000); 
                }
            });
            var numdoing = parseInt($('#numdoing').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numdoing,function: 'numdoing' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numdoing').val(data);
                    } 
                }
            });
            var numprepare = parseInt($('#numprepare').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numprepare,function: 'numprepare' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numprepare').val(data);
                    } 
                }
            });

            var numship = parseInt($('#numship').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numship,function: 'numship' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numship').val(data);
                    } 
                }
            });

            var numshiped = parseInt($('#numshiped').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numshiped,function: 'numshiped' }, 
                success: function(data) {
                    if (data != numshiped) {
                        $('#numshiped').val(data);
                    } 
                }
            });

            var numsuccess = parseInt($('#numsuccess').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numsuccess,function: 'numsuccess' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numsuccess').val(data);
                    } 
                }
            });

            var numcancle = parseInt($('#numcancle').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { row: numcancle,function: 'numcancle' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numcancle').val(data);
                    } 
                }
            });

            var numall = parseInt($('#numall').val());
            $.ajax({
                type: 'POST',
                url: 'checkorder.php',
                data: { function: 'numall' }, 
                success: function(data) {
                    if (data == 1) {
                        $('#numall').val(data);
                    } 
                }
            });
        }
    });

</script>
</body>
</html>

<?php 
    }
?>