<?php
// Mediator interface
interface Mediator {
    public function sendMessage(string $message, Colleague $colleague);
}

// Concrete Mediator
class ChatRoom implements Mediator {
    public function sendMessage(string $message, Colleague $colleague) {
        echo "[" . date('Y-m-d H:i:s') . "] {$colleague->getName()}: $message\n";
    }
}

// Colleague interface
interface Colleague {
    public function send(string $message);
    public function receive(string $message);
    public function getName(): string;
}

// Concrete Colleague
class User implements Colleague {
    private $name;
    private $mediator;

    public function __construct(string $name, Mediator $mediator) {
        $this->name = $name;
        $this->mediator = $mediator;
    }

    public function send(string $message) {
        echo "{$this->name} sends message: $message\n";
        $this->mediator->sendMessage($message, $this);
    }

    public function receive(string $message) {
        echo "{$this->name} received message: $message\n";
    }

    public function getName(): string {
        return $this->name;
    }
}

// Usage example
$chatRoom = new ChatRoom();

$user1 = new User("Alice", $chatRoom);
$user2 = new User("Bob", $chatRoom);

$user1->send("Hello, Bob!");
$user2->send("Hi, Alice!");

