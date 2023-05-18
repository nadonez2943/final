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

        public function usernameavailable($email) {
            $checkuser = mysqli_query($this->dbcon, "SELECT email FROM users WHERE email = '$email'");
            return $checkuser;
        }

        public function registrationWorld($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_district,$user_provinces,$user_postID,$fileName) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO users(user_email,user_password,user_fullname,user_tel,user_address,user_road,user_soi,user_subdistrict,user_district,user_provinces,user_postID,user_img,user_role,user_regDate) VALUES ('$user_email','$user_password','$user_fullname','$user_tel','$user_address','$user_road','$user_soi','$user_subdistrict','$user_district','$user_provinces','$user_postID','$fileName','3',NOW())");
            return $reg;
        }

        public function registrationLocal($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_district,$user_provinces,$user_postID,$fileName) {
            $reg = mysqli_query($this->dbcon, "INSERT INTO users(user_email,user_password,user_fullname,user_tel,user_address,user_road,user_soi,user_subdistrict,user_district,user_provinces,user_postID,user_img,user_role,user_regDate) VALUES ('$user_email','$user_password','$user_fullname','$user_tel','$user_address','$user_road','$user_soi','$user_subdistrict','$user_district','$user_provinces','$user_postID','$fileName','4',NOW())");
            return $reg;
        }

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

        public function signin($email, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT user_id, user_fullname ,user_role FROM users WHERE user_email = '$email' AND user_password = '$password'");
            return $signinquery;
        }
    }
?>