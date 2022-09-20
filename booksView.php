<?php
require 'header.php';
require_once 'bootstrap.php';

$container = new Container($configuration);
$bookService = $container->getBookService();
$books = $bookService->getBooks();




?>


<!DOCTYPE html>
<html>
<head>
    <title>My website</title>
</head>
<div class="table-responsive">
    <table class="table table-bordered">
        <h1>This is the BOOKS page</h1>
        <div class="text-right">

            <button class="btn btn-default" name="add"><a href="books.php">Add book</a></button>

        </div>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Publish date</th>

        </tr>

        <?php
        foreach ($books as $book) { ?>
            <form action='booksView.php' method="POST">
<tr>
                <td> <?php echo $book->getTitle(); ?> </td>
                <td><?php echo $book->getAuthor(); ?> </td>
                <td> <?php echo $book->getPages(); ?> </td>
                <td> <?php echo $book->getIsbn(); ?></td>
                <td><?php echo $book->getProdDate(); ?></td>

                <input type="hidden" name="id" value='<?= $book->getId(); ?>'/>

                <td>
                    <input type="submit" class='btn btn-warning' name="edit" value="Edit"/>
                    <input type="submit" class='btn btn-danger' name='delete' value="Delete"/>
                </td>
                </tr>
            </form>
        <?php } ?>
    </table>
</div>

</body>
</html>