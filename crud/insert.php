<?php 
include "./../connect.php";
session_start();
ob_start();
global $db;

    
if(isset($_POST['modules'])) 
{
   $u_id= (int)$_POST['modules'][0]['user_id'];
   $module =  $_POST['modules'][0]['module'];
    $sql= "INSERT INTO module(user_id, module_name) VALUES (:u, :m)";
    $query = $db->prepare($sql);
    $query->bindParam(":u", $u_id);
    $query->bindParam(":m", $module);
    if($query->execute()) {
        echo " modification success";
    }
}
?>