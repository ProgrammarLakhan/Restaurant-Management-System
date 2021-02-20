<?php
    include('../config/config.php');
    
    $id = $_POST['id'];
    // echo $id.$_POST['username'];

    $sql = "UPDATE `auth` SET username='{$_POST["username"]}' , user_id='{$_POST["user_id"]}' , password='{$_POST["password"]}' WHERE id={$id}";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Updated Successfully";
    }else {
        echo "Error: ".mysqli_error($conn);
    }
?>