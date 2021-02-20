<?php
    include('../config/config.php');
    $sql = "INSERT INTO `items` (`name`, `name_hindi`, `category`, `price`) VALUES ('{$_POST["item"]}', '{$_POST["item_hindi"]}', '{$_POST["category"]}', {$_POST["price"]})";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Item added Successfully!!!";
    }else{
        echo "Error: ".mysqli_error($conn);
    }
?>