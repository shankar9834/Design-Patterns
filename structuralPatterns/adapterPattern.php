<?php

interface SoundMaker {
  public function makeSound(): string;
}

class Bird {
  public function sing(): string {
    return "Chirp chirp!";
  }
}

class Robot {
  public function makeSound(): string {
    return "Beep boop!";
  }
}

class BirdAdapter implements SoundMaker {
  private $bird;

  public function __construct(Bird $bird) {
    $this->bird = $bird;
  }

  public function makeSound(): string {
    return $this->bird->sing();
  }
}

class RobotAdapter implements SoundMaker {
  private $robot;

  public function __construct(Robot $robot) {
    $this->robot = $robot;
  }

  public function makeSound(): string {
    return $this->robot->makeSound();
  }
}

function playSound(SoundMaker $soundMaker) {
  echo $soundMaker->makeSound() . PHP_EOL;
}

$bird = new Bird();
$robot = new Robot();

$birdAdapter = new BirdAdapter($bird);
$robotAdapter = new RobotAdapter($robot);

playSound($birdAdapter); // Output: Chirp chirp!
playSound($robotAdapter); // Output: Beep boop!
