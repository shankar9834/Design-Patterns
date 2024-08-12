<?php

interface Pizza
{
    public function getDescription(): string;
    public function getPrice(): float;
}

class BasicPizza implements Pizza
{
    private $size;
    private $price;

    public function __construct(string $size, float $price)
    {
        $this->size = $size;
        $this->price = $price;
    }

    public function getDescription(): string
    {
        return "Basic Pizza - Size: $this->size";
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}

abstract class PizzaDecorator implements Pizza
{
    protected $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public abstract function getDescription(): string;
    public abstract function getPrice(): float;
}

class PepperoniDecorator extends PizzaDecorator
{
    public function getDescription(): string
    {
        return $this->pizza->getDescription() . ", Pepperoni";
    }

    public function getPrice(): float
    {
        return $this->pizza->getPrice() + 2.5; // Add price of pepperoni
    }
}

class MushroomDecorator extends PizzaDecorator
{
    public function getDescription(): string
    {
        return $this->pizza->getDescription() . ", Mushroom";
    }

    public function getPrice(): float
    {
        return $this->pizza->getPrice() + 1.5; // Add price of mushroom
    }
}

class ExtraCheeseDecorator extends PizzaDecorator
{
    public function getDescription(): string
    {
        return $this->pizza->getDescription() . ", Extra Cheese";
    }

    public function getPrice(): float
    {
        return $this->pizza->getPrice() + 1.0; // Add price of extra cheese
    }
}

$basicPizza = new BasicPizza("Medium", 8.0);

$pepperoniPizza = new PepperoniDecorator($basicPizza);
$mushroomPizza = new MushroomDecorator($pepperoniPizza);
$extraCheesePizza = new ExtraCheeseDecorator($mushroomPizza);

echo $extraCheesePizza->getDescription() . " - Price: $" . $extraCheesePizza->getPrice() . PHP_EOL;
// Output: Basic Pizza - Size: Medium, Pepperoni, Mushroom, Extra Cheese - Price: $13.0
