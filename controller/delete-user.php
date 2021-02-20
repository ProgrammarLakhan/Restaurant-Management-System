<?php
    include('../config/config.php');
    
    $sql = "DELETE FROM `auth` WHERE id={$_POST['id']}";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Deleted Successfully";
    }else {
        echo "Error: ".mysqli_error($conn);
    }

?>