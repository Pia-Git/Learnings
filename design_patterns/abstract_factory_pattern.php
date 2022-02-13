<?php

interface Chair
{
    public function hasLegs(): string;
}

class VictorianChair implements Chair
{
    public function hasLegs(): string
    {
        return "Chair has 4 legs";
    }
}

class ModernChair implements Chair
{
    public function hasLegs(): string
    {
        return "Chair has 3 legs";
    }
}

interface Sofa
{
    public function isExtractable(): string;
}

class VictorianSofa implements Sofa
{
    public function isExtractable(): string
    {
        return "Sofa is not extractable";
    }
}

class ModernSofa implements Sofa
{
    public function isExtractable(): string
    {
        return "Sofa is extractable";
    }
}

interface FurnitureFactory
{
    public function createChair(): Chair;

    public function createSofa(): Sofa;
}

class VictorianFurnitureFactory implements FurnitureFactory
{
    public function createChair(): Chair
    {
        return new VictorianChair();
    }

    public function createSofa(): Sofa
    {
        return new VictorianSofa();
    }
}

class ModernFurnitureFactory implements FurnitureFactory
{
    public function createChair(): Chair
    {
        return new ModernChair();
    }

    public function createSofa(): Sofa
    {
        return new ModernSofa();
    }
}

function clientCode(FurnitureFactory $furniture): void
{
    $chair = $furniture->createChair();
    echo $chair->hasLegs();
    echo "\r\n";
    $sofa = $furniture->createSofa();
    echo $sofa->isExtractable();
}

echo "Client uses VictorianFurnitureFactory";
echo "\r\n";
clientCode(new VictorianFurnitureFactory());

echo "\n\n";

echo "Client uses ModernFurnitureFactory";
echo "\r\n";
clientCode(new ModernFurnitureFactory());
