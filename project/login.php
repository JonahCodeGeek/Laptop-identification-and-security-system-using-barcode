<?php
$Username=$_POST['Username'];
$Password=$_POST['Password'];

//database connection
$con=new mysqli("localhost","root","","Myprac");
if($con->connect_error){
  die("Failed to connect : ".$con->connect_error);
}
else{
  $stmt= $con->prepare("select* from security where Username = ?");
  $stmt->bind_param("s",$Username);
  $stmt->execute();
  $stmt_result= $stmt->get_result();
  if($stmt_result->num_rows >0){
    $data =$stmt_result->fetch_assoc();
    if($data['Password']== $Password){
      echo "<h1>Loged in succesfully</h1>"

    }else{
        echo "<h1>Invalid pas or username</h1>"
    }
  }else{
  echo "<h1>Invalid pas or username</h1>"
  }
}
?>
