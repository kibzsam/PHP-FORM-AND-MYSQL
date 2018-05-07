<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web Evaluator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="syle">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <form class="login-form" action="#" method="POST">
                <h3 class="title">User.</h3>
                <div class="form-group" id="username">
                    <label for="Username">Name</label>
                    <input type="text" name="name" class="form-control input-group-sm " placeholder="Name" 
                    value="">
                </div>
                <div class="form-group" id="math">
                    <label for="math">Math  </label>
                    <input type="number" name="math" class="form-control input-group-sm"placeholder="math">
                    
                </div>
                <div class="form-group" id="english">
                    <label for="english">English  </label>
                    <input type="number" name="english" class="form-control input-group-sm"placeholder="english">
                    
                </div>
                <div class="form-group" id="password">
                    <label for="kiswahili">Kiswahili  </label>
                    <input type="number" name="kiswahili" class="form-control input-group-sm"placeholder="kiswahili">
          
                </div>
                <button type="submit" name="submit" class="btn btn-primary">submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<?php
  global $math, $english,$kiswahili,$total,$average;
  //The code below will capture data from the user form and stor
  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $math=$_POST['math'];
    $english=$_POST['english'];
    $kiswahili=$_POST['kiswahili'];
    $total= $math+$english+$kiswahili;
    $average= $total/3;
    $conn=mysqli_connect('localhost','root','');
    $con = new mysqli();
    if(!$conn) die("Cannot connect to database". mysqli_connect_error());
    $db = mysqli_select_db($conn,'marks');
    if(!$db) die('Cannot connect to Database'.mysqli_error($conn));
    $verify= "SELECT count(*) as allcount FROM marks WHERE Name='".$name."'";
    $result=mysqli_query($conn,$verify);
    $row=mysqli_fetch_array($result);
    $allcount=$row['allcount'];
    if($allcount==0){
        $query= mysqli_query($conn,"INSERT INTO marks (Name, Math,English,Kiswahili, Total, Average) VALUES ('$name','$math','$english','$kiswahili','$total','$average')");
        if($query===TRUE){
            echo '<div class="alert alert-success">';
            echo "<p>".'."New record Created Successfully".'."</p>";
            echo"<p>";
            echo "Name>".$name;
            echo"</p>";
            echo"<p>";
            echo "Average>".$average;
            echo"</p>";
            echo"<p>";
            echo "The Total Score is:".$total;
            echo"</p>";
            echo "</div>";
        }
        else{
            echo '<div class="alert alert-danger">';
            echo "There was an Error".$con->error;
            echo "</div>";
        }
        mysqli_close($conn);
    }
    else{
        echo '<div class="alert alert-danger">';
        echo "<p>".'."A RECORD BELONGING TO".'."</p>".$name.' ALREADY EXISTS, PLEASE ENTER ANOTHER RECORD.';
        echo "</div>";
    }

 }
  
?>
</html>
