<?php

namespace Bazaar\Classes;

class Offer
{
    private $title;
    private $description;
    private $startDate;
    private $endDate;
    private $coins;

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

    public function shortenDescription($description)
    {
        if (strlen($description) > 90) {
            $summary = substr($description, 0, 90) . '...';
            return $summary;
        } else {
            return $description;
        }
    }
}