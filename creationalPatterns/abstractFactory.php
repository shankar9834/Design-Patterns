<?php
interface Chair
{
    public function sitOn(): string;
}

interface Sofa
{
    public function sitOn(): string;
    public function lieDown(): string;
}
class ExpensiveChair implements Chair
{
    public function sitOn(): string
    {
        return "Sinking into the plush comfort of an expensive chair.";
    }
}

class LowBudgetChair implements Chair
{
    public function sitOn(): string
    {
        return "Taking a seat on a practical low-budget chair.";
    }
}

class ExpensiveSofa implements Sofa
{
    public function sitOn(): string
    {
        return "Sitting comfortably on a luxurious expensive sofa.";
    }

    public function lieDown(): string
    {
        return "Unwinding on the spacious pull-out bed of an expensive sofa.";
    }
}

class LowBudgetSofa implements Sofa
{
    public function sitOn(): string
    {
        return "Sitting on a comfortable low-budget sofa.";
    }

    public function lieDown(): string
    {
        return "Lying down on a standard low-budget sofa.";
    }
}
interface FurnitureFactory
{
    public function createChair(): Chair;
    public function createSofa(): Sofa;
}

class ExpensiveFurnitureFactory implements FurnitureFactory
{
    public function createChair(): Chair
    {
        return new ExpensiveChair();
    }

    public function createSofa(): Sofa
    {
        return new ExpensiveSofa();
    }
}

class LowBudgetFurnitureFactory implements FurnitureFactory
{
    public function createChair(): Chair
    {
        return new LowBudgetChair();
    }

    public function createSofa(): Sofa
    {
        return new LowBudgetSofa();
    }
}

function getFurnitureFactory(string $choice): FurnitureFactory
{
    if ($choice === "expensive") {
        return new ExpensiveFurnitureFactory();
    } else if ($choice === "low-budget") {
        return new LowBudgetFurnitureFactory();
    } else {
        throw new InvalidArgumentException("Invalid furniture choice: $choice");
    }
}

// Choose between expensive or low-budget furniture
$choice = "expensive"; // Or "low-budget"

$factory = getFurnitureFactory($choice);

$chair = $factory->createChair();
echo $chair->sitOn() . PHP_EOL; // Output based on the chosen factory

$sofa = $factory->createSofa();
echo $sofa->sitOn() . PHP_EOL;
echo $sofa->lieDown() . PHP_EOL; // Output based on the chosen factory
