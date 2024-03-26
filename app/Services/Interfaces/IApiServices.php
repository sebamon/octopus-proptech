<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface IApiServices
{
    /**
     * Obtiene un listado del modelo a buscar, acepta $criteria = [campo => valor], para filtrar
     * @param array $criteria Filtros de busqueda
     * @return array 
     */
    public function index($criteria) ;
    /**
     * Obtiene el detalle completo de un elemento
     * @param $id Identificador del elemento.
     * @return Model 
     */
    public function find($id) : Model;
    public function create($data);
    public function update($id,$data);

}
