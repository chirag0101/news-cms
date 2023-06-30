<?php
    include "config.php";
    if($_SESSION['user_role']==0){
        header('location:post.php');
    } 
    $id = $_GET['id'];
    $query="DELETE FROM category WHERE category_id={$id}";
    if(mysqli_query($conn,$query)){
        header('location:category.php');
    }else{
        echo "<p style='color:red; margin:10px 0;'>Deletion Failed!</p>";
    }
?>