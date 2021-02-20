<?php
    include('../config/config.php');
    $FromDate = $_POST['FromDate'];
    $ToDate = $_POST['ToDate'];
    $sql = "SELECT item,unit_price,SUM(qty) as qty,SUM(total_price) as amount,date FROM `orders` GROUP BY item HAVING date BETWEEN '{$FromDate}' AND '{$ToDate}'";
    $res= mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) > 0){
        $count = 1;
        while($row = mysqli_fetch_assoc($res) ){
            echo "<tr>
                    <td>".$count."</td>
                    <td>".date("d/m/Y",strtotime($row['date']))."</td>
                    <td>".$row['item']."</td>
                    <td>".$row['qty']."</td>
                    <td>".$row['unit_price']."</td>
                    <td>".$row['amount']."</td>
                </tr>";
            $count = $count + 1;
        }
    }
?>