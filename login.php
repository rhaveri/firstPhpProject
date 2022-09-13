<?php
require 'header.php';
session_start();

include ("connection.php");
include ("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST")//if user has clicked on post button
{
    //sth was posted

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        //read from db
        $query = "select * from user where email = '$email' limit 1";


        $result = mysqli_query($con, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['password'] === $password) {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "wrong username or password!";
    } else {
        echo "wrong username or password!";
    }
}

?>

<h1>Log in</h1>


<div class="tab-content">
    <div class="tab-panel" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

        <form method="post">

            <div class="container1">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginName">Email </label>
                    <input type="email" id="loginName" class="form-control" name="email"/>
                </div>


                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" class="form-control" name="password"/>
                </div>

                <!-- 2 column grid layout -->
                <div class="row mb-4">


                    <div class="col-md-6 d-flex justify-content-center">
<!--                        <a href="#!">Forgot password?</a>-->
                    </div>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Log in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="register.php">Register</a></p>
                </div>

            </div>
        </form>
    </div>

</div>
