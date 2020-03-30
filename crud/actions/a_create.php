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
   $name = $_POST['name'];
   $type = $_POST['type'];
   $descr = $_POST[ 'description'];
   $web=$_POST['web'];
      $adress=$_POST['adress'];
   $condate=$_POST['condate'];
   $conprize=$_POST['conprize'];

if ($subtable=="todo"){
   $sql = "INSERT INTO `todo` (`tod_id`,`tod_name`, `tod_type`, `tod_descr`,`tod_web`, `tod_adr`) VALUES 
   (NULL,'$name', '$type', '$descr','$web', '$adress')" ;
}
elseif ($subtable=="concerts") {
   $sql = "INSERT INTO `concerts` (`con_id`,`con_name`, `con_type`, `con_descr`,`con_web`, `con_adr`,`con_date`,`con_prize`) VALUES 
   (NULL,'$name', '$type', '$descr','$web', '$adress','$condate','$conprize')" ;
}
// restaurant
else{
   $sql = "INSERT INTO `restaurant` (`res_id`,`res_name`, `res_type`, `res_descr`, `res_adr`) VALUES 
   (NULL,'$name', '$type', '$descr', '$adress')" ;
}

    if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>" ;
       echo "<a href='../create.php'><button type='button'>Back</button></a>";
        echo "<a href='../index.php'><button type='button'>Home</button></a>";
   } else  {
       echo "Error " . $sql . ' ' . $conn->connect_error;
   }

   $conn->close();
}

?>