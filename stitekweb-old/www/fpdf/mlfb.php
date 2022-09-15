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

    input {
    width: calc(100% - 10px);
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    vertical-align: middle;
    }
    input:hover, textarea:hover, select:hover {
    outline: none;
    border: 1px solid #095484;
    background: #e6eef7;
    }
    span.required {
    margin-left: 0;
    color: red;
    }
    select {
    width:100%;
    padding: 7px 0;
    border-radius: 3px;
    border: 1px solid #ccc;
    background: transparent;
    } 
    body,  form, input, select, p { 
    padding: 0;
    margin: 0;
    outline: none;
    font-family: Roboto, Arial, sans-serif;
    font-size: 14px;
    color: #666;
    line-height: 22px;
    }

</style>
<body>

<h1>Diagnostický list</h1>
<form action="nevim.php" method="post">

<table>
<tr>
<td>

 
		<?php
function getDirs($path){
    $contents=scandir($path);
    $dirs = array();
    foreach($contents as $content){
        if(!is_file($content)){
            $dirs[] = $content;
        }
    }
    return $dirs;
}
?>
<select name="firma" id="cars" required>
<?php $my_dir = "/home/nic/Dokumenty/Diag. l"; ?>
<?php foreach(getDirs($my_dir) as $dir){echo '<option class="'.$my_dir.'">'. $dir . '</option>';} /*now you have the directories listed into a dropdown list*/ ?>

</select>
</td>
<td>
<?php

// Open a file
$file = fopen("/home/nic/Dokumenty/web/venv/data/odmer.csv", "r");

  $data = (fgetcsv($file));
	echo "<table>";
	echo "<tr>";
	echo "<td>";
	echo($data[2]);
	echo "</td>";
	echo "</tr> \n";

	echo "<tr>";
	echo "<td>";
	echo($data[4]);
	echo "</td>";
	echo "</tr> \n";
	echo "<tr>";
	echo "<td>";
	echo($data[3]);
	echo "</td>";
	echo "</tr> \n";
	echo "</table>";

  fclose($file);
?>
</td>
</tr>
</table>


<table>


	<tr>

    	<td>
        <h3>Stator</h3>
        </td>
    </tr>
    <tr>
        <td>
        <p>Izolace/mezi R<span class="required">*</span></p>
        <input type= "text" name= "odpor"  required/>
        </td>
    	<td>
        <p>Izolační odpor<span class="required">*</span></p>
              <select name="izolace">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>   
    	<td>
        <p>Mezi R<span class="required">*</span></p>
            <select name="mezir">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>
    	<td>
            <p>Mech. poškození<span class="required">*</span></p>
            <select name="mechs">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>        
    </tr>	
	<tr>

    	<td>
        <h3>Rotor</h3>
        </td>
    </tr>
    <tr>
        <td>
            <p>napeti?<span class="required">*</span></p>
            <input type= "text" name= "rotor">
        </td>
    	<td>
            <p>Mezizávitové napětí<span class="required">*</span></p>
            <select name="napeti">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>   
    	<td>
            <p>Mechanické poškození<span class="required">*</span></p>
            <select name="mechr">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>        
    </tr>
	<tr>

    	<td>
        <h3>Brzda</h3>
        </td>
    </tr>
    <tr>
        <td>
            <p>moment<span class="required">*</span></p>
			<input type= "text" name= "moment">
        </td>
    	<td>
            <p>elektricky<span class="required">*</span></p>
            <select name="elekt">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>   
    	<td>
            <p>Mechanicky<span class="required">*</span></p>
            <select name="mechb">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>        
</tr>
	<tr>

    	<td>
        <h3>Ložiska</h3>
        </td>
    </tr>
    <tr>
    	<td>
            <p>loziska<span class="required">*</span></p>
            <select name="loz">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>
</tr>   
	<tr>

    	<td>
        <h3>Odmerovani</h3>
        </td>
    </tr>
    <tr>
        <td>
        <p>Typ<span class="required">*</span></p>
        	<?php
		$file = fopen("/home/nic/Dokumenty/web/venv/data/odmer.csv", "r");

  		$data = (fgetcsv($file));
		echo($data[5]);
  		fclose($file);
		?>
        </td>
    	<td>
        <p>Signaly<span class="required">*</span></p>
              <select name="sigl">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>   
    	<td>
            <p>Mech. poškození<span class="required">*</span></p>
            <select name="mecho">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td> 
	<td>
        <p>DQ<span ></span></p>
            <select name="dq">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>       
    </tr>

	<tr>

    	<td>
        <h3>Konektory</h3>
        </td>
    </tr>
    <tr>
    	<td>
	<p>velikost<span class="required">*</span></p>
              <select name="kon">
              <option value="1">1</option>
              <option value="1,5">1,5</option>
              <option value="2">2</option>
	      <option value="3">3</option>
              </select>
        </td> 
        <td>
        <p>typ kon<span class="required">*</span></p>
              <select name="typkon">
	      <option value=""></option>
              <option value="sro">sro</option>
              <option value="nas">nas</option>
              <option value="">/</option>
              </select>
        </td>

    	<td>
        <p>silovy<span class="required">*</span></p>
              <select name="sil">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>   
    	<td>
        <p>signalovy<span class="required">*</span></p>
            <select name="sig">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>
    	<td>
            <p>signal. kabel<span class="required">*</span></p>
            <select name="sigkab">
		<option value=""></option>
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>        
    </tr>	

	<tr>

    	<td>
        <h3>Loziskovy stit</h3>
        </td>
    </tr>
    <tr>

    	<td>
            <p>predni<span class="required">*</span></p>
            <select name="pre">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>   
    	<td>
            <p>zadni<span class="required">*</span></p>
            <select name="zad">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td>        
</tr>

	<tr>

    	<td>
        <h3>veltilator</h3>
        </td>
    </tr>
    <tr>
    	<td>

              <select name="ven">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td> 
	</tr>

	<tr>

    	<td>
        <h3>znecisteni</h3>
        </td>
    </tr>
    <tr>
    	<td>

              <select name="zne">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
        </td> 
	</tr>

	<tr>

    	<td>
        <h3>Poznamka</h3>
        </td>
    </tr>
        
<tr>
<td>
<input type= "text" name= "pozn">
        </td> 
	</tr>





    <tr>
    <td>
    <input type="submit" name="submit" value = "Send" id="greet5"/>
    </td>
    </tr>
</table>

</form>
<p>OBRAZKY</p>

<button id="greet5" onclick="myFunction()">UKA OBRAZKY</button>

<script>
function myFunction() {
  window.open("http://192.168.0.120:5000/obrazek");
}
</script>
</body>
</html>
