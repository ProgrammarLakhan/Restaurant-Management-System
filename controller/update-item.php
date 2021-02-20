<?php
    include('../config/config.php');
    $sql = "UPDATE items SET name = '{$_POST["modal-item"]}', name_hindi= '{$_POST["modal-item-hindi"]}',category='{$_POST["modal-category"]}',price='{$_POST["modal-price"]}' WHERE id = {$_POST['modal-id']}";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "Updated Successfully";
    }else {
        echo "Error: ".mysqli_error($conn);
    }
?>