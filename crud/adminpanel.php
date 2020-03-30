<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

if(!isset($_SESSION["admin"])){
  header("Location: ../login/index.php");
}

if(isset($_SESSION["user"])){
  header("Location: index.php");
}
// if session is not set this will redirect to login page

// select logged-in users details
$res=mysqli_query($conn, "SELECT * FROM users WHERE user_Id=".$_SESSION['admin']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
   <title>Welcome - <?php echo $userRow['userEmail' ]; ?></title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
          Hi Mr. Admin <?php echo $userRow['user_Email' ]; ?>
           
           <a  href="..\login\logout.php?logout">Sign Out</a>
<div class ="manageUser">
   <a href= "create.php"><button class="btn btn-secondary" type="button" >Add Media</button></a>


<!-- table todo  -->
<h3>Todo</h3>
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>Name</th>
               <th >Type</th>
               <th >Description</th>
               <th >Web Adress</th>
               <th >City</th>
               <th >buttns</th>
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
                       <td>
                        <a href='update.php?id=".' todo WHERE '.'tod_id='.$row['tod_id']."'><button class='btn btn-primary' type='button'>Edit</button></a>
                        <a href='delete.php?id=".' todo WHERE '.'tod_id='.$row['tod_id']."'><button class='btn btn-danger'  type='button'>Delete</button></a>
                       </td>
                   </tr>" ;
               }
           } else  {
               echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
           }
            ?>

       </tbody>
   </table>

<!-- table restaurant  -->
<h3>Restaurants</h3>
   <table  border="1" cellspacing= "0" cellpadding="0">
       <thead>
           <tr>
               <th>Name</th>
               <th >Type</th>
               <th >Description</th>
               <th >Web Adress</th>
               <th >City</th>
               <th >buttns</th>
           </tr>
       </thead>
       <tbody>
            <?php
           $sql = "SELECT * FROM restaurant Join adresses on adresses.adr_id = restaurant.res_adr";
           $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                   echo  "<tr>
                   <td>" .$row['res_name']."</td>
                       <td>" .$row['res_type']."</td>
                       <td>" .$row['res_descr']."</td>
                        <td><a href='".$row['adr_web']."'>" .$row['adr_web']."</a></td>
                        <td>" .$row['adr_city']."</td>
                       <td>
                        <a href='update.php?id=".' restaurant WHERE '.'res_id='.$row['res_id']."'><button class='btn btn-primary' type='button'>Edit</button></a>
                        <a href='delete.php?id=".' restaurant WHERE '.'res_id='.$row['res_id']."'><button class='btn btn-danger'  type='button'>Delete</button></a>
                       </td>
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
               <th >buttns</th>
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
                       <td>
                        <a href='update.php?id=".' concerts WHERE '.'con_id='.$row['con_id']."'><button class='btn btn-primary' type='button'>Edit</button></a>
                        <a href='delete.php?id=".' concerts WHERE '.'con_id='.$row['con_id']."'><button class='btn btn-danger'  type='button'>Delete</button></a>
                       </td>
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