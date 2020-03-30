<?php 
require_once 'actions/db_connect.php';

if ($_GET['id']) {
   $id = $_GET['id'];

   $sql = "SELECT * FROM {$id}";

   $result = $conn->query($sql);
   $data = $result->fetch_assoc();

// echo "id=".$id."<br>";
$subbi = substr($id,-8,-2);

if ($subbi=="res_id"){
$subtable="restaurant";
}
elseif ($subbi=="tod_id") {
$subtable="todo";
}
else{
$subtable="concerts";
}
// echo "<br> subbi=" .$subbi ."<br>";
// echo "<br>subtable=".$subtable."<br>";
   $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
   <title >Delete media</title>
</head>
<body>

<h3>Do you really want to delete this media?</h3>

<form action ="actions/a_delete.php" method="post">

   <input type="hidden" name= "id" value="<?php echo $data[$subbi]?>" />
   <input type="hidden" name= "statement" value="<?php echo $id ?>" />
   <button type="submit">Yes, delete it!</button>
   <a href="index.php"><button type="button">No, go back!</button></a>
</form>

</body>
</html>

<?php
}
echo $data['tod_id'];
?>