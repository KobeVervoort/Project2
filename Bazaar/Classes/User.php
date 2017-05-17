<?php

namespace Bazaar\Classes;


class User
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $address;
    private $postalCode;
    private $birthday;

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function userExists()
    {
        $conn = Db::getInstance();

        $statementCheck = $conn->prepare("SELECT * FROM users WHERE email = :email;");
        $statementCheck->bindValue(":email", $this->getEmail());
        $statementCheck->execute();
        $row = $statementCheck->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function register()
    {
        $conn = Db::getInstance();

        if (!$this->userExists()){
            $options = [
                'cost' => 12
            ];

            $hashedpassword = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);
            $statement = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $statement->bindValue(':firstname', $this->getFirstname());
            $statement->bindValue(':lastname', $this->getLastname());
            $statement->bindValue(':email', $this->getEmail());
            $statement->bindValue(':password', $hashedpassword);

            $statement->execute();
        } else {
            throw new \Exception('This ');
        }
    }

}





















