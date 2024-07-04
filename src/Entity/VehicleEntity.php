<?php
namespace Bartelbabay\Tmx\Entity;

abstract class VehicleEntity {

    protected $name = '';
    protected $maxPassCount = 0;
    protected $maxBaggageWeihgt = 0;
    protected $gassQty = 0;
    protected $maxDistance = 0;
    protected $amortKoef = 1;
    protected $gasCost = 0;

    protected $driverClass = 1;
    protected $distanceCost = 0;

    public function getName() {
        if (!$this->name) {
            $className = explode('\\', get_class($this));
            $tmpName = explode('Entity', array_pop($className));
            $this->name = array_shift($tmpName);
        }
        return $this->name;
    }

    public function calculateTotalCost($passCount, $bagWeight, $distance) {
        $driverSalary = $distance * $this->distanceCost * $this->driverClass;
        $totalCost = $driverSalary + ($this->gasCost * $this->gassQty * ($distance / 100));
        return $totalCost;
    }
    
    public function isEligible($passCount, $bagWeight, $distance) {
        return (
            $passCount <= $this->maxPassCount
            && $bagWeight <= $this->maxBaggageWeihgt
            && $distance <= $this->maxDistance
        );
    }
}