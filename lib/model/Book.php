<?php

class Book
{

    private $id;
    private $title;
    private $author;
    private $pages;
    private $isbn;
    private $prodDate;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }


    public function setAuthor($author)
    {
        $this->author = $author;
    }


    public function getPages()
    {
        return $this->pages;
    }


    public function setPages($pages)
    {
        $this->pages = $pages;
    }


    public function getIsbn()
    {
        return $this->isbn;
    }


    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }


    public function getProdDate()
    {
        return $this->prodDate;
    }


    public function setProdDate($prodDate)
    {
        $this->prodDate = $prodDate;
    }



}