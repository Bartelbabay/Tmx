<?php
namespace Bartelbabay\Tmx;

use Bartelbabay\Tmx\Exception\InvalidArgumentException;
use Bartelbabay\Tmx\Repository\AutoparkRepository;

class Calculator {

    const REQUIRED_PARAMS = ['pass_count', 'baggage_weight', 'distance'];

    private AutoparkRepository $repository;

    private $params = [];

    public function __construct($params, AutoparkRepository $repository = new AutoparkRepository()) {
        $this->params = $params;
        $this->repository = $repository;
    }

    protected function checkParams () {
        $missedParams = array_diff(self::REQUIRED_PARAMS, array_keys($this->params));
        if (!empty($missedParams)) {
            throw new InvalidArgumentException($missedParams);
        }
    }

    public function getVariants() {
        $this->checkParams();
        return $this->repository->getEligibleVehicle($this->params);
    }
}