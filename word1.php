<html>
<head>
    <title>数值分析实验生成Word文档</title>
    <meta charset="utf-8">
</head>
<body>
<?php
session_start();
$s_name = $_POST['s_name'];
$s_class = $_POST['s_class'];
$s_studentid = $_POST['s_studentid'];
$s_time = $_POST['s_time'];
$s_location = $_POST['s_location'];
$s_teacher = $_POST['s_teacher'];
$s_purpose = $_POST['s_purpose'];
$s_summary = $_POST['s_summary'];
$s_sourcecode = $_POST['s_sourcecode'];
$expername1 = $_POST['expername1'];
$expername2 = $_POST['expername2'];
$algo_picture1 = $_POST['algo_picture1'];
$algo_picture2 = $_POST['algo_picture2'];
$path = "http://shuzhi.hundredroses.cn".$algo_picture1;
$path2 = "http://shuzhi.hundredroses.cn".$algo_picture2;
//var_dump($s_name);
?>
<h1 style="text-align: center"><?php echo $expername1; echo $expername2;?></h1>
<p>学号：<?php echo $s_studentid;?>&nbsp;&nbsp;&nbsp;&nbsp;姓名：<?php echo $s_name;?>&nbsp;&nbsp;&nbsp;&nbsp;班级：<?php echo $s_class;?></p>
<p>时间：<?php echo $s_time;?>&nbsp;&nbsp;&nbsp;&nbsp; 地点：<?php echo $s_location;?>&nbsp;&nbsp;&nbsp;&nbsp;指导老师：<?php echo $s_teacher;?></p>

<h2>一、实验目的</h2>
<p><?php echo $s_purpose;?></p>
<h2>二、实验内容</h2>
<p style="font-size: 20px">&nbsp;1.算法推导</p>
<img src='<?php echo $path ?>' />
<p style="font-size: 20px">&nbsp;2.程序实现</p>
<p><?php echo $s_sourcecode;?></p>
<p style="font-size: 20px">&nbsp;3.测试结果</p>
<img src='<?php echo $path2 ?>' />

<h2>三、实验总结及自评</h2>
<p><?php echo $s_summary;?></p>

</body>
</html>

<?php
ob_start();
header("Cache-Control: public");
Header("Content-type: application/octet-stream");
Header("Accept-Ranges: bytes");

//判断浏览器类型
if (strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')) {
    header('Content-Disposition: attachment; filename=experiment.doc');
}else if (strpos($_SERVER["HTTP_USER_AGENT"],'Firefox')) {
    Header('Content-Disposition: attachment; filename=experiment.doc');
} else {
    header('Content-Disposition: attachment; filename=experiment.doc');
}

//不使用缓存
header("Pragma:no-cache");
//过期时间
header("Expires:0");
//输出全部内容到浏览器
ob_end_flush();

//echo '<script language="JavaScript">;location.href="word.php";</script>;';
?>