<?php 

    session_start();
    include_once 'functions.php';

    $sql = new DB_con();

    require '../cloudinary/vendor/autoload.php';
    use Cloudinary\Configuration\Configuration;
    use Cloudinary\Api\Upload\UploadApi;

    Configuration::instance([
        'cloud' => [
            'cloud_name' => 'dlne5j5ub',
            'api_key' => '232327965775433',
            'api_secret' => 'jJbI7p20xpDJzI4tPNNf9w8R_zg'],
        'url' => ['secure' => true]]);

    // File upload path
    $targetDir = "../img/";

    if (isset($_POST['Newmember'])) {
        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['user_password']); //แปลรหัสเป็น md5
        $user_fullname = $_POST['user_fullname'];
        $user_tel = $_POST['user_tel'];
        $user_address = $_POST['address'];
        $user_road = $_POST['road'];
        $user_soi = $_POST['soi'];
        $user_provinces = $_POST['provinces'];
        $user_district = $_POST['district'];
        $user_subdistrict = $_POST['subdistrict'];
        $user_postID = $_POST['zip_code'];
        $user_role = $_POST['user_role'];

        if($user_role=='1'){ #แอดมิน
            if (!empty($_FILES["file"]["name"])) {
                $tempPath = $_FILES['file']['tmp_name'];
                $result = (new UploadApi())->upload($tempPath);
                $imageName = $result['public_id'];
                $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                $insert = $sql->addmember($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_role,$fileName);
                if ($insert) {
                    $id = $sql->searchid($user_email);
                    $user=mysqli_fetch_array($id);
                    $sub = $sql->address($user_subdistrict);
                    $address=mysqli_fetch_array($sub);
                    $insertaddress = $sql->insertaddress($user['user_id'],$user['user_fullname'],$user['user_tel'],$user['user_address'],$user['user_road'],$user['user_soi'],$user_provinces,$user_district,$user_subdistrict,$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$address['zip_code']);
                    if ($insertaddress) {
                        $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ระบบ";
                        header("location: member.php"); 
                    }
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: addmember.php");
                }
            } else {
                $_SESSION['statusMsg'] = "ยังๆ";
                header("location: addmember.php");
            }
        }
        elseif($user_role=='2'){ #คนใน
            if($user_subdistrict=='191010'){
                if (!empty($_FILES["file"]["name"])) {
                    $tempPath = $_FILES['file']['tmp_name'];
                    $result = (new UploadApi())->upload($tempPath);
                    $imageName = $result['public_id'];
                    $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                            $insert = $sql->addmember($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_role,$fileName);
                            if ($insert) {
                                $id = $sql->searchid($user_email);
                                $user=mysqli_fetch_array($id);
                                $sub = $sql->address($user_subdistrict);
                                $address=mysqli_fetch_array($sub);
                                $insertaddress = $sql->insertaddress($user['user_id'],$user['user_fullname'],$user['user_tel'],$user['user_address'],$user['user_road'],$user['user_soi'],$user_provinces,$user_district,$user_subdistrict,$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$address['zip_code']);
                                if ($insertaddress) {
                                    $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ระบบ";
                                    header("location: member.php"); 
                                }
                            } else {
                                $_SESSION['statusMsg'] = "File upload failed, please try again.";
                                header("location: addmember.php");
                            }
                        } else {
                            $_SESSION['statusMsg'] = "ยังๆ";
                            header("location: addmember.php");
                        }
                    } else {
                        $_SESSION['statusMsg'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed to upload.";
                        header("location: addmember.php");
                    }
        }
        elseif($user_role=='3'){ #คนนอก
            if (!empty($_FILES["file"]["name"])) {
                $tempPath = $_FILES['file']['tmp_name'];
                $result = (new UploadApi())->upload($tempPath);
                $imageName = $result['public_id'];
                $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                $insert = $sql->addmember($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_role,$fileName);
                if ($insert) {
                    $id = $sql->searchid($user_email);
                    $user=mysqli_fetch_array($id);
                    $sub = $sql->address($user_subdistrict);
                    $address=mysqli_fetch_array($sub);
                    $insertaddress = $sql->insertaddress($user['user_id'],$user['user_fullname'],$user['user_tel'],$user['user_address'],$user['user_road'],$user['user_soi'],$user_provinces,$user_district,$user_subdistrict,$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$address['zip_code']);
                    if ($insertaddress) {
                        $_SESSION['statusMsg'] = "ลงทะเบียนสำเร็จกรุณาเข้าสู่ระบบ";
                        header("location: member.php"); 
                    }
                } else {
                    $_SESSION['statusMsg'] = "File upload failed, please try again.";
                    header("location: addmember.php");
                }
            } else {
                $_SESSION['statusMsg'] = "ยังๆ";
                header("location: addmember.php");
            }
        }
    }

    if (isset($_POST['updateUser'])) {
        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['user_password']); //แปลรหัสเป็น md5
        $user_fullname = $_POST['user_fullname'];
        $user_tel = $_POST['user_tel'];
        $user_address = $_POST['address'];
        $user_road = $_POST['road'];
        $user_soi = $_POST['soi'];
        $user_provinces = $_POST['provinces'];
        $user_district = $_POST['district'];
        $user_subdistrict = $_POST['subdistrict'];
        $user_postID = $_POST['zip_code'];
        $user_role = $_POST['user_role'];
        $img_name = $_POST['img_name'];
        $user_id = $_POST['user_id'];

        if (!empty($_FILES["file"]["name"])) {
            $tempPath = $_FILES['file']['tmp_name'];
            $result = (new UploadApi())->upload($tempPath);
            $imageName = $result['public_id'];
            $fileName = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;
                    $insert = $sql->update_user($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_role,$fileName,$user_id);
                    if ($insert) {
                        $sub = $sql->address($user_subdistrict);
                        $address=mysqli_fetch_array($sub);
                        $update = $sql->update_user_address($user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_provinces,$user_district,$user_subdistrict,$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$user_postID,$user_id);
                        if ($update) {
                            $_SESSION['statusMsg'] = "แก้ไขสมาชิกสำเร็จ";
                            header("location: editmember.php?user_id=".$user_id);
                        }else {
                            $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง";
                            header("location: editmember.php?user_id=".$user_id);
                        }
                    } else {
                        $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง";
                        header("location: editmember.php?user_id=".$user_id);
                    }
        } else {
            $insert = $sql->update_user($user_email,$user_password,$user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_subdistrict,$user_role,$img_name,$user_id);
            if ($insert) {
                $sub = $sql->address($user_subdistrict);
                $address=mysqli_fetch_array($sub);
                $update = $sql->update_user_address($user_fullname,$user_tel,$user_address,$user_road,$user_soi,$user_provinces,$user_district,$user_subdistrict,$address['provinces_name'],$address['district_name'],$address['subdistrict_name'],$user_postID,$user_id);
                if ($update) {
                    $_SESSION['statusMsg'] = "แก้ไขสมาชิกสำเร็จ";
                    header("location: editmember.php?user_id=".$user_id);
                }else {
                    $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง";
                    header("location: editmember.php?user_id=".$user_id);
                }
            } else {
                $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาด กรุณาลองใหม่อีกครั้ง";
                header("location: editmember.php?user_id=".$user_id);
            }
        }
    }

    if (isset($_POST['Newcatagory'])) {
        $cat_name = $_POST['cat_name'];
            
        $insert = $sql->addcatagory($cat_name);
        if ($insert) {
            $_SESSION['statusMsg'] = "เพิ่มหมวดหมู่สำเร็จ";
            header("location: catagory.php"); 
        } else {
            $_SESSION['statusMsg'] = "มีบางอย่างผิดพลาดกรุณาลองใหม่อีครั้ง";
            header("location: catagory.php");
        }
    }

?>