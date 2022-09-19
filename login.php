<?php
require 'header.php';
require 'bootstrap.php';


$container = new Container($configuration);
if(isset($_POST['submit'])){
    $userServicr = $container->getUserService();
    $userServicr->log_in();

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
                <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">Log in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="register.php">Register</a></p>
                </div>

            </div>
        </form>
    </div>

</div>
