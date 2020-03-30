<?php 
ob_start();
session_start();

require_once 'actions/db_connect.php'; 

// it will never let you open index(login) page if session is set
if( !isset($_SESSION['user' ]) ) {
 header("Location: ..\login\index.php");
 exit;
}

// define ('DBHOST', 'localhost');
// define('DBUSER', 'root');
// define('DBPASS', '');
// define ('DBNAME', 'cr11_clemensmanschek_travelmatic');
// $conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_Id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html>
<head>
   <title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <style type ="text/css">
       .manageUser {
           width : 50%;
           margin: auto;
       }

        table {
           width: 100%;
            margin-top: 20px;
       }

   </style>

</head>
<body>
          Hi <?php echo $userRow['userEmail' ]; ?>
           
           <a  href="..\login\logout.php?logout">Sign Out</a>
<div class ="manageUser">

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="index.php">Show all</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="restaurants.php">Gustotorics</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="events.php">Events</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>


<!-- table todo  -->
<h3>Locations</h3>
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>Name</th>
               <th >Type</th>
               <th >Description</th>
               <th >Web Adress</th>
               <th >City</th>

           </tr>
       </thead>
       <tbody>
            <?php
           $sql = "SELECT * FROM todo Join adresses on adresses.adr_id = todo.tod_adr";
           $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                   echo  "<tr>
                   <td>" .$row['tod_name']."</td>
                       <td>" .$row['tod_type']."</td>
                       <td>" .$row['tod_descr']."</td>
                        <td><a href='".$row['adr_web']."'>" .$row['adr_web']."</a></td>
                        <td>" .$row['adr_city']."</td>

                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>

       </tbody>
   </table>


<!-- table concerts  -->
<h3>Concerts</h3>
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>Name</th>
               <th >Type</th>
               <th >Description</th>
               <th >Web Adress</th>
               <th >City</th>
               <th >Date</th>
               <th >Prize</th>

           </tr>
       </thead>
       <tbody>
            <?php
           $sql = "SELECT * FROM concerts Join adresses on adresses.adr_id = concerts.con_adr";
           $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                   echo  "<tr>
                   <td>" .$row['con_name']."</td>
                       <td>" .$row['con_type']."</td>
                       <td>" .$row['con_descr']."</td>
                        <td><a href='".$row['con_web']."'>" .$row['con_web']."</a></td>
                        <td>" .$row['adr_city']."</td>
                        <td>" .$row['con_date']."</td>
                        <td>" .$row['con_prize']."</td>

                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>

       </tbody>
   </table>
</div>

</body>
</html>

<?php ob_end_flush(); ?>