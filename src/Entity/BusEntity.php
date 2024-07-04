<?php

namespace Bartelbabay\Tmx\Entity;

class BusEntity extends VehicleEntity {

    protected $name = 'Bus';
    protected $maxPassCount = 32;
    protected $maxBaggageWeihgt = 300;
    protected $gassQty = 20;
    protected $maxDistance = 200;
    protected $amortKoef = 2;
    
    protected $gasCost = 45;
    protected $driverClass = 1;
    protected $distanceCost = 2;
}