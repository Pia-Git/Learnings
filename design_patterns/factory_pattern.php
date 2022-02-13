<?php

class Automobile
{
    private string $label;
    private string $model;

    public function __construct(string $label, string $model)
    {
        $this->label = $label;
        $this->model = $model;
    }

    public function getLabelAndModel(): string
    {
        return $this->label.' '.$this->model;
    }
}

class AutomobileFactory
{
    public static function create(string $label, string $model): Automobile
    {
        return new Automobile($label, $model);
    }
}

// have the factory create the Automobile object
$veyron = AutomobileFactory::create('Bugatti', 'Veyron');

print_r($veyron->getLabelAndModel()); // outputs "Bugatti Veyron"
