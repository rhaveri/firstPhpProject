<?php


class Container
{

    private $configuration;
    private $bookService;
    private $userService;
    private $pdo;


    public function __construct($configuration)
    {
        $this->configuration = $configuration;
    }

    public function getBookService()
    {

        if ($this->bookService === null) {
            $this->bookService = new BookService($this->getPDO());
        }
        return $this->bookService;
    }

    public function getUserService()
    {
        if ($this->userService === null) {
            $this->userService = new UserService($this->getPDO());
        }
        return $this->userService;
    }

    public function getPDO()
    {

        if ($this->pdo === null) {
            $this->pdo = new PDO($this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_pass']);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;

    }

}