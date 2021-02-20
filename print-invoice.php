<?php
    include('config/config.php');
    $order_id = $_GET['id'];
    $sql = "SELECT invoice FROM `orders` WHERE id={$order_id}";
    $res= mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    echo base64_decode($row['invoice']);
    echo '<script>
            window.onload = function(){
                window.print();
            };
        </script>';
?>