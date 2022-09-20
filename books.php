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
    $bookService->addBook($id, $title, $author, $pages, $ISBN, $productionDate);
    header('Location:booksView.php');

}

?>

<h1>Add books</h1>


<div class="tab-content">
    <div class="tab-panel" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

        <form method="post">

            <div class="container1">
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookTitle">Title </label>
                    <input type="text" id="bookTitle" class="form-control"
                           name="title"/>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="bookAuthor">Author</label>
                    <input type="text" id="bookAuthor" class="form-control"
                           name="author"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookPages">Pages </label>
                    <input type="number" id="bookPages" class="form-control"
                           name="pages"/>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="bookISBN">ISBN</label>
                    <input type="number" id="bookISBN" class="form-control"
                           name="ISBN"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookProdDate"> Production Date</label>
                    <input type="date" id="bookProdDate" class="form-control"
                           name="productionDate"/>
                </div>


                <br>

                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Add a book</button>


            </div>
        </form>
    </div>

</div>
