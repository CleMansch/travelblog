<?php 

require_once 'db_connect.php';

if ($_POST) {
   $id = $_POST['id'];
   $skul=$_POST['statement'];
   // echo "id=".$id."<br>";
   // echo "skul=".$skul."<br>";

   $sql = "DELETE FROM ".$skul;
   // echo $sql;
    if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>" ;
       echo "<a href='../index.php'><button type='button'>Back</button></a>";
   } 


   else {
       echo "<br>Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>