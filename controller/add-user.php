<?php
    include('../config/config.php');
    $username = $_POST["username"];
    $sql = "SELECT * FROM `auth` WHERE username='{$username}'";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Username already taken!!! Try again.";
    }else{
        $sql = "INSERT INTO `auth` (`username`, `user_id`, `password`, `permission`) VALUES ('{$_POST["username"]}', '{$_POST["user_id"]}', '{$_POST["password"]}', 'user');";
        $res = mysqli_query($conn,$sql);
        if($res){
            echo "User created successfully";
        }else{
            echo "Error: ".mysqli_error($conn);
        }
    }
?>