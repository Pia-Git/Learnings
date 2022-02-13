<?php

interface Transport
{
    public function deliver(): string;
}

class Truck implements Transport
{
    public function deliver(): string
    {
        return 'Truck is delivering';
    }
}

class Ship implements Transport
{
    public function deliver(): string
    {
        return 'Ship is delivering';
    }
}

// factory class
abstract class Logistics
{
    // factory method
    abstract public function createTransport(): Transport;

    public function planDelivery(): string
    {
        $transport = $this->createTransport();

        return $transport->deliver();
    }
}

class RoadLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Truck();
    }
}

class SeaLogistics extends Logistics
{
    public function createTransport(): Transport
    {
        return new Ship();
    }
}

function clientCode(Logistics $logistics): void
{
    echo $logistics->planDelivery();
}

echo 'Client uses RoadLogistics';
echo "\r\n";
clientCode(new RoadLogistics());

echo "\n\n";

echo 'Client uses SeaLogistics';
echo "\r\n";
clientCode(new SeaLogistics());
