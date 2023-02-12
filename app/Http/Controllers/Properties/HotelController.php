<?php

namespace App\Http\Controllers\Properties;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use App\Services\Properties\HotelService as EndpointService;
use App\Http\Requests\Properties\HotelRegisterRequest as EndpointRegisterRequest;
use App\Http\Requests\Properties\HotelUpdateRequest as EndpointUpdateRequest;
use App\Http\Resources\Properties\HotelCollection as EndpointCollection;
use App\Http\Resources\Properties\HotelResource as EndpointResource;
use App\Models\Properties\Hotel as EndpointModel;

class HotelController extends Controller
{
    use ApiResponser;

    private $endpointService;
    private $role = 'properties-hotel';
    private $lbMessageStatus = 'hotel(s)';
    private $relations = [];

    public function __construct(){
        $this->endpointService = new EndpointService($this->role, new EndpointModel());
    }

    public function index() {
        try {
            $endpointItems = $this->endpointService->getAll($this->relations);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([
            'endpointItems' => new EndpointCollection($endpointItems),
            'pagination' => ['pages' => $endpointItems->lastPage()],
        ],  'Listagem de '.$this->lbMessageStatus.' realizada com sucesso!');
    }

    public function search($option, $value) {
        try {
            $endpointItems = $this->endpointService->search($option, $value, $this->relations);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([
            'endpointItems' => new EndpointCollection($endpointItems),
            'pagination' => ['pages' => $endpointItems->lastPage()],
        ],  'Listagem de '.$this->lbMessageStatus.' realizada com sucesso!');
    }

    public function store(EndpointRegisterRequest $request) {
        if (isset($request->validator) && $request->validator->fails())
            return $this->verifyValidation($request);

        try {
            $endpointItem = $this->endpointService->create($request);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([
            'endpointItem' => new EndpointResource($endpointItem),
        ],  $this->lbMessageStatus.' cadastrado(a) com sucesso!');
    }

    public function show($id) {
        try{
            $endpointItem = $this->endpointService->find($id, $this->relations);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([
            'endpointItem' => new EndpointResource($endpointItem),
        ],  $this->lbMessageStatus.' selecionada(o) com sucesso!');
    }

    public function update(EndpointUpdateRequest $request, $id) {
        try{
            $endpointItem = $this->endpointService->update($request, $id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([
            'endpointItem' => new EndpointResource($endpointItem),
        ],  $this->lbMessageStatus.' atualizada(o) com sucesso!');
    }

    public function destroy($id) {
        try{
            $endpointItem = $this->endpointService->delete($id);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), $e->getCode());
        }

        return $this->success([
            'endpointItem' => new EndpointResource($endpointItem),
        ],  $this->lbMessageStatus.' deletada(o) com sucesso!');
    }
}
