<?php
namespace Bazaar\Classes;


class Company extends User
{
    private $companyname;
    private $address;
    private $city;

    public function getCompanyname()
    {
        return $this->companyname;
    }

    public function setCompanyname($companyname)
    {
        $this->companyname = $companyname;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function companyExists()
    {
        $conn = Db::getInstance();

        $statementCheck = $conn->prepare("SELECT * FROM companies WHERE email = :email;");
        $statementCheck->bindValue(":email", $this->getEmail());
        $statementCheck->execute();
        $row = $statementCheck->fetch(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function registerCompany()
    {
        $conn = Db::getInstance();

        $options = [
            'cost' => 12
        ];

        $hashedpassword = password_hash($this->getPassword(), PASSWORD_DEFAULT, $options);
        $statement = $conn->prepare("INSERT INTO companies (company_name, email, password, address, city) VALUES (:companyname, :email, :password, :address, :city)");
        $statement->bindValue(':companyname', $this->getCompanyname());
        $statement->bindValue(':email', $this->getEmail());
        $statement->bindValue(':password', $hashedpassword);
        $statement->bindValue(':address', $this->getAddress());
        $statement->bindValue(':city', $this->getCity());

        $statement->execute();
    }

    public function loginCompany()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT id FROM companies where email = :email');
        $statement->bindValue(':email', $this->getEmail(), $conn::PARAM_STR);
        $statement->execute();

        $res = $statement->fetch();
        $companyID = $res['id'];

        return $companyID;
    }

    public function canLoginCompany()
    {
        // connection with database
        $conn = Db::getInstance();

        //get user & password from database
        $statement = $conn->prepare("SELECT * FROM companies WHERE email = :email");
        $statement->bindValue(':email', $this->getEmail());
        $statement->execute();

        if ($statement->rowCount() == 1) {
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
}