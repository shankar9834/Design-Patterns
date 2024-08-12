<?php
class Car
{

   private static $instance;
   private static $count = 1;
   private function __construct()
   {
      echo "Instance created " . self::$count . " times\n";
      self::$count++;
   }

   public static function getInstance()
   {
      if (self::$instance == null) {
         self::$instance = new self();
      } else {
         echo "instance is already created\n";
      }
      return self::$instance;
   }
}

$car1 = Car::getInstance();
$car2 = Car::getInstance();
