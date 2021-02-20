<?php
    $username = stripcslashes($_POST['username']);
    $password = stripcslashes($_POST['password']);

    include('../config/config.php');
    $sql = "SELECT * FROM `auth` WHERE `username`='{$username}'";
    $res = mysqli_query($conn,$sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($row['password'] == $password) {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['permission'] = $row['permission'];
            $path = '';
            if($row['permission'] == 'admin'){
                $path = 'dashboard.php';
            }else if($row['permission'] == 'user'){
                $path = 'user/dashboard.php';
            }
            echo $path;
        } else {
            echo "Invalid Credentials please try again!!!";
        }
    } else {
        echo "Invalid Credentials please try again!!!";
    }
    
?>