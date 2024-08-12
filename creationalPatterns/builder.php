<?php

class Pizza
{
    public $size;
    public $isVeg;
    public $type;

    public function __construct($size, $isVeg, $type)
    {
        $this->size = $size;
        $this->isVeg = $isVeg;
        $this->type = $type;
    }

    public static function builder(): PizzaBuilder
    {
        return new PizzaBuilder();
    }

    public function __toString()
    {
        $pizzaType = $this->isVeg ? "Vegetarian" : "Non-Vegetarian";
        return "Pizza: Size - $this->size, Type - $pizzaType, Toppings - $this->type";
    }
}

class PizzaBuilder
{
    private $size;
    private $isVeg;
    private $type;

    public function setSize(string $size): PizzaBuilder
    {
        $this->size = $size;
        return $this;
    }

    public function setVeg(bool $isVeg): PizzaBuilder
    {
        $this->isVeg = $isVeg;
        return $this;
    }

    public function setType(string $type): PizzaBuilder
    {
        $this->type = $type;
        return $this;
    }

    public function build(): Pizza
    {
        // Validate properties before building (optional)
        return new Pizza($this->size, $this->isVeg, $this->type);
    }
}

// Usage examples
$pizza1 = Pizza::builder()
    ->setSize("Large")
    ->setVeg(true)
    ->setType("Margherita")
    ->build();

echo $pizza1 . PHP_EOL; // Output: Pizza: Size - Large, Type - Vegetarian, Toppings - Margherita

$pizza2 = Pizza::builder()
    ->setSize("Medium")
    ->setVeg(false)
    ->setType("Pepperoni")
    ->build();

echo $pizza2 . PHP_EOL; // Output: Pizza: Size - Medium, Type - Non-Vegetarian, Toppings - Pepperoni
