<?php

interface Shape
{
    public function draw(float $x, float $y): void;
}

class Circle implements Shape
{
    private $color; // Intrinsic state (shared)

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function draw(float $x, float $y): void
    {
        echo "Drawing a $this->color circle at ($x, $y)" . PHP_EOL;
    }
}

class ShapeFactory
{
    private $circles = [];

    public function getCircle(string $color): Shape
    {
        if (!isset($this->circles[$color])) {
            $this->circles[$color] = new Circle($color);
        }
        return $this->circles[$color];
    }
}

$factory = new ShapeFactory();

$redCircle = $factory->getCircle("red");
$redCircle->draw(10, 20); // Drawing a red circle at (10, 20)

$blueCircle = $factory->getCircle("blue");
$blueCircle->draw(50, 30); // Drawing a blue circle at (50, 30)

// Notice that only two Circle objects were created (red and blue),
// even though we drew circles with different positions.
