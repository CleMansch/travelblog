<?php
//fetch.php
require_once 'actions/db_connect.php'; 
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM adresses 
  WHERE tod_name LIKE '".$search."%' 
  INNER JOIN concerts on adresses.adr_id = concerts.con_id 
  INNER JOIN restaurant on adresses.adr_id = restaurant.res_id
  INNER JOIN todo on adresses.adr_id = todo.tod_id
 ";
}
else
{
 $query = "
  SELECT * FROM todo ORDER BY tod_name
 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Name</th>
     <th>type</th>
     <th>descrip</th>
     <th>web</th>
         </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["tod_name"].'</td>
    <td>'.$row["tod_type"].'</td>
    <td>'.$row["tod_descr"].'</td>
    <td>'.$row["tod_web"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>