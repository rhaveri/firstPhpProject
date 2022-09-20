<?php

require 'header.php';
require_once 'bootstrap.php';


$container = new Container($configuration);
$userService = $container->getUserService();
$user1 = $userService->getUsers();



?>


<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
</head>
<div class="table-responsive">
    <table class="table table-bordered">
        <h1>This is the users page</h1>

        <br>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        <?php
        foreach ($user1 as $item) { ?>
            <form action='usersUpdated.php' method="POST">
                <tr>
                    <td> <?php echo $item->getName(); ?></td>
                    <td> <?php echo $item->getUsername(); ?></td>
                    <td> <?php echo $item->getEmail(); ?> </td>

                    <input type="hidden" name="id" value='<?= $item->getId(); ?>'/>
                    <input type="hidden" name="name" value='<?= $item->getName(); ?>'/>
                    <input type="hidden" name="username" value='<?= $item->getUsername(); ?>'/>
                    <input type="hidden" name="email" value='<?= $item->getEmail(); ?>'/>


                    <td>
                        <input class="btn btn-primary" type="submit" name="edit" value="Edit"/>
                    </td>
                    <td>
                        <button class="btn btn-danger" name="delete">Delete</button>
                    </td>

                </tr>
            </form>
        <?php } ?>

    </table>
    <a href="booksView.php"> go to books</a>
    <a href="books.php"> register books</a>
</div>

</body>
</html>