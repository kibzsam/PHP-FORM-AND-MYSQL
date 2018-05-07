<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database ='webapp';
$conn = new mysqli($servername, $username, $password, $database);
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

    $query = mysqli_query($conn, "SELECT ID, username, password FROM user WHERE username='$_POST[username]' AND password='$_POST[password]'")or die(mysqli_connect_error());
    $count= mysqli_fetch_row($query);
    if($count>0){

        session_start();
        $_SESSION['ID']=$_POST['ID'];

        header("location:evaluation.php");

    }else{
        $message="wrong Password or Username";
    }
}

?>