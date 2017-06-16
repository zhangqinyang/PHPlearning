<?php
/**
 * Created by PhpStorm.
 * User: zhangqinyang01
 * Date: 2017/6/2
 * Time: 14:16
 */
$arr = array();
$arr1 = array();
$file = fopen('(08)0522/20170522.list','r');
while(!feof($file)){
    $temp = fgets($file);
    $temp_split = explode("\t", $temp);
    $tempSplit = explode('/', $temp_split[0]);
//    var_dump(implode('/', array_slice($tempSplit, -3))); die();
    $arrkey = substr(implode('/', array_slice($tempSplit, -3)), 0, -4);
//    var_dump($arrkey); die();
    $basenameTemp = basename($temp_split[0]);
    $arr[$arrkey] = $temp;
}
//echo count($arr); die();
//print_r($arr);
fclose($file);

$file1 = fopen('(08)0522/20150522_raw.scp.vad.pcm.list.liantong.rec.norm', 'r');
while(!feof($file1)){
    $temp1 = fgets($file1);
    $temp1_split = explode("\t", $temp1);
    $temp1Split = explode('/', $temp1_split[0]);
//    var_dump(implode('/', array_slice($temp1Split, -3))); die();
//    $arrkey1 = substr($temp1_split[0], -11, 7);
    $arrkey1 = substr(implode('/', array_slice($temp1Split, -3)), 0, -4);
//    var_dump($arrkey1);die();
    $arr1[$arrkey1] = $temp1;
}
//print_r($arr1);
fclose($file1);

foreach ($arr1 as $key => $value){
    if($arr[$key] !== null){
        $arr[$key] = trim($arr[$key]);

//        var_dump($arr[$key]); die();
        $temp_value_split = explode("\t", $value);
        $arr[$key] .= "\t" . $temp_value_split[1];
//        var_dump($arr[$key]); die();
        unset($arr1[$key]);
    }
}

$writestr = '';
foreach ($arr as $value){
    $writestr .= $value;
}
//echo $count; die();
$fileR = fopen('arr.txt','w+');
fwrite($fileR, $writestr);
fclose($fileR);

$writestr1 = '';
foreach ($arr1 as $value){
   $writestr1 .= $value;
}
$fileR1 = fopen('arr1.txt','w+');
fwrite($fileR1, $writestr1);
fclose($fileR1);



//print_r($arr);
//echo "----------------------------------------------------\n";
//print_r($arr1);
//echo "----------------------------------------------------\n";
//echo "时间戳个数为：" . $record_count . "\n文本长度为：" . $text_len ."\n";
//echo "----------------------------------------------------\n";
echo "------------------------end--------------------------";
?>