<?php
/**
 * Created by PhpStorm.
 * User: zhangqinyang01
 * Date: 2017/5/24
 * Time: 16:26
 */

//$q = isset($_GET['q'])? htmlspecialchars($_GET['q']) : '';
$q = isset($_GET["q"])? $_GET["q"] : '';
if($q) {
    if($q =='RUNOOB') {
        echo '菜鸟教程<br>http://www.runoob.com';
    } else if($q =='GOOGLE') {
        echo 'Google 搜索<br>http://www.google.com';
    } else if($q =='TAOBAO') {
        echo '淘宝<br>http://www.taobao.com';
    }
} else {
    echo "位置error！";
}
?>