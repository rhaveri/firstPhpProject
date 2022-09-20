<?php
require_once 'bootstrap.php';
require 'header.php';

$container = new Container($configuration);
$bookService = $container->getBookService();

$id = $_REQUEST['id'];

 if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $ISBN = $_POST['ISBN'];
    $productionDate = $_POST['productionDate'];
    $bookService->updateBookInfo($id, $title, $author, $pages, $ISBN, $productionDate);
}
 else if (isset($_POST['delete'])) {
     $bookService->deleteBook($_POST['id']);
 }
?>

<h1>Update a book</h1>

<div class="tab-content">
    <div class="tab-panel" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

        <form method="POST" action="booksUpdate.php">

            <div class="container1">
                <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>"/>

                <div class="form-outline mb-4">
                    <label class="form-label" >Title </label>
                    <input type="text" id="title" class="form-control" value="<?= $_REQUEST['title'] ?>"
                           name="title" />
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" >Author</label>
                    <input type="text" id="author" class="form-control" value="<?= $_REQUEST['author'] ?>"
                           name="author" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" >Pages </label>
                    <input type="number" id="pages" class="form-control" value="<?= $_REQUEST['pages'] ?>"
                           name="pages" />
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" >ISBN</label>
                    <input type="number" id="ISBN" class="form-control" value="<?= $_REQUEST['ISBN'] ?>"
                           name="ISBN" />
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label"> Production Date</label>
                    <input type="date" id="productionDate" class="form-control" value="<?= $_REQUEST['productionDate'] ?>"
                           name="productionDate" />
                </div>


                <br>

                <input type="submit" name="update" class="btn btn-primary btn-block mb-4" value="Update"/>


            </div>
        </form>
    </div>

</div>
