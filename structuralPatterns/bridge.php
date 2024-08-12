<?php
// Abstraction
abstract class RemoteControl
{
    protected $device;

    public function __construct(Device $device)
    {
        $this->device = $device;
    }

    abstract public function turnOn();
    abstract public function turnOff();
    abstract public function setChannel($channel);
}


// Refined Abstraction: TV Remote Control
class TvRemoteControl extends RemoteControl
{
    public function turnOn()
    {
        $this->device->turnOn();
    }

    public function turnOff()
    {
        $this->device->turnOff();
    }

    public function setChannel($channel)
    {
        $this->device->setChannel($channel);
    }
}

// Refined Abstraction: Radio Remote Control
class RadioRemoteControl extends RemoteControl
{
    public function turnOn()
    {
        $this->device->turnOn();
    }

    public function turnOff()
    {
        $this->device->turnOff();
    }

    public function setChannel($channel)
    {
        // Radio doesn't have channels, so we do nothing here
    }
}

// Implementor Interface
interface Device
{
    public function turnOn();
    public function turnOff();
    public function setChannel($channel);
}

// Concrete Implementor: TV
class Tv implements Device
{
    public function turnOn()
    {
        echo "TV is turned on\n";
    }

    public function turnOff()
    {
        echo "TV is turned off\n";
    }

    public function setChannel($channel)
    {
        echo "Setting TV channel to " . $channel . "\n";
    }
}

// Concrete Implementor: Radio
class Radio implements Device
{
    public function turnOn()
    {
        echo "Radio is turned on\n";
    }

    public function turnOff()
    {
        echo "Radio is turned off\n";
    }

    public function setChannel($channel)
    {
        // Radio doesn't have channels, so we do nothing here
    }
}

// Using TV Remote Control
$tv = new Tv();
$tvRemote = new TvRemoteControl($tv);

$tvRemote->turnOn();
$tvRemote->setChannel(5);
$tvRemote->turnOff();

echo "\n";

// Using Radio Remote Control
$radio = new Radio();
$radioRemote = new RadioRemoteControl($radio);

$radioRemote->turnOn();
$radioRemote->turnOff();
