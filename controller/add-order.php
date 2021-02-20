<?php

    include('../config/config.php');
    $invoice = base64_encode($_POST['InvoiceData']);
    // Decode the JSON array
    // $tableData = json_decode($tableData,TRUE);
    $Table_Or_Room = $_POST['tbl_name'];
    $invoice_no = $_POST['invoice_no'];
    $payment_mode = $_POST['payment_mode'];
    $quantity = $_POST['quantity'];
    $charge = $_POST['charge'];
    $subtotal = $_POST['total_price'];
    $net_amount = $_POST['net_amount'];
    $taken_by = $_POST['taken_by'];
    $taken_by_id = $_POST['taken_by_id'];


    if (!empty($invoice)) {
        
        //insert item details in database
        $sql = "INSERT INTO `orders` (`invoice_no`, `table_or_room`, `quantity`, `total_price`, `charge`, `net_amount`, `payment_mode`, `invoice`, `taken_by`, `taken_by_id`) VALUES('{$invoice_no}', '{$Table_Or_Room}', {$quantity}, {$subtotal}, {$charge},{$net_amount},'{$payment_mode}','{$invoice}','{$taken_by}', {$taken_by_id})";
        $res = mysqli_query($conn,$sql);
        if(!$res){
            echo mysqli_error($conn);
        }

        //Deleting temporary data from table
        if (strpos($_POST['tbl_name'], "Table") !== false) {
            // Deleting table's item data from tbl_info
            $query = "DELETE FROM tbl_info WHERE tbl_name='{$_POST['tbl_name']}'";
            $resq = mysqli_query($conn,$query);
            if(!$resq){
                echo mysqli_error($conn);
            }
        }else {
            $query = "DELETE FROM room_info WHERE room_name='{$_POST['tbl_name']}'";
            $resq = mysqli_query($conn,$query);
            if(!$resq){
                echo mysqli_error($conn);
            }
        }
    }
?>