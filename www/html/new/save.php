<?php

$text = $_POST["textco"];
$text2 = "Index: ";


$list = array(
  array( $text ),
  array( $text2 ),
);

$fp = fopen("/home/nic/Dokumenty/web/venv/data/odmer.csv" , "w"); 

foreach ( $list as $fields) {
  fputcsv( $fp, $fields);
}
fclose($fp);

header("Location: http://192.168.0.120:5000/vyt", true, 301);
exit();


?>
