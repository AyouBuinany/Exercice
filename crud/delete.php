<?php 
session_start();
ob_start();
include "../connect.php";
global $db;
if(isset($_POST['modules'])) 
{
$sql="DELETE FROM module where user_id=:u_id AND module_name=:m";
$stm=$db->prepare($sql);
$stm->bindParam(":u_id",$_POST['modules'][0]['user_id']);
$stm->bindParam(":m",$_POST['modules'][0]['module']);
if($stm->execute()){
echo "modification success";
}
}
?>