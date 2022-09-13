<?php


function check_login($con){
    if(isset($_SESSION['user_id']))  //checking if inside user there is an id, if the value is set
    {
        $id = $_SESSION['user_id'];
        $query = "select * from user where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0){// if the result is positive and the nr of rows is greater than 0
            $user_data =  mysqli_fetch_assoc($result);//fetch an assoc array

            return $user_data;
        }
    }

    //if code doesn't work, redirect to login
    header("Location: login.php");
}

function random_num($length)
{

    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4,$length);

    for ($i=0; $i < $len; $i++) {
        # code...

        $text .= rand(0,9);
    }

    return $text;
}