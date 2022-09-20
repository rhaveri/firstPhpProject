<?php
require_once 'bootstrap.php';
require_once 'header.php';

$container = new Container($configuration);
$userService = $container->getUserService();

$id = $_REQUEST['id'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $userService->updateUser($id, $name, $username, $email);
}


else if (isset($_POST['delete'])) {
    $userService->deleteUser($_POST['id']);

}
?>

<h1>Update a user</h1>
<div class="tab-content">
    <div class="tab-panel" id="pills-login" role="tabpanel" aria-labelledby="tab-login">


        <form action="usersUpdated.php" method="POST">

            <div class="container1">

                <input type="hidden" name="id" value='<?= $_REQUEST['id'] ?>'/>

                <div class="form-outline mb-4">
                    <label class="form-label">Name </label>
                    <input type="text" id="name" class="form-control" value="<?= $_REQUEST['name'] ?>" name="name"/>
                </div>



                    <div class="form-outline mb-4">
                        <label class="form-label">Username </label>
                        <input type="text" id="username" class="form-control" value="<?= $_REQUEST['username'] ?>"
                               name="username"/>
                    </div>



                    <div class="form-outline mb-4">
                        <label class="form-label">Email </label>
                        <input type="email" class="form-control" value="<?= $_REQUEST['email'] ?>" name="email"/>
                    </div>



                <input type="submit" class="btn btn-primary" name="update" value="Update"/>
            </div>

        </form>


    </div>

</div>
