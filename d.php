<?php
include 'connection.php';


if (isset($_GET['deleteid'])) {//variable passed through url,
    $id = $_GET['deleteid'];//access parameters from url
    $query = "DELETE FROM `books` WHERE id = '$id'";
    $run = mysqli_query($con,$query);
    if ($run) {
        header('location:index.php');
    }else{
        echo "Error: ".mysqli_error($con);
    }
}
?>