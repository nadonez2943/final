<?php 

    define('DB_SERVER', 'localhost'); // Your hostname
    define('DB_USER', 'root'); // Database Username
    define('DB_PASS', ''); // Database Password
    define('DB_NAME', 'roengrang'); // Database Name

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        }

        public function orID() {
            $orID = mysqli_insert_id($this->dbcon);
            return $orID;
        }

        public function usernameavailable($email) {
            $checkuser = mysqli_query($this->dbcon, "SELECT email FROM users WHERE email = '$email'");
            return $checkuser;
        }

        public function usershop($user_id) {
            $usershop = mysqli_query($this->dbcon, "SELECT shop_id FROM shop WHERE user_id = '$user_id'");
            return $usershop;
        }

        public function registration($fname, $uname, $uemail, $password) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO users(fullname, username, useremail, password) VALUES('$fname', '$uname', '$uemail', '$password')");
            return $reg;
        }

        public function signin($email, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT user_id, fullname FROM users WHERE email = '$email' AND password = '$password'");
            return $signinquery;
        }

        #เรียกสินค้า
        public function allproduct() {
            $allpro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id ");
            return $allpro;
        }
        public function product($pro_id) {
            $pro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE products.pro_id = '$pro_id' ORDER BY products.pro_id ");
            return $pro;
        }
        public function shoppro($shop_id) {
            $shoppro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE products.shop_id = '$shop_id' ORDER BY RAND() LIMIT 5");
            return $shoppro;
        }
        public function productlike($user_id) {
            $pro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE products.pro_id = '$pro_id' ORDER BY products.pro_id ");
            return $pro;
        }
        public function tabproduct() { #สินค้ายังน้อย เดะค่อยทำหมวดหมู่
            $tabpro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id ORDER BY RAND() LIMIT 8 ");
            return $tabpro;
        }
        public function bestselled() {
            $bestselled = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id ORDER BY products.pro_selled DESC LIMIT 12 ");
            return $bestselled;
        }

        #คอมเมนท์
        public function comment($pro_id) {
            $comment = mysqli_query($this->dbcon, "SELECT * FROM comment LEFT JOIN users ON comment.user_id=users.user_id WHERE comment.pro_id = '$pro_id'");
            return $comment;
        }
        public function reply($com_id) {
            $rep = mysqli_query($this->dbcon, "SELECT * FROM com_reply LEFT JOIN users ON com_reply.user_id=users.user_id WHERE com_reply.com_id = '$com_id' ");
            return $rep;
        }

        #ตะกร้า
        public function cart($user_id) {
            $cart = mysqli_query($this->dbcon, "SELECT *,products.pro_price*products.pro_id as price FROM cart LEFT JOIN products ON cart.pro_id = products.pro_id LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE cart.user_id = '$user_id'");
            return $cart;
        }
        public function rowsum($user_id) {
            $rs = mysqli_query($this->dbcon, "SELECT COUNT(products.pro_price*products.pro_id) as rowc,SUM(products.pro_price*products.pro_id) as total FROM cart LEFT JOIN products ON cart.pro_id = products.pro_id WHERE cart.user_id = '$user_id'");
            return $rs;
        }
        public function deletecart($cart_id) {
            $delcart = mysqli_query($this->dbcon, "DELETE FROM cart WHERE cart.id='$cart_id'");
            return $delcart;
        }

        #เรียกหมวดหมู่
        public function catagory() {
            $cat = mysqli_query($this->dbcon, "SELECT * FROM catagory");
            return $cat;
        }

        #ที่อยู่
        public function useraddress($user_id) {
            $address = mysqli_query($this->dbcon, "SELECT * FROM user_address WHERE user_id='$user_id'" );
            return $address;
        }
        
        #ออร์เดอร์
        public function allorder($user_id) {
            $allord = mysqli_query($this->dbcon, "SELECT * FROM orders LEFT JOIN products ON orders.pro_id = products.pro_id LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE orders.user_id = '$user_id'");
            return $allord;
        }
        public function rowor($user_id) {
            $rowor = mysqli_query($this->dbcon, "SELECT COUNT(*) as rowor FROM orders LEFT JOIN products ON orders.pro_id = products.pro_id WHERE orders.user_id = '$user_id'");
            return $rowor;
        }
        public function checkst($id) {
            $st = mysqli_query($this->dbcon, "SELECT order_status FROM orders WHERE orders.id = '$id'");
            return $st;
        }
        public function order($ord_id) {
            $order = mysqli_query($this->dbcon, "SELECT * FROM orders LEFT JOIN products ON orders.pro_id = products.pro_id LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE orders.id = '$ord_id'");
            return $order;
        }
        

        #insert
        public function addorders($pro_id,$user_id,$ord_name,$ord_amount,$sumprice,$sentprice,$totalprice,$ord_tel,$ord_address,$ord_road,$ord_soi,$ord_province,$ord_district,$ord_subdistrict,$ord_postID,$ord_note,$payment) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO orders(pro_id,user_id,ord_name,ord_amount,sum_price,sent_price,total_price,ord_tel,ord_address,ord_road,ord_soi,ord_province,ord_district,ord_subdistrict,ord_postID,ord_note,payment) VALUES('$pro_id','$user_id','$ord_name','$ord_amount','$sumprice','$sentprice','$totalprice','$ord_tel','$ord_address','$ord_road','$ord_soi','$ord_province','$ord_district','$ord_subdistrict','$ord_postID','$ord_note','$payment')");
            return $reg;
        }

        #update
        public function update_order_status($id,$order_status) {
            $update_order_status = mysqli_query($this->dbcon, "UPDATE orders SET order_status = '$order_status' WHERE orders.id='$id'");
            return $update_order_status;
        }

    }

?>