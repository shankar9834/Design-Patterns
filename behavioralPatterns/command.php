<?php
interface Command {
    public function execute(): void;
}

class ConcreteCommand implements Command {
    private $receiver;

    public function __construct(Receiver $receiver) {
        $this->receiver = $receiver;
    }

    public function execute(): void {
        $this->receiver->action();
    }
}

class Receiver {
    public function action(): void {
        echo "Receiver is performing action.\n";
    }
}

class Invoker {
    private $command;

    public function setCommand(Command $command): void {
        $this->command = $command;
    }

    public function executeCommand(): void {
        $this->command->execute();
    }
}

$receiver = new Receiver();
$command = new ConcreteCommand($receiver);

$invoker = new Invoker();
$invoker->setCommand($command);
$invoker->executeCommand(); // Outputs: "Receiver is performing action."

