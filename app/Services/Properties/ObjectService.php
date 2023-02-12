<?php

namespace App\Services\Properties;

use App\Services\AbstractService;

class ObjectService extends AbstractService {
    private $role;
    private $model;

    public function __construct($role, $model){
        parent::__construct($role, $model);
        $this->role = $role;
        $this->model = $model;
    }
}