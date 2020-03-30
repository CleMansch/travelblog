<?php 

require_once 'db_connect.php';

if ($_POST) {
   $id = $_POST['id'];
      $skul=$_POST['statement'];
      $subtable=$_POST['subtable'];
      $subshrt=substr($subtable, 0, 3);

    echo "id=".$id."<br>";
   echo "skul=".$skul."<br>";
      echo "subtable=".$subtable."<br>";
          echo "subshrt=".$subshrt."<br>".$subshrt;
   $name = $_POST['title'];
   $type = $_POST['type'];
   $descr = $_POST[ 'description'];
   $web=$_POST['web'];
      $adress=$_POST['adress'];
   $condate=$_POST['condate'];
   $conprize=$_POST['conprize'];

if ($subtable=="todo"){
   $sql = "UPDATE $subtable SET {$subshrt}_name = '$name', {$subshrt}_type = '$type', {$subshrt}_descr = '$descr', {$subshrt}_adr = '$adress' WHERE {$subshrt}_id = {$id}" ;
}
elseif ($subtable=="concerts") {
   $sql = "UPDATE $subtable SET {$subshrt}_name = '$name', {$subshrt}_type = '$type', {$subshrt}_descr = '$descr', {$subshrt}_web = '$web', {$subshrt}_adr = '$adress',{$subshrt}_date = '$condate', {$subshrt}_conprize = '$conprize' WHERE {$subshrt}_id = {$id}" ;
}
else{
   $sql = "UPDATE $subtable SET {$subshrt}_name = '$name', {$subshrt}_type = '$type', {$subshrt}_descr = '$descr',{$subshrt}_adr = '$adress' WHERE {$subshrt}_id = {$id}" ;
}

   // $sql = "UPDATE $subtable SET {$subshrt}_name = '$name', {$subshrt}_type = '$type', {$subshrt}_descr = '$descr', {$subshrt}_web = '$web', {$subshrt}_adr = '$adress',{$subshrt}_date = '$condate', {$subshrt}_conprize = '$conprize' WHERE {$subshrt}_id = {$id}" ;
   echo "<br>".$sql."<br>";
   if($conn->query($sql) === TRUE) {
       echo  "<p>Successfully Updated</p>";
       echo "<a href='../update.php?id={$skul}.'><button class='btn btn-primary' type='button'>back</button></a>";
       echo  "<a href='../index.php'><button type='button'>Home</button></a>";
   } else {
        echo "Error while updating record : ". $conn->error;
   }

   $conn->close();

}
// 20todo%20WHERE%20tod_id=1
?>