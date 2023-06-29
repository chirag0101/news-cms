<?php
    include "config.php";
    $id=$_GET['id'];
    $query="DELETE FROM user WHERE user_id='{$id}'";
    if(mysqli_query($conn,$query)){
        header('location:users.php');
    }else{
        echo "<p style='color:red; margin:10px 0;'>Deletion Failed!</p>";
    }
    mysqli_close($conn);
?>