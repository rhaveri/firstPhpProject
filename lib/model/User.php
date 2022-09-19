<?php

class User
{
    private $id;
    private $name;
    private $username;
    private $email;
    private $password;
    private $repeatPassword;


    public function sayHello()
    {
        echo 'Hello!';
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {

        return $this->name;
    }


    public function setName($name)
    {
//        if ((empty($name)))
//            throw new Exception('invalid');

        $this->name = $name;
    }


    public function getUsername()
    {
        return $this->username;
    }


    public function setUsername($username)
    {
//        if ((empty($username) || !preg_match("/^[a-yA-Z0-9]*$/", $this->username)))
//            throw new Exception('invalid');
        $this->username = $username;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email)
    {
//        if ((empty($email) || !(filter_var($this->email, FILTER_VALIDATE_EMAIL))))
//            throw new Exception('invalid');
        $this->email = $email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setPassword($password)
    {
//        if ((empty($password)))
//            throw new Exception('invalid');
        $this->password = $password;
    }


    public function getRepeatPassword()
    {
        return $this->repeatPassword;
    }


    public function setRepeatPassword($repeatPassword)
    {
//        if ((empty($repeatPassword)))
//            throw new Exception('invalid');
        $this->repeatPassword = $repeatPassword;
    }


    public function getUserData()
    {
        return sprintf(
            '%s (name:%s, username:%s, email:%s)',
            $this->name,
            $this->username,
            $this->email
        );
    }

    public function __toString()
    {
        return $this->getName();
    }


}