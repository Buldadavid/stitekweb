<!DOCTYPE html>
<html>
  <body>


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
<select>
<?php $my_dir = "/home/nic/Dokumenty"; ?>
<?php foreach(getDirs($my_dir) as $dir){echo '<option class="'.$my_dir.'">'. $dir . '</option>';} /*now you have the directories listed into a dropdown list*/ ?>

</select>



  </body>
</html>
