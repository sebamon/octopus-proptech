<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Services\Interfaces\IServiceService;

class ServiceService implements IServiceService
{
    
    private $modelClass;

    public function __construct(Service $modelClass)
    {
        $this->modelClass = $modelClass;
        //
    }
    function index($criteria){
        $query = $this->modelClass;

        foreach($criteria as $key => $value){
            if(!is_numeric($value)){
                $query = $query->where($key,'ILIKE','%'.$value.'%');
            }else{
                $query = $query->where($key,$value);
            }
        }
        return $query->get();

    }
    function find($id): Model{
       return $this->modelClass::find($id);
    }
    function create($data){

    }
    function update($id, $data){

    }
    public function getInputRequired(){
        return $this->modelClass->getFillable();
    }
   

}