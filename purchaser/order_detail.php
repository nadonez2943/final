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
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/Logo3.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	
</head>
<body class="js">
	
	<!-- Preloader -->
	<!-- End Preloader -->
		
		<!-- Header -->
            <header class="header shop">
            <!-- Topbar -->
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-12">
                            <!-- Top Left -->
                            <div class="top-left">
                                <ul class="list-main">
                                    <li><i class="ti-headphone-alt"></i>060 801-582</li>
                                    <li><i class="ti-email"></i> Roengrang.18160@gmail.com</li>
                                </ul>
                            </div>
                            <!--/ End Top Left -->
                        </div>
                        <div class="col-lg-7 col-md-12 col-12">
                            <!-- Top Right -->
                            <div class="right-content">
                                <ul class="list-main">
                                    <li><i class="ti-bag"></i> <a href="goShop.php">ร้านค้าของฉัน</a></li>
                                    <li><i class="ti-user"></i> <a href="#"><?=$_SESSION['fname']?></a></li>
                                    <li><i class="ti-power-off"></i><a href="/roengrang/logout.php">ออกจากระบบ</a></li>
                                </ul>
                            </div>
                            <!-- End Top Right -->
                        </div>
                    </div>
                </div>
            </div>
			<!-- End Topbar -->
			<div class="middle-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-12">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.php"><img src="images/Logo4.png" alt="logo" hieght=""></a>
                            </div>
                            <!--/ End Logo -->
                            <!-- Search Form -->
                            <div class="search-top">
                                <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                                <!-- Search Form -->
                                <div class="search-top">
                                    <form class="search-form">
                                        <input type="text" placeholder="Search here..." name="search">
                                        <button value="search" type="submit"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                                <!--/ End Search Form -->
                            </div>
                            <!--/ End Search Form -->
                            <div class="mobile-nav"></div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-12">
                            <div class="search-bar-top">
                                <div class="search-bar">
                                    <select>
                                        <option selected="selected">หมวดหมู่ทั้งหมด</option>
										<?php
											$cat = $sql->catagory();
                                            while($Cat=mysqli_fetch_array($cat)){
                                        ?>
                                        <option><?=$Cat['cat_name']?></option>
										<?php
											}
										?>
                                    </select>
                                    <form>
                                        <input name="search" placeholder="ค้นหาสินค้าที่นี่....." type="search">
                                        <button class="btnn"><i class="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-12">
                            <div class="right-bar">
                                <!-- Search Form -->
                                <div class="sinlge-bar">
                                    <a href="productlike.php"><i class="fa fa-heart" aria-hidden="true"></i> สินค้าที่ถูกใจ</a>
                                </div>
                                <div class="sinlge-bar shopping">
									<?php 
										if ($RS[0]>0){
									?>
									<a  class="single-icon"><i class="ti-shopping-cart-full"></i> <span class="total-count"><?=$row?></span></a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span><?=$row?> รายการ</span>
                                            <a href="cart.php">ดูตะกร้า</a>
                                        </div>
                                        <ul class="shopping-list">
											<?php
												while($Cart=mysqli_fetch_array($cart)){
											?>
                                            <li>
                                                <a href="deletecart.php?cart_id=<?=$Cart['id']?>" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                                <a class="cart-img" href="product.php?pro_id=<?=$Cart['pro_id']?>"><img src="\roengrang\img/<?=$Cart['pro_img']?>" alt="#"></a>
                                                <h4><a href="product.php?pro_id=<?=$Cart['pro_id']?>"><?=$Cart['pro_name']?></a></h4>
                                                <p class="quantity"><?=$Cart['amount']?> - <span class="amount"><?=$Cart['price']?> บาท</span></p>
                                            </li>
											<?php
												}
											?>
                                        </ul>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>รวม</span>
                                                <span class="total-amount"><?=$RS['total']?> บาท</span>
                                            </div>
                                            <a href="checkout.php" class="btn animate">ชำระเงิน</a>
                                        </div>
                                    </div>
									<?php 
										}else{
									?>
									<a class="single-icon"><i class="ti-shopping-cart-full"></i> <span class="total-count"><?=$row?></span></a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>0 รายการ</span>
                                            <a href="cart.php">ดูตะกร้า</a>
                                        </div>
                                        <ul class="shopping-list text-center">
                                            <li>
                                                <a>ไม่มีรายการ</a> 
                                            </li>
                                        </ul>
                                    </div>
									<?php
										}
									?>
                                    <!--/ End Shopping Item -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<!-- Header Inner -->
			<div class="header-inner">
                <div class="container">
                    <div class="cat-nav-head">
                        <div class="row" >
                            <div class="col-12">
                                <div class="menu-area" style="display: flex; justify-content: center;">
                                    <!-- Main Menu -->
                                    <nav class="navbar navbar-expand-lg">
                                        <div class="navbar-collapse">	
                                            <div class="nav-inner">	
                                                <ul class="nav main-menu menu navbar-nav">
                                                        <li><a href="index.php">หน้าหลัก</a></li>
                                                        <li><a href="allproduct.php">สินค้า</a></li>	
                                                        <!-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                            <ul class="dropdown">
                                                                <li><a href="shop-grid.php">Shop Grid</a></li>
                                                                <li><a href="checkout.php">Checkout</a></li>
                                                            </ul>
                                                        </li>								 -->
                                                        <!-- <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                            <ul class="dropdown">
                                                                <li><a href="blog-single-sidebar.php">Blog Single Sidebar</a></li>
                                                            </ul>
                                                        </li> -->
                                                        <li class="active"><a>ตะกร้าสินค้า</a></li>
                                                        <li><a href="allorder.php">รายการสั่งซื้อ</a></li>
                                                        <li><a href="contact.php">เกี่ยวกับเรา</a></li>
                                                    </ul>
                                            </div>
                                        </div>
                                    </nav>
                                    <!--/ End Main Menu -->	
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Header Inner -->
        </header>
		<!--/ End Header -->
	
		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index.php">หน้าหลัก<i class="ti-arrow-right"></i></a></li>
								<li><a href="cart.php">ตะกร้าสินค้า<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a>ชำระเงิน</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Checkout -->
		<section class="shop checkout section">
        <div class="container">
                    <?php
                        $allord = $sql->order($_GET['id']);
                        $Allord=mysqli_fetch_array($allord);
                    ?>
                    <h4 class="mt-4">คำสั่งซื้อที่ #<?=$Allord['id']?></h4>
                        <hr>
                        <div class="row">
                            <div class="col-9">
                                <div class="card"> 
                                    <div class="card-body">
                                        <h5 class="mb-4">รายการสินค้า</h5> 
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-4"><img src="\roengrang\img/<?=$Allord['pro_img']?>" style="width: 96px;hieght: 96px;"></div>
                                                        <div class="col-6"><?=$Allord['pro_name']?></div>
                                                    </div>
                                                </div>
                                                <div class="col-3"><?=$Allord['pro_price']?> บาท</div>
                                                <div class="col-3">จำนวน : <?=$Allord['ord_amount']?></div>
                                            </div>
                                            <hr>

                                        <h5 class="mb-4">ยอดรวมการสั่งซื้อ</h5>    
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-4"> 
                                                        ยอดรวม : <?=$Allord['sum_price']?> บาท
                                                    </div>
                                                    <div class="col-4">
                                                        ค่าจัดส่ง : <?=$Allord['sent_price']?> บาท
                                                    </div>
                                                    <div class="col-4">
                                                        ยอดรวมสุทธิ : <?=number_format($Allord['total_price'],2)?> บาท
                                                    </div>
                                                </div>
                                            </div>
                                        </div><hr>

                                        <h5 class="mb-4">ที่อยู่ในการจัดส่ง</h5>    
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-3"><?=$Allord['ord_name']?></div>
                                                    <div class="col-3">เบอร์โทรศัพท์ : <?=$Allord['ord_tel']?></div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-3"> 
                                                        ที่อยู่ : <?=$Allord['ord_address']?>
                                                    </div>
                                                    <div class="col-3">
                                                        ถนน : <?=$Allord['ord_road']?>
                                                    </div>
                                                    <div class="col-3">
                                                        ซอย : <?=$Allord['ord_soi']?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-3">
                                                        ตำบล/แขวง : <?=$Allord['ord_subdistrict']?>
                                                    </div>
                                                    <div class="col-3">
                                                        อำเภอ/เขต : <?=$Allord['ord_district']?>
                                                    </div>
                                                    <div class="col-3">
                                                        จังหวัด : <?=$Allord['ord_province']?>
                                                    </div>
                                                    <div class="col-3">
                                                        รหัสไปรษณีย์ : <?=$Allord['ord_postID']?>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        หมายเหตุ : <?=$Allord['ord_note']?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h5>สถานะคำสั่งซื้อ</h5><hr>
                                        <div class="row justify-content-center">
                                            <p id="status">
                                                <?php
                                                switch ($Allord['order_status']) {
                                                    case 0:
                                                        echo "ส่งคำสั่งซื้อแล้ว";
                                                        break;
                                                    case 1:
                                                        echo "<p>ร้านค้ารับคำสั่งซื้อ</p>";
                                                        break;
                                                    case 2:
                                                        echo "อยู่ระหว่างเตรียมสินค้า";
                                                        break;
                                                    case 3:
                                                        echo "อยู่ระหว่างขนส่ง";
                                                        break;
                                                    case 4:
                                                        echo "ส่งสินค้าแล้ว";
                                                        break;
                                                    case 5:
                                                        echo "คำสั่งซื้อเสร็จสิ้น";
                                                        break;
                                                    case 6:
                                                        echo "ยกเลิก";
                                                        break;
                                                }
                                                ?>
                                            </p>
                                            <input hidden type="number" id="st" value="<?=$Allord['order_status']?>">
                                            <input hidden type="number" id="id" value="<?=$Allord['id']?>">
                                        </div>
                                        <div class="row mt-3 justify-content-center" >
                                            <div id="oparetion"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
		</section>
		<!--/ End Checkout -->
		

		
	
			
		<!-- Start Footer Area -->
        <footer class="footer">
		<!-- Footer Top -->

			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-4 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.php"><img src="images/Logo1.png" width= "20%" height="10%"></a>
							</div>
							<p class="text">เว็บแอปพลิเคชันร้านค้าชุมชนเริงราง จัดทำขึ้นเนื่องด้วยวัตถุประสงค์เพื่อพัฒนาชุมชนเริงรางให้มีวิธีจัดจําหน่ายสินค้าหัตถกรรมที่เป็นเอกลักษณ์เพื่อให้สมาชิกภายใน
                                ชุมชนสามารถซื้อขายสินค้าภายในชุมชน สามารถส่งออกผ่านทางออนไลน์ และวัตถุประสงค์สําคัญเพื่อให้ชาวบ้านมี
                                รายได้เพิ่มเข้ามาหมุนเวียนภายในชุมชนมากขึ้น</p>
						</div>
						<!-- End Single Widget -->
					</div>
					
				</div>
			</div>

		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>โดยนักศึกษาคณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Popper JS -->
	<script src="js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<script src="js/colors.js"></script>
	<!-- Slicknav JS -->
	<script src="js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="js/magnific-popup.js"></script>
	<!-- Fancybox JS -->
	<script src="js/facnybox.min.js"></script>
	<!-- Waypoints JS -->
	<script src="js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="js/nicesellect.js"></script>
	<!-- Ytplayer JS -->
	<script src="js/ytplayer.min.js"></script>
	<!-- Flex Slider JS -->
	<script src="js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="js/easing.js"></script>
	<!-- Active JS -->
	<script src="js/active.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		$(document).ready(function() {
            var quant= $('#quant').val();
            var price= parseFloat($('#price').val());
            var sent = parseFloat($('#sent').val());
            var sum = quant * price ;
            var total = sum + sent ;
            var sum = sum.toFixed(2)
            var total = total.toFixed(2)
            document.getElementById("sumprice").innerText = sum+" บาท" ;
            document.getElementById("sum").value = sum;
            document.getElementById("totalprice").innerText = total+" บาท" ;
            document.getElementById("total").value = total;
            $('#quant').change(function(){
                var quant= $('#quant').val();
                var price= parseFloat($('#price').val());
                var sent = parseFloat($('#sent').val());
                var sum = quant * price ;
                var total = sum + sent ;
                var sum = sum.toFixed(2)
                var total = total.toFixed(2)
                document.getElementById("sumprice").innerText = sum+" บาท" ;
                document.getElementById("sum").value = sum;
                document.getElementById("totalprice").innerText = total+" บาท" ;
                document.getElementById("total").value = total;
            });
		});

	</script>
</body>
</html>
<?php include('script.php');?>
<?php 
    }
?>