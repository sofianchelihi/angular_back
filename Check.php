<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch");

$data = file_get_contents("php://input");
$db = new PDO("mysql:host=localhost;dbname=todoapp;charser=utf8;","root","");

if(isset($data)){
    $_REQUESt = $db->prepare("UPDATE taches SET checked=!checked where id_tach=:id");
    $_REQUESt->bindParam("id",json_decode($data)->id_tach);
    $_REQUESt->execute();
}
?>