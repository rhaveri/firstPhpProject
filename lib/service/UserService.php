<?php


class UserService
{
    private $pdo;


    public function __construct(PDO $pdo){
        $this->pdo= $pdo;
    }

    public function getUsers()
    {
        $usersArray = $this->queryForUsers();
        $users = array();
        foreach ($usersArray as $item) {
            $users[$item['id']] = $this->createUser($item);
        }
        return $users;
    }

    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM user where id = :id');
        $statement->execute(array('id' => $id));
        $userArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$userArray) {
            return null;
        }

        return $this->createUser($userArray);
    }

    public function updateUser($id, $name, $username,$email){

        $pdo = $this->getPDO();

        $statement = $pdo->prepare('UPDATE user SET name =:name, username=:username, email=:email WHERE id= :id');
        $statement->bindParam('id',$id);
        $statement->bindParam('name',$name);
        $statement->bindParam('username',$username);
        $statement->bindParam('email',$email);

        $statement->execute();
        header("Location: index.php");
    }

    public function deleteUser($id){
        $pdo = $this->pdo;
        $stmt = $pdo->prepare("DELETE FROM user WHERE id= :id");
        $stmt->bindParam('id',$id);
        $stmt->execute();
        header('Location:index.php');

    }


    public function createUser(array $item)
    {//array from db
        $user = new User();
        $user->setId($item['id']);
        $user->setName($item['name']);
        $user->setUsername($item['username']);
        $user->setEmail($item['email']);
        $user->setPassword($item['password']);

        return $user;
    }

    private function queryForUsers()//get users from db
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM user');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getPDO()
    {

        if ($this->pdo === null) {
            //create new pdo object
            $pdo = new PDO('mysql:host=localhost;dbname=rei', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo; //assign this to the pdo property
        }
        return $this->pdo;
    }


    public function log_in(){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $query = 'SELECT * FROM user WHERE email= :email and password = :password';
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam('email',$email);
        $stmt->bindParam('password', $password);
        $stmt->execute();

    }

    public function register_person()
    {

        $name = $_REQUEST['name'];
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $query = 'INSERT INTO user (name, username, email, password) VALUES (?,?,?,?)';


        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$name, $username, $email,$password]);
    }


}
