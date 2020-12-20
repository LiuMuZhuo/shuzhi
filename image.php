<?php
ob_start(); //打开缓冲区
echo '
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <xml><w:WordDocument><w:View>Print</w:View></xml>
</head>';
echo '<body>
<h1 style="text-align: center">这是一个word文档</h1>
<img src="http://shuzhi.hundredroses.cn/111.jpg" alt="" />
</body>';
header("Cache-Control: no-store"); //所有缓存机制在整个请求/响应链中必须服从的指令
Header("Content-type: application/octet-stream");  //用于定义网络文件的类型和网页的编码，决定文件接收方将以什么形式、什么编码读取这个文件
Header("Accept-Ranges: bytes");  //Range防止断网重新请求 。
if (strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')) {
header('Content-Disposition: attachment; filename=test.doc');
}else if (strpos($_SERVER["HTTP_USER_AGENT"],'Firefox')) {
Header('Content-Disposition: attachment; filename=test.doc');
} else {
header('Content-Disposition: attachment; filename=test.doc');
}
header("Pragma:no-cache"); //不能被浏览器缓存
header("Expires:0");  //页面从浏览器高速缓存到期的时间分钟数，设定expires属性为0，将使对一页面的新的请求从服务器产生
ob_end_flush();//输出全部内容到浏览器