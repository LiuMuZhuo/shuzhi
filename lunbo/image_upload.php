<?php
session_start();
header("Content-Type:text/html;charset=utf-8");
$link = mysqli_connect('localhost', 'root', 'woaixuexi.');//输入数据库账号密码
if (!$link) exit('数据库连接失败');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'edu');


