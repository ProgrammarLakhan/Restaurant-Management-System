<?php

    include('../config/config.php');
    $tableData = stripcslashes($_POST['TableData']);
    // Decode the JSON array
    $tableData = json_decode($tableData,TRUE);
    if (strpos($_POST['tbl_name'], "Table") !== false) {
        // Deleting table's item data from tbl_info
        $query = "DELETE FROM tbl_info WHERE tbl_name='{$_POST['tbl_name']}'";
        $resq = mysqli_query($conn,$query);
        if(!$resq){
            echo mysqli_error($conn);
        }

        $values = array();
        if (count($tableData) != 0) {
            for($x=0 ; $x < count($tableData) ; $x++){
                $values[$x] = "('".$_POST['tbl_name']."','".$tableData[$x]['item']."',".$tableData[$x]['qty']." , ".$tableData[$x]['unit_price']." , ".$tableData[$x]['total_price'].")";
            }
            $values = implode(",",$values);
            //insert item details in database
            $sql = "INSERT INTO `tbl_info` (`tbl_name`, `item`, `qty`, `unit_price`, `total_price`) VALUES ".$values;
            $res = mysqli_query($conn,$sql);
            if(!$res){
                echo mysqli_error($conn);
            }
        }    
    } else {
        // Deleting table's item data from tbl_info
        $query = "DELETE FROM room_info WHERE room_name='{$_POST['tbl_name']}'";
        $resq = mysqli_query($conn,$query);
        if(!$resq){
            echo mysqli_error($conn);
        }

        $values = array();
        if (count($tableData) != 0) {
            for($x=0 ; $x < count($tableData) ; $x++){
                $values[$x] = "('".$_POST['tbl_name']."','".$tableData[$x]['item']."',".$tableData[$x]['qty']." , ".$tableData[$x]['unit_price']." , ".$tableData[$x]['total_price'].")";
            }
            $values = implode(",",$values);
            //insert item details in database
            $sql = "INSERT INTO `room_info` (`room_name`, `item`, `qty`, `unit_price`, `total_price`) VALUES ".$values;
            $res = mysqli_query($conn,$sql);
            if(!$res){
                echo mysqli_error($conn);
            }
        }
    }
    
    
    
?>