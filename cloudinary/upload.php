<?php
require 'vendor/autoload.php';
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

Configuration::instance([
    'cloud' => [
        'cloud_name' => 'dlne5j5ub',
        'api_key' => '232327965775433',
        'api_secret' => 'jJbI7p20xpDJzI4tPNNf9w8R_zg'],
    'url' => [
        'secure' => true]]);

if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tempPath = $_FILES['image']['tmp_name'];
    $result = (new UploadApi())->upload($tempPath);
    $imageName = $result['public_id'];
    $imageUrl = 'https://res.cloudinary.com/dlne5j5ub/image/upload/' . $imageName;

    echo '<img src="' . $imageUrl . '">';
    echo '<br>' . $imageName;
} else {
    echo 'Error uploading the file. Please try again.';
}
?>
