<?php

namespace App\Services\Properties;

use App\Services\AbstractService;

class HouseService extends AbstractService {
    private $role;
    private $model;

    public function __construct($role, $model){
        parent::__construct($role, $model);
        $this->role = $role;
        $this->model = $model;
    }
    
    public function listPublic($relations = [], $request){
        $dataFilter = $request->query();
        $result = $this->model->with($relations);
        foreach($dataFilter as $key => $item){
            if($item != null){
                $operation = $this->verifyOperation($key);
                $key = str_replace(['max_', 'min_'],'', $key);
                $result = $result->where($key, $operation, $item);
            }
        }
        return $result->paginate(20);
    }

    public function searchPublic($id, $relations = []){
        return $this->model->with($relations)->findOrFail($id);
    }

    public function findPublic($option, $value, $relations = []) {
        $objectsSelected = $this->model->with($relations)->where($option,'LIKE',"%{$value}%")->paginate(20);
        return $objectsSelected;
    }

    public function verifyOperation($key){
        $operation = '';
        if($key == 'type_residence') $operation = '=';
        if($key == 'city') $operation = '=';
        if($key == 'state') $operation = '=';
        if($key == 'min_price') $operation = '>=';
        if($key == 'max_price') $operation = '<=';
        if($key == 'min_area') $operation = '>=';
        if($key == 'max_area') $operation = '<=';
        if($key == 'type_residence') $operation = '=';
        if($key == 'type_payment') $operation = '=';
        if($key == 'min_quantity_pool') $operation = '>=';
        if($key == 'max_quantity_pool') $operation = '<=';
        if($key == 'min_quantity_bedroom') $operation = '>=';
        if($key == 'max_quantity_bedroom') $operation = '<=';
        if($key == 'min_quantity_bathrooms') $operation = '>=';
        if($key == 'max_quantity_bathrooms') $operation = '<=';
        if($key == 'min_quantity_suites') $operation = '>=';
        if($key == 'max_quantity_suites') $operation = '<=';
        if($key == 'min_quantity_garage') $operation = '>=';
        if($key == 'max_quantity_garage') $operation = '<=';
        if($key == 'contain_view_from_sea') $operation = '=';
        if($key == 'contain_furnished') $operation = '=';
        if($key == 'contain_laundry') $operation = '=';
        if($key == 'contain_backyard') $operation = '=';
        if($key == 'contain_air_conditioner') $operation = '=';
        return $operation;
    }

}