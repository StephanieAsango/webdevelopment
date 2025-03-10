<?php

// Inheritance
// Inheritance allows a class to inherit properties and methods from another class

// Parent class(base class)

class Vehicle{
    protected $make;
    protected $model;
    protected $year;
    protected $fuelLevel = 100;

    public function __construct($make, $model, $year){
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    public function getMakeModel(){
        return "{$this->year} {$this->make} {$this->model}";
    }

    public function drive($distance){
        $this ->fuelLevel -= $distance *0.1; //Simplified fuel consumption
        return "Drove {$distance} miles. Fuel remaining:{$this ->fuelLevel}%";
    }
}

// Child class (inherits from vehicle)
class car extends Vehicle{
    private $numDoors;

    // Note how the child constructor calls the parent
    public function __construct($make, $model, $year, $numDoors){
        parent::__construct($make, $model, $year);
        $this->numDoors = $numDoors;
    }
    // /Additional method specific to cars
    public function honk(){
        return "Beep, beep";
    }

    // Override the parent's drive method
    public function drive($distance){
        $this->fuelLevel -= $distance *0.05; //Cars are more fuel efficient
        return "Car drove {$distance} miles . Fuel remaining:{$this ->fuelLevel}%";
    }
}

//Another child class
class Truck extends Vehicle{
    private $caroCapacity;
    public function __construct($make, $model, $year, $caroCapacity){
        parent::__construct($make, $model, $year);
        $this->cargoCapacity = $caroCapacity;
    }

    public function loadCargo($amount){
        return "{$amount} lbs of cargo . Capacity:{$this->cargoCapacity}";
    }

    // Override the parent's drive 
    public function drive($distance){
        $this->fuelLevel -= $distance *0.15; //trucks use more fuel 
        return "Truck drove {$distance} miles . Fuel remaining:{$this ->fuelLevel}%";
    }


}
$car = new car("Toyota","corolla",2020, 4);
echo $car->getMakeModel() ."<br>"; //From the parent class - Output 2020 Toyota corolla
echo $car->honk() ."<br>"; //from child class - Output beep! beep!
echo $car->drive(10) ."<br>"; //Override method Car drove 10 miles . Fuel remaining:99.5%

$truck =new Truck("Isuzu","AshokLeyland" ,2024, 2000);
echo $truck->getMakeModel() ."<br>"; //From the parent class - Output 2024 Isuzu AshokLeyland
echo $truck->loadCargo(1500) ."<br>"; //From the parent  - 1500 lbs of cargo . Capacity:2000
echo $truck->drive(10) ."<br>"; //Override method Car drove 10 miles . Fuel remaining:98.5%

/**
 * Key inheritance properties
 * -Child classes inherit all non-private properties and methods from parent
 * -Child classes can add their own properties and methods
 * -child classes can override parent mehods to change behaviour
 * -The 'parent::' keyword access the parent class methods
 * -A class can only extend one parent class(single inheritance) 
 */