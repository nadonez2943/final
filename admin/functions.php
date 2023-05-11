<?php 
     
    define('DB_SERVER', 'localhost'); // Your hostname
    define('DB_USER', 'root'); // Database Username
    define('DB_PASS', ''); // Database Password
    define('DB_NAME', 'roengrang'); // Database Name
    date_default_timezone_set('Asia/Bangkok');

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

        public function useremailavailable($email) {
            $checkemail = mysqli_query($this->dbcon, "SELECT user_email FROM users WHERE user_email = '$email'");
            return $checkemail;
        }

        public function signin($email, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT user_id, user_fullname ,user_role FROM users WHERE user_email = '$email' AND user_password = '$password'");
            return $signinquery;
        }

        #ที่อยู่
        public function province() {
            $province = mysqli_query($this->dbcon, "SELECT * FROM provinces ");
            return $province;
        }
        public function district($id) {
            $district = mysqli_query($this->dbcon, "SELECT * FROM district WHERE province_code=$id");
            return $district;
        }
        public function subdistrict($id) {
            $subdistrict = mysqli_query($this->dbcon, "SELECT * FROM subdistrict WHERE district_code=$id");
            return $subdistrict;
        }
        public function zip_code($id) {
            $zip_code = mysqli_query($this->dbcon, "SELECT * FROM subdistrict WHERE code=$id");
            return $zip_code;
        }
        public function address($sub_id) {
            $address = mysqli_query($this->dbcon, "SELECT subdistrict.name_th as subdistrict_name,district.name_th  as district_name,provinces.name_th  as provinces_name,zip_code FROM subdistrict  LEFT JOIN district ON subdistrict.district_code=district.code LEFT JOIN provinces ON district.province_code=provinces.code WHERE subdistrict.code='$sub_id'");
            return $address;
        }
        public function useraddress($user_id) {
            $address = mysqli_query($this->dbcon, "SELECT * FROM user_address WHERE user_id='$user_id'" );
            return $address;
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------

        #เรียกรายงาน
        public function reportpro() {
            $repPro = mysqli_query($this->dbcon, "SELECT * FROM report_pro LEFT JOIN users ON report_pro.user_id=users.user_id LEFT JOIN products ON report_pro.pro_id=products.pro_id ");
            return $repPro;
        }
        public function report_pro($id) {
            $report_pro = mysqli_query($this->dbcon, "SELECT * FROM report_pro LEFT JOIN users ON report_pro.user_id=users.user_id LEFT JOIN products ON report_pro.pro_id=products.pro_id WHERE report_pro.id='$id'");
            return $report_pro;
        }
        public function reportshop() {
            $repShop = mysqli_query($this->dbcon, "SELECT * FROM report_shop LEFT JOIN users ON report_shop.user_id=users.user_id LEFT JOIN shop ON report_shop.shop_id=shop.shop_id");
            return $repShop;
        }
        public function reportproRead() {
            $repProR = mysqli_query($this->dbcon, "SELECT * FROM report_pro LEFT JOIN users ON report_pro.user_id=users.user_id LEFT JOIN products ON report_pro.pro_id=products.pro_id WHERE report_status=1");
            return $repProR;
        }
        public function reportshopRead() {
            $repShopR = mysqli_query($this->dbcon, "SELECT * FROM report_shop LEFT JOIN users ON report_shop.user_id=users.user_id LEFT JOIN shop ON report_shop.shop_id=shop.shop_id WHERE report_status=1");
            return $repShopR;
        }
        public function reportproNoRead() {
            $repProN = mysqli_query($this->dbcon, "SELECT * FROM report_pro LEFT JOIN users ON report_pro.user_id=users.user_id LEFT JOIN products ON report_pro.pro_id=products.pro_id WHERE report_status=0");
            return $repProN;
        }
        public function reportshopNoRead() {
            $repShopN = mysqli_query($this->dbcon, "SELECT * FROM report_shop LEFT JOIN users ON report_shop.user_id=users.user_id LEFT JOIN shop ON report_shop.shop_id=shop.shop_id WHERE report_status=0");
            return $repShopN;
        }

        // --------------------------------------------------------------------------------------------------------------------------------------

        #เพิ่มสมาชิก
        public function registrationWorld($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_district,$user_provinces,$user_postID,$fileName) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO users(user_email,user_password,user_fullname,user_tel,user_address,user_road,user_soi,user_subdistrict,user_district,user_provinces,user_postID,user_img,user_role,user_regDate) VALUES ('$user_email','$user_password','$user_fullname','$user_tel','$user_address','$user_road','$user_soi','$user_subdistrict','$user_district','$user_provinces','$user_postID','$fileName','3',NOW())");
            return $reg;
        }
        public function registrationLocal($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_district,$user_provinces,$user_postID,$fileName) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO users(user_email,user_password,user_fullname,user_tel,user_address,user_road,user_soi,user_subdistrict,user_district,user_provinces,user_postID,user_img,user_role,user_regDate) VALUES ('$user_email','$user_password','$user_fullname','$user_tel','$user_address','$user_road','$user_soi','$user_subdistrict','$user_district','$user_provinces','$user_postID','$fileName','4',NOW())");
            return $reg;
        }
        public function addmember($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_role,$fileName) {
            $addmem = mysqli_query($this->dbcon, "INSERT INTO users(user_email,user_password,user_fullname,user_tel,user_address,user_road,user_soi,user_subdistrict,user_img,user_role,user_regDate) VALUES ('$user_email','$user_password','$user_fullname','$user_tel','$user_address','$user_road','$user_soi','$user_subdistrict','$fileName','$user_role',NOW())");
            return $addmem;
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------

        #อัปเดต
        public function update_request($user_id,$status) {
            $update_request = mysqli_query($this->dbcon, "UPDATE users SET user_role = '$status' WHERE users.user_id='$user_id'");
            return $update_request;
        }
        public function update_user_status($st_full,$user_id) {
            $update_user_status = mysqli_query($this->dbcon, "UPDATE users SET user_status = '$st_full' WHERE users.user_id='$user_id'");
            return $update_user_status;
        }
        public function update_pro_status($st_full,$pro_id) {
            $update_pro_status = mysqli_query($this->dbcon, "UPDATE products SET pro_status = '$st_full' WHERE products.pro_id='$pro_id'");
            return $update_pro_status;
        }
        public function update_shop_status($st_full,$shop_id) {
            $update_shop_status = mysqli_query($this->dbcon, "UPDATE shop SET shop_status = '$st_full' WHERE shop.shop_id='$shop_id'");
            return $update_shop_status;
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------

        #อัปเดต

        public function delete_user($user_id) {
            $delete_user = mysqli_query($this->dbcon, "DELETE FROM users WHERE user_id='$user_id'");
            $delete_cart = mysqli_query($this->dbcon, "DELETE FROM cart WHERE user_id='$user_id'");
            $delete_comment = mysqli_query($this->dbcon, "DELETE FROM comment WHERE user_id='$user_id'");
            $delete_com_reply = mysqli_query($this->dbcon, "DELETE FROM com_reply WHERE user_id='$user_id'");
            $delete_detect_conversation = mysqli_query($this->dbcon, "DELETE FROM detect_conversation WHERE user_id='$user_id'");
            $delete_orders = mysqli_query($this->dbcon, "DELETE FROM orders WHERE user_id='$user_id'");
            $delete_report_pro = mysqli_query($this->dbcon, "DELETE FROM report_pro  WHERE user_id='$user_id'");
            $delete_report_shop = mysqli_query($this->dbcon, "DELETE FROM report_shop  WHERE user_id='$user_id'");
            $delete_shop = mysqli_query($this->dbcon, "DELETE FROM shop WHERE user_id='$user_id'");
            return $delete_user;
            return $delete_cart;
            return $delete_comment;
            return $delete_com_reply;
            return $delete_detect_conversation;
            return $delete_orders;
            return $delete_report_pro;
            return $delete_report_shop;
            return $delete_shop;
        }
        public function delete_products($pro_id) {
            $delete_cart = mysqli_query($this->dbcon, "DELETE FROM cart WHERE pro_id='$pro_id'");
            $delete_comment = mysqli_query($this->dbcon, "DELETE FROM comment WHERE pro_id='$pro_id'");
            $delete_com_reply = mysqli_query($this->dbcon, "DELETE FROM com_reply WHERE pro_id='$pro_id'");
            $delete_report_pro = mysqli_query($this->dbcon, "DELETE FROM report_pro WHERE pro_id='$pro_id'");
            $delete_products = mysqli_query($this->dbcon, "DELETE FROM products WHERE pro_id='$pro_id'");
            return $delete_cart;
            return $delete_comment;
            return $delete_com_reply;
            return $delete_report_pro;
            return $delete_products;
        }
        public function delete_shop($shop_id) {
            $delete_report_shop = mysqli_query($this->dbcon, "DELETE FROM report_shop WHERE shop_id='$shop_id'");
            $delete_shop = mysqli_query($this->dbcon, "DELETE FROM shop WHERE shop_id='$shop_id'");
            return $delete_pro_shop;
            return $delete_shop;
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------

        #เรียกสินค้า
        public function allproduct() {
            $allpro = mysqli_query($this->dbcon, "SELECT * FROM products ");
            return $allpro;
        }
        public function products($pro_id) {
            $pro = mysqli_query($this->dbcon, "SELECT * FROM products LEFT JOIN shop ON products.shop_id=shop.shop_id LEFT JOIN catagory ON products.cat_id=catagory.id WHERE pro_id='$pro_id' ");
            return $pro;
        }
        public function shop_products($shop_id) {
            $shop_pro = mysqli_query($this->dbcon, "SELECT * FROM products WHERE shop_id='$shop_id' ");
            return $shop_pro;
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------

        #เรียกสมาชิก
        public function allmember() {
            $allmem = mysqli_query($this->dbcon, "SELECT * FROM users ");
            return $allmem;
        }
        public function member($user_id) {
            $mem = mysqli_query($this->dbcon, "SELECT * FROM users WHERE user_id='$user_id' ");
            return $mem;
        }
        public function adminmember() {
            $adminmem = mysqli_query($this->dbcon, "SELECT * FROM users WHERE user_role=1");
            return $adminmem;
        }
        public function groupmember() {
            $groupmem = mysqli_query($this->dbcon, "SELECT * FROM users WHERE user_role=2");
            return $groupmem;
        }
        public function genmember() {
            $genmem = mysqli_query($this->dbcon, "SELECT * FROM users WHERE user_role=3");
            return $genmem;
        }
        public function requestmember() {
            $reqmem = mysqli_query($this->dbcon, "SELECT * FROM users WHERE user_role=4");
            return $reqmem;
        }
        public function requestdetail($user_id) {
            $reqde = mysqli_query($this->dbcon, "SELECT * FROM users WHERE user_id='$user_id'");
            return $reqde;
        }

        // ----------------------------------------------------------------------------------------------------------------------------------------

        #เรียกร้านค้า
        public function shop($shop_id) {
            $shop = mysqli_query($this->dbcon, "SELECT * FROM shop LEFT JOIN users ON shop.user_id=users.user_id WHERE shop_id='$shop_id' ");
            return $shop;
        }
        public function whoshop($user_id) {
            $whoshop = mysqli_query($this->dbcon, "SELECT * FROM shop WHERE user_id='$user_id' ");
            return $whoshop;
        }
        public function allshop() {
            $allshop = mysqli_query($this->dbcon, "SELECT * FROM shop LEFT JOIN users ON shop.user_id=users.user_id ");
            return $allshop;
        }
    }
?>