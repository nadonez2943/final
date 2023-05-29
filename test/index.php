<?php
require 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

Configuration::instance([
  'cloud' => [
    'cloud_name' => 'dctzkxkyd', 
    'api_key' => '835866618941812', 
    'api_secret' => 'BUzTejiD9p-_moHhd9jDQhP8aK8'],
  'url' => [
    'secure' => true]]);

//$result = (new UploadApi())->upload('unnamed.jpg');#เพิ่มรูป
//$imageName = $result['public_id'];#ชื่อรูป

//$imageUrl = 'https://res.cloudinary.com/dctzkxkyd/image/upload/' . $imageName;
$imageUrl = 'https://res.cloudinary.com/dctzkxkyd/image/upload/cld-sample-5';
// Display the uploaded image
echo '<img src="' . $imageUrl . '">';
//echo '<br>'. $imageName ;
?>
