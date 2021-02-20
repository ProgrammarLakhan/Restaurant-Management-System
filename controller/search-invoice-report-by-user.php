<?php
    include('../config/config.php');
    $FromDate = $_POST['FromDate'];
    $ToDate = $_POST['ToDate'];
    $user_id = $_POST['id'];
    $sql = "SELECT * FROM `orders` WHERE taken_by_id={$user_id} HAVING time BETWEEN '{$FromDate}' AND '{$ToDate}'";
    $res= mysqli_query($conn,$sql);
    if($res){
        $count = 1;
        while($row = mysqli_fetch_assoc($res) ){
            echo "<tr>
                    <td>".$count."</td>
                    <td>".$row['invoice_no']."</td>
                    <td>".$row['table_or_room']."</td>
                    <td>".date("d/m/Y",strtotime($row['time']))."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['total_price']."</td>
                    <td>".$row['charge']."</td>
                    <td>".$row['net_amount']."</td>
                    <td>".$row['payment_mode']."</td>
                    <td><a href='print-invoice.php?id=".$row["id"]."' target='_blank' class='btn btn-default'><i class='fas fa-print'></i></a></td>
                </tr>";
            $count = $count + 1;
        }
    }
?>