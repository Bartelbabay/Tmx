<?php
use Bartelbabay\Tmx\Entity\BicycleEntity;
use Bartelbabay\Tmx\Entity\BusEntity;
use Bartelbabay\Tmx\Entity\CarEntity;
require 'vendor/autoload.php';

unset($argv[0]);

$params = [];

foreach ($argv as $argument) {
    preg_match('/^-(.+)=(.+)$/', $argument, $matches);
    if (!empty($matches)) {
        $paramName = $matches[1];
        $paramValue = $matches[2];

        $params[$paramName] = $paramValue;
    }
}

try {

    //MOCK the Repository (Factory) for using as DI
    $repo = new Bartelbabay\Tmx\Repository\AutoparkRepository();
    $repo->registerVehicle(new BusEntity());
    $repo->registerVehicle(new CarEntity());
    $repo->registerVehicle(new BicycleEntity());

    $calculator = new Bartelbabay\Tmx\Calculator($params, $repo);
    foreach($calculator->getVariants() as $variant) {
        echo('Name: ' . $variant->getName() . ', Cost:' . $variant->calculateTotalCost((int) $params['pass_count'], (int) $params['baggage_weight'], (int) $params['distance']) . PHP_EOL);
    }
} catch (Bartelbabay\Tmx\Exception\InvalidArgumentException $e) {
    echo('Missed argrument(s): ' . $e);
}
