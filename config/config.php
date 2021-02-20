<?php
    $conn = mysqli_connect("localhost","root","","restaurant");
    if(!$conn){
        echo mysqli_error($conn);
    }
?>