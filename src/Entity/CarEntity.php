<?php

namespace Bartelbabay\Tmx\Entity;

class CarEntity extends VehicleEntity {
    //protected $name = 'Bus';
    protected $maxPassCount = 4;
    protected $maxBaggageWeihgt = 400;
    protected $gassQty = 10;
    protected $maxDistance = 500;
    protected $amortKoef = 3;
    
    protected $gasCost = 56;
    protected $driverClass = 2;
    protected $distanceCost = 4.5;
}