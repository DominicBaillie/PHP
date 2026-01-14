<?php
// Probalbe unnecessary, but included the strict types
declare(strict_types=1);

// Basic car class
class Car 
{
    // Public variable declarations
    public $make;
    public $model;
    public $year; 

    public function construct($make, $model, $year) 
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