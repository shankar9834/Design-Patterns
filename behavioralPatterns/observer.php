<?php
interface Subject {
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

interface Observer {
    public function update(string $message);
}

class ConcreteSubject implements Subject {
    private $observers = [];
    private $state;

    public function attach(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            array_splice($this->observers, $index, 1);
        }
    }

    public function setState($state) {
        $this->state = $state;
        $this->notify();
    }

    public function getState() {
        return $this->state;
    }

    public function notify() {
        foreach ($this->observers as $observer) {
            $observer->update($this->getState());
        }
    }
}

class ConcreteObserver implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update(string $message) {
        echo "Observer {$this->name} received message: {$message}\n";
    }
}

// Create Subject
$subject = new ConcreteSubject();

// Create Observers
$observer1 = new ConcreteObserver('Observer 1');
$observer2 = new ConcreteObserver('Observer 2');

// Attach Observers to Subject
$subject->attach($observer1);
$subject->attach($observer2);

// Set State on Subject (this triggers notification to observers)
$subject->setState("New state update!");

// Detach an Observer
$subject->detach($observer2);

// Set State again
$subject->setState("Another update!");
