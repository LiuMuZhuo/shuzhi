<?php
header("Content-type: text/html; charset=utf8");
/*
 * 提交请求
* @param $header array 需要配置的域名等header设置 array("Host: devzc.com");
* @param $data string 需要提交的数据 'user=xxx&qq=xxx&id=xxx&post=xxx'....
* @param $url string 要提交的url 'http://192.168.1.12/xxx/xxx/api/';
*/
function curl_post($header,$data,$url)
{
     $ch = curl_init();
     $res= curl_setopt ($ch, CURLOPT_URL,$url);
     var_dump($res);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
     curl_setopt ($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_POST, 1);
     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
     curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
     $result = curl_exec ($ch);
     curl_close($ch);
 if($result == NULL) {
  return 0;
 }
 return $result;
}
$url = 'http://127.0.0.1' ;
$header = array("Host:127.0.0.1",
  "Content-Type:application/x-www-form-urlencoded",
  'Referer:http://127.0.0.1/toolindex.xhtml',
  'User-Agent: Mozilla/4.0 (compatible; MSIE .0; Windows NT 6.1; Trident/4.0; SLCC2;)');

$data = 'tools_id=1&env=gamma';
echo "argv:$data<br>";
$ret = curl_post($header, $data,$url);
$utf8 = iconv('GB2312', 'UTF-8//IGNORE', $ret);
echo 'return:<br>'.nl2br($utf8 ).'<br>';
?>
