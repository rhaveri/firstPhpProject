<?php


session_start();

include("connection.php");
include("functions.php");

require 'header.php';

//post books to db
if ($_SERVER['REQUEST_METHOD'] == "POST")//if user has clicked on post button
{
//sth was posted
    $title = $_POST['title'];
    $author = $_POST['author'];
    $pages = $_POST['pages'];
    $isbn = $_POST['ISBN'];
    $prodDate = $_POST['productionDate'];


    if (!empty($title) && !empty($author) && !empty($pages) && !empty($isbn) && !empty($prodDate)) {
        //save to db
        $query = "insert into books (title, author, pages, ISBN, productionDate) values ('$title','$author','$pages','$isbn','$prodDate')";


        mysqli_query($con, $query);
        header("Location: index.php");
        die;
    } else {
        echo 'please enter the info';

    }
}
////save the form data into the books.json
//if (isset($_POST['submit'])){  //check if the user has pressed the submit button
//    $newBook = array(  //there is a post request so we are creating an array
//
//            'title' => $_POST['title'],
//            'author'=>$_POST['author'],
//            'pages'=>$_POST['pages'],
//            'isbn'=>$_POST['isbn'],
//            'prodDate'=>$_POST['prodDate']
//    );
//
//    if (filesize('books.json') == 0){ //checking if the books.json file is empty or has stored books in it //== 0 means zero bytes.
//
//        $first_record = array($newBook);//create an array inside json file to hold he books
//
//        $dataTOSave=$first_record; // assign the record to a generic variable for later use
//
//    }else{//if there are already stored books
//        $old_books = json_decode(file_get_contents("books.json"));//we have to decode the data in order to use them
//        array_push($old_books, $newBook);//add to the array the new book
//        $dataTOSave =$old_books; //assign the data to the generic variable
//    }
//
//    if (!file_put_contents("books.json", json_encode($dataTOSave), JSON_PRETTY_PRINT)){ //store data to books.json //function to encode the data so we can store them back to the file
//        $error= 'try again';//if sth goes wrong
//
//    }else{
//        $success='book is stored successfully';
//    }
//}


?>

<h1>Add books</h1>


<div class="tab-content">
    <div class="tab-panel" id="pills-login" role="tabpanel" aria-labelledby="tab-login">

        <form method="post">

            <div class="container1">
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookTitle">Title </label>
                    <input type="text" id="bookTitle" class="form-control" name="title"/>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="bookAuthor">Author</label>
                    <input type="text" id="bookAuthor" class="form-control" name="author"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookPages">Pages </label>
                    <input type="number" id="bookPages" class="form-control" name="pages"/>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label" for="bookISBN">ISBN</label>
                    <input type="number" id="bookISBN" class="form-control" name="ISBN"/>
                </div>
                <div class="form-outline mb-4">
                    <label class="form-label" for="bookProdDate"> Production Date</label>
                    <input type="date" id="bookProdDate" class="form-control" name="productionDate"/>
                </div>


                <br>

                <button type="submit" name="submit" class="btn btn-primary btn-block mb-4">Add a book</button>



            </div>
        </form>
    </div>

</div>
