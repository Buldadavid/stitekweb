<!DOCTYPE html>
<html>
<head>
<meta charset="8859">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page Title</title>
</head>
<style>

	#greet5 {
    background-color: PaleVioletRed;
    border:  none;
    height: 50px;
    width:  100%;
    color: white;
    border-radius: 5px;
}
body {
  background-color: lightblue;
}

h1 {
font-family: arial, sans-serif;
font-size: 48px;
font-weight: bold;
margin-top: 0px;
margin-bottom: 1px;
}
li {
font-family: arial, sans-serif;
font-size: 20px;
margin-top: 0px;
margin-bottom: 1px;
}
input, select {
  width: 99%;
  padding: 12px 20px;
  border-radius: 5px;
  box-sizing: border-box;
  font-family: arial, sans-serif;
  font-size: 20px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #000000;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr:nth-child(odd) {
  background-color: #fefefe;
}

#nic th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #000000;
  color: white;
}
#orange
  {
    background-color: {{barva}};
  }
#zetko
{
background-color: {{barvaZ}};
}
#odmerko
{
background-color: {{barvaO}};
}
</style>
<body>


 <form action = "save.php" method="post" >

    <table >
		<tr><td>
<?php
echo "<html><body><table>\n\n";

// Open a file
$file = fopen("/home/nic/Dokumenty/web/venv/data/odmer.csv", "r");
// Fetching data from csv file row by row
while (($data = fgetcsv($file)) !== false) {

	// HTML tag for placing in row format
//	echo "<tr>";
	foreach ($data as $i) {
		echo "<td>" . htmlspecialchars($i)
			. "</td>";
	}
	echo "</tr> \n";
}

// Closing the file
fclose($file);

echo "\n</table></body></html>";

if(isset($_POST["submit"]))  //check submit button is pressed
{
$text = $_POST["textco"];
$text2 = "textco";


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
}

?>

</td>
<td><input name="textco" required></td>

</tr>
<tr>
<td colspan = 2>

<input type="submit" value="Vytvor" class="style_btn lin_color_left start_btn" id="greet5">
        
</td>
</tr>
</table>
</form>



<br>
</body>
</html>
