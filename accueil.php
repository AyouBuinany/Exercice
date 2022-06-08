<?php
session_start();
ob_start();
include "connect.php";
$query = $db->prepare("SELECT module_name FROM module where user_id=:id");
$query->bindParam(":id", $_SESSION['id']);
$query->execute();
$modules = $query->fetchAll();
?>
<a href="logout.php" class="btn btn-danger">Logout</a>

<h1>Page D'accueil</h1>
<h2> Bonjour <?=  $_SESSION['user'] ?>
<div class="card" style="width: 18rem;">
<h3> Modules </h3>
  <ul class="list-group list-group-flush">
  <?php if (is_array($modules) || is_object($modules))
   {
       if(sizeof($modules)>0) { 
           foreach($modules as $m) {
              
    ?>

        <li class="list-group-item"><?php echo $m["module_name"]; ?></li> 
 

 <?php 
 }
}
}
    ?>

  </ul>
</div>