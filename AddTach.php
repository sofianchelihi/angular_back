<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch");

$data = file_get_contents("php://input");
$db = new PDO("mysql:host=localhost;dbname=todoapp;charser=utf8;","root","");

if(isset($data)){
    $_REQUESt = $db->prepare("INSERT INTO taches(tach,checked) values(:tach,:checked)");
    $_REQUESt->bindParam("tach",json_decode($data)->event);
    $check=false;
    $_REQUESt->bindParam("checked",$check);
    $_REQUESt->execute();
   $_REQUESt = $db->prepare("SELECT *from taches where id_tach=(SELECT MAX(id_tach) from taches)");
   $_REQUESt->execute();
   $_REQUESt=$_REQUESt->fetchObject();
   print_r(json_encode($_REQUESt));
}

?>