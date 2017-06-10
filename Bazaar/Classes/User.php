<?php

namespace Bazaar\Classes;


class User
{
    private $userID;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $avatar;
    private $birthday;

    public function getUserID()
    {
        return $this->userID;
    }

    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

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

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
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

        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email;");
        $statement->bindValue(":email", $this->getEmail());
        $statement->execute();
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function register()
    {
        $conn = Db::getInstance();

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
    }

    public function login()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT id FROM users where email = :email');
        $statement->bindValue(':email', $this->getEmail(), $conn::PARAM_STR);
        $statement->execute();

        $res = $statement->fetch();
        $userid = $res['id'];

        return $userid;
    }

    public function canLogin()
    {
        // connection with database
        $conn = Db::getInstance();

        //get user & password from database
        $statement = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $statement->bindValue(':email', $this->getEmail());
        $statement->execute();

        if ($statement->rowCount()== 1) {
            $row = $statement->fetch();

            if (password_verify($this->getPassword(), $row['password'])) {
                return true;
            } else {
                // no match with password
                return false;
            }
        } else {
            // email not found
            return false;
        }
    }

    public function setReward($offerID)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM offers_users WHERE user_id = :userID AND offer_id = :offerID");
        $statement->bindValue(':userID', $this->getUserID());
        $statement->bindValue(':offerID', $offerID);
        $statement->execute();

        if ($statement->rowCount() == 1){
            $statement = $conn->prepare("UPDATE offers_users SET earnings = earnings + 1 WHERE user_id = :userID AND offer_id = :offerID");
            $statement->bindValue(':userID', $this->getUserID());
            $statement->bindValue(':offerID', $offerID);
            $statement->execute();
            return true;
        } else {
            $statement = $conn->prepare("INSERT INTO offers_users (offer_id, user_id, earnings) VALUES (:offerID, :userID, :earnings)");
            $statement->bindValue(':userID', $this->getUserID());
            $statement->bindValue(':offerID', $offerID);
            $statement->bindValue(':earnings', 1);
            $statement->execute();
            return true;
        }
    }

    public function isParticipating($offerID)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM offers_users WHERE user_id = :userID AND offer_id = :offerID");
        $statement->bindValue(':userID', $this->getUserID());
        $statement->bindValue(':offerID', $offerID);
        $statement->execute();

        if ($statement->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function getRewards($offerID)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare("SELECT * FROM offers_users WHERE user_id = :userID AND offer_id = :offerID");
        $statement->bindValue(':userID', $this->getUserID());
        $statement->bindValue(':offerID', $offerID);
        $statement->execute();

        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function getUserData($userid)
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("SELECT * FROM users WHERE id = :userid");
        $statement->bindValue(':userid', $userid);
        $statement->execute();
        $res = $statement->fetch(\PDO::FETCH_ASSOC);

        $this->setUserID($userid);
        $this->setEmail($res['email']);
        $this->setFirstname($res['first_name']);
        $this->setLastname($res['last_name']);
        $this->setPassword($res['password']);
        $this->setAvatar($res['avatar']);
    }

}





















