<?php

abstract class Vehicle
{
    protected $speed;
    protected $type;

    public function __construct($speed = null, $type = null)
    {
        $this->speed = $speed;
        $this->type = $type;
    }

    abstract public function getSpeed();
    abstract public function getType();
}

class Car extends Vehicle
{

    public function __construct($speed, $type = null)
    {
        $this->speed = $speed;
        $this->type = $type;
    }
    public function getSpeed()
    {
        echo "Speed of the car is " . $this->speed . "\n";
    }

    public function getType()
    {
        echo "Type of this vehicle is " . $this->type . "\n";
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class Truck extends Vehicle
{

    public function __construct($speed, $type = null)
    {
        $this->speed = $speed;
        $this->type = $type;
    }
    public function getSpeed()
    {
        echo "Speed of the truck is " . $this->speed . "\n";
    }

    public function getType()
    {
        echo "Type of this vehicle is " . $this->type . "\n>";
    }

    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}

class VehicleFactory
{
    public static function createVehicle($type, $speed = null)
    {
        switch ($type) {
            case 'car':
                return new Car($speed, 'Car');
            case 'truck':
                return new Truck($speed, 'Truck');
            default:
                throw new Exception("Invalid vehicle type");
        }
    }
}

// Example usage
try {
    $car = VehicleFactory::createVehicle('car', 120);
    $car->getSpeed();
    $car->getType();

    $truck = VehicleFactory::createVehicle('truck', 80);
    $truck->getSpeed();
    $truck->getType();
} catch (Exception $e) {
    echo $e->getMessage();
}
