<?php
namespace Bazaar\Classes;


class Company
{
    private $email;
    private $password;
    private $companyname;
    private $vatNumber;
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

    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;
    }
}