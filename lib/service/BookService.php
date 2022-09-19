<?php

class BookService
{

    private $pdo;


    public function __construct(PDO $pdo){
        $this->pdo= $pdo;
    }
    private $bookArray;

    public function getBooks()
    {
        $booksArray = $this->queryForBooks();
        $books = array();
        foreach ($booksArray as $item){
            $books[$item['id']] = $this->createBook($item);
        }
        return $books;
    }

    public function findOneById($id){
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM books where id = :id');
        $statement->execute(array('id'=>$id));
        $bookArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$bookArray ){
            return null;
        }

        return $this->createBook($bookArray);
    }

    public function deleteBook($id){
        $pdo = $this->pdo;
        $statement = $pdo->prepare('DELETE FROM books where id = :id');
        $statement->bindParam('id',$id);
        $statement->execute();
        header('Location:booksView.php');
    }

    public function addBook($title, $author, $pages, $ISBN, $productionDate){
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('INSERT INTO books (title, author, pages, ISBN, productionDate) VALUES (?,?,?,?,?)');

        $statement->execute([$title, $author, $pages, $ISBN, $productionDate]);
        $bookArray = $statement->fetch(PDO::FETCH_ASSOC);


        if (!$bookArray ){
            return null;
        }

        $this->bookArray = $bookArray;




    }

    public function updateBookInfo($id, $title, $author, $pages, $ISBN, $productionDate){
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('UPDATE books SET title =:title, author=:author, pages=:pages, ISBN =:ISBN, 
                 productionDate=:productionDate WHERE id= :id');
        $statement->bindParam('id',$id);
        $statement->bindParam('title',$title);
        $statement->bindParam('author',$author);
        $statement->bindParam('pages',$pages);
        $statement->bindParam('ISBN',$ISBN);
        $statement->bindParam('$productionDate',$$productionDate);

        $statement->execute();
        header("Location: booksView.php");

    }

    public function createBook(array $item){//array from db
        $book = new Book();
        $book->setId($item['id']);
        $book->setTitle($item['title']);
        $book->setAuthor($item['author']);
        $book->setPages($item['pages']);
        $book->setIsbn($item['ISBN']);
        $book->setProdDate($item['productionDate']);//as saved in db

        return $book;
    }


    private function queryForBooks()//get books from db
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM books');
        $statement->execute();
        $booksArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $booksArray;
    }

    public function getPDO(){

        return $this->pdo;
    }
}