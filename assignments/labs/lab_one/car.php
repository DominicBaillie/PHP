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

    // Constructor seems to need __ which is odd (coming from c# at least)
    public function __construct($make, $model, $year) 
    {
        // Assigning class variables, this-> rather than c# this. is weird
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }
    public function getDescription()
    {
        // Just returning it
        return $this->year . ' ' . $this->make . ' ' . $this->model;
        /*
           Better method ->
        
                return "Make : {$this->make} | Model : ($this-> $model) | Year: {$this-> year}}"
        */
    }
} 