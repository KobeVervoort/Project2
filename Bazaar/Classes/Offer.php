<?php

namespace Bazaar\Classes;

class Offer
{
    private $title;
    private $description;
    private $startDate;
    private $endDate;
    private $coins;
    private $totalCoins;
    private $placement;
    private $companyID;

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getCoins()
    {
        return $this->coins;
    }

    public function setCoins($coins)
    {
        $this->coins = $coins;
    }

    public function getTotalCoins()
    {
        return $this->totalCoins;
    }

    public function setTotalCoins($totalCoins)
    {
        $this->totalCoins = $totalCoins;
    }

    public function getPlacement()
    {
        return $this->placement;
    }

    public function setPlacement($placement)
    {
        $this->placement = $placement;
    }

    public function getCompanyID()
    {
        return $this->companyID;
    }

    public function setCompanyID($companyID)
    {
        $this->companyID = $companyID;
    }

    public function getOfferData($offerID)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT * FROM offers WHERE id = :offerID');
        $statement->bindValue(':offerID', $offerID);
        $statement->execute();
        $res = $statement->fetch(\PDO::FETCH_ASSOC);

        $this->setTitle($res['title']);
        $this->setDescription($res['description']);
        $this->setStartDate($res['start_date']);
        $this->setEndDate($res['end_date']);
        $this->setCoins($res['coins']);
        $this->setCompanyID($res['company_id']);
    }

    public function getAllOffers()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT * FROM offers ORDER BY start_date');
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function getPromotedOffers()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT * FROM offers WHERE promoted = 1 ORDER BY rand() LIMIT 4');
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    public function getParticipatingOffers($userID)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT * FROM offers_users WHERE user_id = :userID');
        $statement->bindValue(':userID', $userID);
        $statement->execute();

        $res = $statement->fetchAll();
        return $res;
    }

    public function shortenDescription($description)
    {
        if (strlen($description) > 90) {
            $summary = substr($description, 0, 90) . '...';
            return $summary;
        } else {
            return $description;
        }
    }

    public function setOfferData($offerID)
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('SELECT * FROM offers WHERE id = :offerID');
        $statement->bindValue(':offerID', $offerID);
        $statement->execute();
        $res = $statement->fetch(\PDO::FETCH_ASSOC);

        $this->setDescription($res['description']);
        $this->setCoins($res['coins']);
        $this->setEndDate($res['end_date']);
        $this->setStartDate($res['start_date']);
        $this->setTitle($res['title']);
        $this->setCompanyID($res['company_id']);
    }

    public function uploadOffer()
    {
        $conn = Db::getInstance();

        $statement = $conn->prepare('INSERT INTO offers (title, description, start_date, end_date, coins, promoted, company_id, total) VALUES (:title, :description, :startDate, :endDate, :coins, :promoted, :company_id, :totalCoins)');
        $statement->bindValue(':title', $this->getTitle());
        $statement->bindValue(':description', $this->getDescription());
        $statement->bindValue(':startDate', $this->getStartDate());
        $statement->bindValue(':endDate', $this->getEndDate());
        $statement->bindValue(':coins', $this->getCoins());
        $statement->bindValue(':promoted', $this->getPlacement());
        $statement->bindValue(':company_id', $this->getCompanyID());
        $statement->bindValue(':totalCoins', $this->getTotalCoins());

        $statement->execute();
    }
}