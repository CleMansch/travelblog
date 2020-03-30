<!DOCTYPE html>
<html>
<head>
   <title>add media</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <style type= "text/css">
       fieldset {
           margin: auto;
            margin-top: 100px;
           width: 50% ;
       }

       table tr th  {
           padding-top: 20px;
       }
   </style>

</head>
<body>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Create Restaurant
        </button>
      </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

<fieldset>
   <legend>Add Restaurant</legend>

   <form action="actions/a_create.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>name</th>
               <td><input type="text"  name="name" placeholder ="name" value="" /></td>
           </tr >    
           <tr>
               <th>type</th>
               <td><input type= "text" name="type"  placeholder="type" value ="" /></td >
           </tr>
           <tr>
               <th >description</th>
               <td><input type ="text" name= "description" placeholder= "description" value= "" /></td>
           </tr>
           <tr>
               <th >adress is int</th>
               <td><input type ="text" name= "adress" placeholder= "adress" value= "" /></td>
           </tr>
           <tr>
               <input type= "hidden" name= "subtable" value= "restaurant" />
               <td><a href='actions/a_create.php'><button class="btn btn-info"  type= "submit">create</button></a></td>
               <td>                <a href='index.php'><button class='btn btn-success'  type='button'>back</button></a></td >
           </tr>
       </table>
   </form >


</fieldset >
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Create Todo
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
 <fieldset>
   <legend>Add todo</legend>

   <form action="actions/a_create.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>name</th>
               <td><input type="text"  name="name" placeholder ="name" value="" /></td>
           </tr >    
           <tr>
               <th>type</th>
               <td><input type= "text" name="type"  placeholder="type" value ="" /></td >
           </tr>
           <tr>
               <th >description</th>
               <td><input type ="text" name= "description" placeholder= "description" value= "" /></td>
           </tr>
           <tr>
               <th >web</th>
               <td><input type ="text" name= "web" placeholder= "web" value= "" /></td>
           </tr>
           <tr>
               <th >adress is int</th>
               <td><input type ="text" name= "adress" placeholder= "adress" value= "" /></td>
           </tr>
           <tr>
               <input type= "hidden" name= "subtable" value= "todo" />
               <td><a href='actions/a_create.php'><button class="btn btn-info"  type= "submit">create</button></a></td>
               <td>                <a href='index.php'><button class='btn btn-success'  type='button'>back</button></a></td >
           </tr>
       </table>
   </form >


</fieldset >
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
Create Concert
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
 <fieldset>
   <legend>Add concert</legend>

   <form action="actions/a_create.php"  method="post">
       <table  cellspacing="0" cellpadding= "0">
           <tr>
               <th>name</th>
               <td><input type="text"  name="name" placeholder ="name" value="" /></td>
           </tr >    
           <tr>
               <th>type</th>
               <td><input type= "text" name="type"  placeholder="type" value ="" /></td >
           </tr>
           <tr>
               <th >description</th>
               <td><input type ="text" name= "description" placeholder= "description" value= "" /></td>
           </tr>
           <tr>
               <th >web</th>
               <td><input type ="text" name= "web" placeholder= "web" value= "" /></td>
           </tr>
           <tr>
               <th >adress is int</th>
               <td><input type ="text" name= "adress" placeholder= "adress" value= "" /></td>
           </tr>
           <tr>
               <th >condate</th>
               <td><input type ="date" name= "condate" placeholder= "2019-11-23" value= "" /></td>
           </tr>
           <tr>
               <th >conprize</th>
               <td><input type ="text" name= "conprize" placeholder= "conprize" value= "" /></td>
           </tr>
           <tr>
               <input type= "hidden" name= "subtable" value= "concerts" />
               <td><a href='actions/a_create.php'><button class="btn btn-info"  type= "submit">create</button></a></td>
               <td>                <a href='index.php'><button class='btn btn-success'  type='button'>back</button></a></td >
           </tr>
       </table>
   </form >


</fieldset >
      </div>
    </div>
  </div>
</div>
               <td>                <a href='index.php'><button class='btn btn-success'  type='button'>back</button></a></td >

</body>
</html>