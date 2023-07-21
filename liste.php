<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Max-Age:3600");
header("Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Authorization,X-Requested-Witch");


$db = new PDO("mysql:host=localhost;dbname=todoapp;charser=utf8;","root","");
 
$_REQUESt = $db->prepare("SELECT *FROM taches");
$_REQUESt->execute();
$_REQUESt=$_REQUESt->fetchAll(PDO::FETCH_ASSOC);
print_r(json_encode($_REQUESt));

?>