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

        #เช็ค user shop
        public function usernameavailable($email) {
            $checkuser = mysqli_query($this->dbcon, "SELECT email FROM users WHERE email = '$email'");
            return $checkuser;
        }
        public function shopavailable($shop_id) {
            $checkshop = mysqli_query($this->dbcon, "SELECT user_id FROM shop WHERE shop.shop_id = '$shop_id'");
            return $checkshop;
        }

        # product
        public function allproduct() {
            $allpro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id ");
            return $allpro;
        }
        public function product($pro_id) {
            $pro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE products.pro_id = '$pro_id' ORDER BY products.pro_id ");
            return $pro;
        }
        public function MyProduct($user_id) {
            $MyPro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE shop.user_id = '$user_id' ORDER BY products.pro_id ");
            return $MyPro;
        }
        public function insertProduct($shop_id, $cat_id, $pro_name, $pro_price, $pro_amount, $pro_detail, $pro_send, $fileName) {
            $insertProduct = mysqli_query($this->dbcon, "INSERT INTO products(shop_id, cat_id, pro_name, pro_price, pro_amount, pro_detail, pro_point, add_date, update_date, pro_status, pro_send, pro_img ) VALUES( '$shop_id', '$cat_id', '$pro_name', '$pro_price', '$pro_amount', '$pro_detail', '5', NOW(), NOW(), '1', '$pro_send', '$fileName' )" );
            return $insertProduct;
        }
        public function insertShop($user_id, $shop_name, $shop_detail, $fileName) {
            $insertShop = mysqli_query($this->dbcon, "INSERT INTO shop(user_id, shop_name, shop_detail, shop_img, shop_point ) VALUES( '$user_id', '$shop_name', '$shop_detail', '$fileName', '5' )" );
            return $insertShop;
        }
        public function insertOrder($cus_name,$cus_address,$cus_tel,$totalPrice) {
            $insertOrder = mysqli_query($this->dbcon, "INSERT INTO orders(ord_name, ord_addess, ord_tel, ord_totalPrice, ord_status ) VALUES( '$cus_name', '$cus_address', '$cus_tel' , '$totalPrice' , '1')");
            return $insertOrder;
        }
        public function insertOr_Detail($orderID,$pro_id,$price,$order_amount,$total) {
            $insertOr_Detail = mysqli_query($this->dbcon, "INSERT INTO orders_detail(ord_id, pro_id, order_price, order_amount, order_totalPrice  ) VALUES( '$orderID', '$pro_id', '$price', '$order_amount' , '$total' )");
            return $insertOr_Detail;
        }

        public function upPro_amount($pro_id,$order_amount) {
            $upPro_amount = mysqli_query($this->dbcon, "UPDATE products set pro_amount = pro_amount - '$order_amount' WHERE pro_id = $pro_id");
            return $upPro_amount;
        }
        public function comment($pro_id) {
            $comment = mysqli_query($this->dbcon, "SELECT * FROM comment LEFT JOIN users ON comment.user_id=users.user_id WHERE pro_id = '$pro_id'");
            return $comment;
        }

        #order
        public function order($ord_id) {
            $order = mysqli_query($this->dbcon, "SELECT * FROM orders LEFT JOIN products ON orders.pro_id = products.pro_id LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE orders.id = '$ord_id'");
            return $order;
        }
        public function orderDetail($ord_id) {
            $order = mysqli_query($this->dbcon, "SELECT * FROM orders WHERE orders.ord_id = '$ord_id'");
            return $order;
        }
        public function orders($order_status) {
            $ord = mysqli_query($this->dbcon, "SELECT * FROM orders LEFT JOIN products ON orders.pro_id = products.pro_id LEFT JOIN shop ON products.shop_id = shop.shop_id WHERE orders.order_status = '$order_status'");
            return $ord;
        }
        public function checkst($id) {
            $st = mysqli_query($this->dbcon, "SELECT order_status FROM orders WHERE orders.id = '$id'");
            return $st;
        }

        #อัปเดต      
        public function update_order_status($id,$order_status) {
            $update_order_status = mysqli_query($this->dbcon, "UPDATE orders SET order_status = '$order_status' WHERE orders.id='$id'");
            return $update_order_status;
        }
    }

?>