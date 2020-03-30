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
   <title>Welcome - <?php echo $userRow['user_email']; ?></title>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />


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
   <style>
     #fb-btn , #logout{
       display: none;
     }
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
       #map {
        height: 15%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
   </style>
</head>
<body>
     <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 48.209, lng: 16.3072},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap"
    async defer></script>

          Hi <?php echo $userRow['user_email']; ?>
           
           <a  href="..\login\logout.php?logout">Sign Out</a>
<div class ="manageUser">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="index.php">Show all</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="restaurants.php">Gustotorics</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="events.php">Events</a>
  </li>
</ul>

 <div class="container">
   <br />
   <h2 align="center">Customer Database Search Engine</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="todo name" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
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