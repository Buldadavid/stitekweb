<!DOCTYPE html>
<html>
  <head>
    <title>Bank Customer Feedback Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      div {max-width:1000px;
       margin: auto;
      }
           .banner {
      position: relative;
      height: 210px;
      background-image: url("/uploads/media/default/0001/02/fb57ab781c34da322c884532bfec751e843e36fc.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.6); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
            body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1, h4 {
      margin: 15px 0 4px;
      font-weight: 400;
      }
      h4 {
      margin: 20px 0 4px;
      font-weight: 400;
      }
      span {
      color: red;
      }
      span.required {
      margin-left: 0;
      color: red;
      }
      .small {
      font-size: 10px;
      line-height: 18px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 3px;
      }
      form {
      width: 100%;
      padding: 20px;
      background: #fff;
      box-shadow: 0 2px 5px #ccc; 
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      vertical-align: middle;
      }
      input:hover, textarea:hover, select:hover {
      outline: none;
      border: 1px solid #095484;
      background: #e6eef7;
      }
      .title-block select, .title-block input {
      margin-bottom: 10px;
      }
      select {
      padding: 7px 0;
      border-radius: 3px;
      border: 1px solid #ccc;
      background: transparent;
      }
      select, table {
      width: 100%;
      }
      option {
      background: #fff;
      }
      .day-visited, .time-visited {
      position: relative;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      .day-visited i, .time-visited i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      top: 8px;
      font-size: 20px;
      }
      .day-visited i, .time-visited i {
      right: 5px;
      z-index: 1;
      color: #a9a9a9;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      }
      .question-answer label {
      display: block;
      padding: 0 20px 10px 0;
      }
      .question-answer input {
      width: auto;
      margin-top: -2px;
      }
      th, td {
      width: 18%;
      padding: 15px 0;
      border-bottom: 1px solid #ccc;
      text-align: center;
      vertical-align: unset;
      line-height: 18px;
      font-weight: 400;
      word-break: break-all;
      }
      .first-col {
      width: 25%;
      text-align: left;
      }
      textarea {
      width: calc(100% - 6px);
      }
      .btn-block {
      margin-top: 20px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      -webkit-border-radius: 5px; 
      -moz-border-radius: 5px; 
      border-radius: 5px; 
      background-color: #095484;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background-color: #0666a3;
      }
      @media (min-width: 568px) {
      .title-block {
      display: flex;
      justify-content: space-between;
      }
      .title-block select {
      width: 30%;
      margin-bottom: 0;
      }
      .title-block input {
      width: 31%;
      margin-bottom: 0;
      }
      th, td {
      word-break: keep-all;
      }
      }
      @media (min-width: 568px) {
      .name-item, .contact-item, .position-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input {
      width: calc(33% - 20px);
      }
      .contact-item .item, .position-item .item {
      width: calc(25% - 8px);
      }
      .contact-item input, .position-item input {
      width: calc(100% - 12px);
      }
      .position-item select {
      width: 100%;
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form action="nevim.php" method="post">
                <div class="banner">
          <h1>Diagnostický list</h1>
        </div>
		<input type= "text" name= "qr" required>
		<h2>Stator</h2>
          
          <div class="position-item">
          <div class="item">
            <p>Izolace/mezi R<span class="required">*</span></p>
			<input type= "text" name= "odpor">
          </div>
         <div class="item">
            <p>Izolační odpor<span class="required">*</span></p>
            <select name="izolace">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>
                    <div class="item">
            <p>Mezi R<span class="required">*</span></p>
            <select name="mezir">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>
                    <div class="item">
            <p>Mech. poškození<span class="required">*</span></p>
            <select name="mechs">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>
          

      <h2>Rotor</h2>
        </div>  
          <div class="position-item">
          <div class="item">
            <p>napeti?<span class="required">*</span></p>
            <input type= "text" name= "rotor">
          </div>
         <div class="item">
            <p>Mezizávitové napětí<span class="required">*</span></p>
            <select name="napeti">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>
                    <div class="item">
            <p>Mechanické poškození<span class="required">*</span></p>
            <select name="mechr">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>

                    <div class="item">
 		<p>-<span ></span></p>
            <select >
              <option value=""></option>

              </select>
          </div>

		<h2>Brzda</h2>
          </div>
          <div class="position-item">
          <div class="item">
            <p>moment<span ></span></p>
			<input type= "text" name= "moment">
          </div>
         <div class="item">
            <p>elektricky<span class="required">*</span></p>
            <select name="elekt">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>
                    <div class="item">
            <p>Mechanicky<span class="required">*</span></p>
            <select name="mechb">
              <option value="OK">OK</option>
              <option value="NOK">NOK</option>
              <option value="/">/</option>
              </select>
          </div>
                    <div class="item">
            <p>-<span ></span></p>
            <select >
              <option value=""></option>

              </select>
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
<select name="firma" required>
<?php $my_dir = "/home/nic/Dokumenty/Diag. l"; ?>
<?php foreach(getDirs($my_dir) as $dir){echo '<option class="'.$my_dir.'">'. $dir . '</option>';} /*now you have the directories listed into a dropdown list*/ ?>

</select>
          </div>
        <div class="btn-block">
          <input type="submit" name="submit" value = "Send	"/>
	
        </div>

      </form>
    </div>
  </body>
</html>
