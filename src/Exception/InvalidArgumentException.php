<?php

namespace Bartelbabay\Tmx\Exception;

class InvalidArgumentException extends \Exception {

    private $params = [];

    public function __construct($params) {
        $this->params = $params;
    }

    public function __toString(): String {
        return implode(', ', $this->params);
    }
}