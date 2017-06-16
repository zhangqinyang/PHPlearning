<?php
/**
 * Created by PhpStorm.
 * User: zhangqinyang01
 * Date: 2017/5/23
 * Time: 11:52
 */
$count = 0;
$record_count = 0;
$text_len = 0;
$ArrayList = array();
$file = fopen('1527958689591156334451d1.76728503_58255199_mark_258662_20170509134002','r');
while(!feof($file))
{
    $temp = fgets($file);
    $temp_split = explode("\t",$temp);
//    echo $temp_split;
//    echo var_dump($temp_split);
//    echo fgets($file);
    if ( count($temp_split) == 17){
        $ArrayList[$count] = $temp_split;
    }


    $count++;
}


fclose($file);

array_shift($ArrayList);
//echo var_dump($ArrayList[9]);
//echo var_dump(json_decode($ArrayList[9][10], true));
$temp_arr = json_decode($ArrayList[9][10],true);
echo count($temp_arr["record"]). "\n";
echo var_dump($temp_arr["record"][0])."\n";
$temp_arr_sub = str_replace(" ","", $temp_arr["record"][0]["text"]);
echo mb_strlen($temp_arr["record"][0]["text"],"UTF-8")."\n";


//$str = $temp_arr["record"][0]["text"];
//$isMatched = preg_match('/[x{4e00}-x{9fa5}]+/u/', $str, $matches);
//var_dump($isMatched, $matches);

foreach($ArrayList as $key => $value){
    $index = 6;
    if($value[14] == "是"){
        $index = 15;
    }else if($value[9] == "是"){
        $index = 10;
    }else if($value[7] == "是"){
        $index = 8;
    }



    $temp_arr = json_decode($value[$index],true);
    $record_count += count($temp_arr["record"]);
//    echo var_dump(count($temp_arr["record"])). "\n";

    foreach ($temp_arr["record"] as $key => $value){
        $text_len += mb_strlen($value["text"],"UTF-8");
        var_dump($text_len);
    }

    echo var_dump($temp_arr["record"])."\n";
    $temp_arr_sub = str_replace(" ","", $temp_arr["record"][0]["text"]);
//    echo mb_strlen($temp_arr["record"][0]["text"],"UTF-8")."\n";


}
$str_w = "时间戳个数为：" . $record_count . "\r\n文本长度为：" . $text_len ."\n";
//var_dump($str_w);
$fileR = fopen("total.txt", "w+");
//echo var_dump($str_w);
fwrite($fileR, $str_w);
fclose($fileR);

echo "----------------------------------------------------\n";
echo "时间戳个数为：" . $record_count . "\n文本长度为：" . $text_len ."\n";
echo "----------------------------------------------------\n";
?>