# jquery_face-cos

PHP jquery基于腾讯云COS头像上传组件

其实原理很简单，利用jquery将图片剪切后保存为base64，

然后再将base64 保存本地tmp目录，再提交到腾讯云COS上去！

主要修改的Qcloud_cos/Conf.php文件：

//请到http://console.qcloud.com/cos去获取你的appid、sid、skey
    const APPID = '腾讯云的APPID';
    const SECRET_ID = '腾讯云的SECRET_ID';
    const SECRET_KEY = '腾讯云的SECRET_KEY';
    

主要修改的：upload.php 文件：

$bucketName = "这里填写您建立的bucket";

至于样式表和其他功能的附加酌情修改！


欢迎一起交流PHP

团队博客：http://tech.ynho.com

腾讯微博：http://t.qq.com/xinyi007

新浪微博：http://weibo.com/ynho

微信/QQ添加：xinyi007/59471（请注明：PHP技术交流） 
