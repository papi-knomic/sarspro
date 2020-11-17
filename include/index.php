<?php

  if(isset($_POST['save']))
{
       require 'dbCon.php';
    $sql = "INSERT INTO report (username, area, state, direction)
    VALUES ('".$_POST["username"]."','".$_POST["area"]."','".$_POST["state"]."','".$_POST["direction"]."')";

    $result = mysqli_query($con,$sql);
    if($result == true){
                    session_start();
                    header("Location: ../index.php?success=Success");
                    exit();
                }
}

?>


