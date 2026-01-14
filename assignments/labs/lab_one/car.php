<?php
declare(strict_types=1);


class Car 
{
    public $make;
    public $model;
    public $year; 

    public function __construct($make, $model, $year) 
    {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    public function getDescription()
    {
        return $this->year . ' ' . $this->make . ' ' . $this->model;
    }
} 