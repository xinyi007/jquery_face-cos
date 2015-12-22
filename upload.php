<?php
require_once './include.php';
use Qcloud_cos\Auth; 
use Qcloud_cos\Cosapi;
$bucketName = "这里填写您建立的bucket";
$faceFolder = "/face/";
//读取图片base64编码格式
$base64_image_content = file_get_contents("php://input");
if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result)){
$type = $result[2];
if ($type!="png"){
exit("0");
}
}
$files = time();
//传到COS
$base64_body = substr(strstr($base64_image_content,','),1);
//生成本地文件
$new_file = "./tmp/".$files.".png";
$data = base64_decode($base64_body);
file_put_contents($new_file,$data);
$cosfolder = Cosapi::statFolder($bucketName, $faceFolder);
if ($cosfolder["code"]!="0"){
Cosapi::createFolder($bucketName, $faceFolder);
}
//要传入腾讯云文件
$dstPath = $faceFolder.$files.".png";
//查询文件是否存在
$result = Cosapi::stat($bucketName, $dstPath);
if ($result["code"]=="0"){
Cosapi::del($bucketName, $dstPath);
$types = Cosapi::upload($new_file,$bucketName,$dstPath);
}
else {
$types = Cosapi::upload($new_file,$bucketName,$dstPath);
}

/*清空本地的存储文件及目录
unlink($save_path);
*/

$file_url = $types["data"]["access_url"];
session_start();
$_SESSION['face'] = $file_url;
echo "1";
?>