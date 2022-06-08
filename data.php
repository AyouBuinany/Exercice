<?php
session_start();
ob_start();
include "connect.php";
global $db;

// fetch query
function fetch_data(){
 global $db;
 $query = $db->prepare("SELECT * FROM user where user_role=0");
 $query->execute();
 $users = $query->fetchAll();
 if(is_array($users) && sizeof($users)>0) {
 return $users;
  }else{
    return $row=[];
  }
}

//

function fetch_data2($userId) {
    global $db;
    $query = $db->prepare("SELECT * FROM module where user_id=:idp");
    $query->bindValue(':idp', $userId);
    $query->execute();
    $modules = $query->fetchAll();
    $module_list = array();
    $Modules_l = ["module 1", "module 2", "module 3", "module 4"];
    $checkedLs = "<td> <div>";
    if(is_array($modules) && sizeof($modules)>0) {
        foreach($modules as $t){
            $module_list[]= $t['module_name'];
        }

        $zone_array3 = array();
        foreach($Modules_l as $ml) {
            if(!in_array($ml, $module_list)){
            $zone_array3[]= $ml;
        }
    }
        foreach($module_list as $ml){
     $checkedLs .= "
             <p><input type='checkbox' id=". $userId ." name='module_name' value='".$ml."' checked>".$ml . "</p> ";
        }
        foreach($zone_array3 as $za){
            $checkedLs .= "
                    <p><input type='checkbox' id=". $userId ." name='module_name' value='". $za ."'>".$za . "</p> ";
               }

          //  $arrayMerge = array_merge($module_list, $zone_array3);

            $checkedLs .= "</div> </td>";
            return $checkedLs;
         }else{
           return $row=[];
         }
    }
$fetchData= fetch_data();


show_data($fetchData);

function show_data($fetchData){
 echo '
 <table class="table">
 <thead>
   <tr>
   <th scope="col">id</th>
     <th scope="col">userName</th>
     <th scope="col">Modules</th>
   </tr>
 </thead>
 <tbody>';

 if(count($fetchData)>0){

    $checkedLs = "";
      foreach($fetchData as $data){ 
  echo "<tr>
          <td>".$data['user_id']."</td>
          <td>".$data['user_username']."</td>";
         
          echo fetch_data2($data['user_id']);
          echo "</tr>";

      }


}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
   
?>