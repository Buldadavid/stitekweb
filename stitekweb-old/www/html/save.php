<?php

if(isset($_POST["submit"]))  //check submit button is pressed
{
$text = $_POST["text"];
$text2 = $_POST["text2"];
$text3 = $_POST["text3"];
$text4 = $_POST["text4"];
$text5 = $_POST["text5"];
$text6 = $_POST["tep"];
$textz = $_POST["textz"];

$list = array(
  array( $text ),
  array( $text2 ),
  array( $text3 ),
  array( $text4 ), 
  array( $text5 ),
  array( $text6 ),
  array( $textz ),
);

$fp = fopen("/home/nic/Dokumenty/web/venv/data/file.csv" , "w"); 
 
foreach ( $list as $fields) {
  fputcsv( $fp, $fields);
}

fclose($fp);

$list1 = array (
  array("", "" ,"$text", $text2,"/",$text4),
);

$file1 = fopen("/home/nic/Dokumenty/web/venv/data/odmer.csv","w");

foreach ($list1 as $line) {
  fputcsv($file1, $line);
}

fclose($file1);
header("Location: http://192.168.0.120:5000/help", true, 301);
exit();
}
?>
