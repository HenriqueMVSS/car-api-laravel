<?php

namespace App\Services\Car;

use App\Models\Car\Car;
use App\Services\BaseService;


class CarService extends BaseService
{
    public function __construct(Car $model)
    {
        parent::__construct($model);
    }

}
