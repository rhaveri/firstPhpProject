<?php

require 'header.php';
require_once 'bootstrap.php';

$container = new Container($configuration);
$bookService = $container->getBookService();


$id = $_REQUEST['id'];
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $ISBN = $_POST['ISBN'];
    $productionDate = $_POST['productionDate'];
    $bookService->addBook($title, $author, $pages, $ISBN, $productionDate);
    header('Location:booksView.php');

} else if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $ISBN = $_POST['ISBN'];
    $productionDate = $_POST['productionDate'];
    $bookService->updateBookInfo($title, $author, $pages, $ISBN, $productionDate);
}
?>

<h1>Add books</h1>


<div class="tab-content">
    <div class="tab-panel" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

        <form method="post" action="">

            <div class="container1">
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookTitle">Title </label>
                    <input type="text" id="bookTitle" class="form-control" value='<?= $_REQUEST['title'] ?>'
                           name="title"/>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="bookAuthor">Author</label>
                    <input type="text" id="bookAuthor" class="form-control" value='<?= $_REQUEST['author'] ?>'
                           name="author"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookPages">Pages </label>
                    <input type="number" id="bookPages" class="form-control" value='<?= $_REQUEST['pages'] ?>'
                           name="pages"/>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="bookISBN">ISBN</label>
                    <input type="number" id="bookISBN" class="form-control" value='<?= $_REQUEST['ISBN'] ?>'
                           name="ISBN"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookProdDate"> Production Date</label>
                    <input type="date" id="bookProdDate" class="form-control" value='<?= $_REQUEST['productionDate'] ?>'
                           name="productionDate"/>
                </div>


                <br>

                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Add a book</button>
                <button type="submit" name="update" class="btn btn-primary btn-block mb-4">Update book</button>


            </div>
        </form>
    </div>

</div>
