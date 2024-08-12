<?php
interface TrafficLightState {
    public function handleRequest();
}

class RedLightState implements TrafficLightState {
    public function handleRequest() {
        echo "Red Light: Stop\n";
        // Transition to Green light after certain conditions
        // $context->setState(new GreenLightState());
    }
}

class GreenLightState implements TrafficLightState {
    public function handleRequest() {
        echo "Green Light: Go\n";
        // Transition to Yellow light after certain conditions
        // $context->setState(new YellowLightState());
    }
}

class YellowLightState implements TrafficLightState {
    public function handleRequest() {
        echo "Yellow Light: Prepare to stop\n";
        // Transition to Red light after certain conditions
        // $context->setState(new RedLightState());
    }
}

class TrafficLight {
    private $state;

    public function __construct(TrafficLightState $state) {
        $this->state = $state;
    }

    public function setState(TrafficLightState $state) {
        $this->state = $state;
    }

    public function request() {
        $this->state->handleRequest();
    }
}

// Usage example
$trafficLight = new TrafficLight(new RedLightState());
$trafficLight->request(); // Output: Red Light: Stop
$trafficLight->setState(new GreenLightState());
$trafficLight->request();


