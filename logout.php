<?php

session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);//unset a set value

}

header("Location: login.php");//go to login page
die;