<?php
namespace Bartelbabay\Tmx\Repository;

use Bartelbabay\Tmx\Entity\VehicleEntity;
use Bartelbabay\Tmx\Entity\BusEntity;
use Bartelbabay\Tmx\Entity\BicycleEntity;
use Bartelbabay\Tmx\Entity\CarEntity;

class AutoparkRepository {

    private $vehicles = [];

    public function registerVehicle(VehicleEntity $entity) {
        array_push($this->vehicles, $entity);
        return $this;
    }

    public function getEligibleVehicle ($params) {
        $eligibles = [];
        /** @var $vehicle VehicleEntity */
        foreach ($this->vehicles as $vehicle) {
            if ($vehicle->isEligible($params['pass_count'], $params['baggage_weight'], $params['distance'])) {
                array_push($eligibles, $vehicle);
            }
        }
        return $eligibles;
    }
}