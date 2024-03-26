<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\Interfaces\IServiceService;

class ServicesController extends ApiController
{

    private IServiceService $servicesServices;

    public function __construct(IServiceService $servicesServices){
        $this->servicesServices = $servicesServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryParams = $request->all();

        $attributes = $this->servicesServices->getInputRequired();
        $criteria = array_intersect_key($queryParams,array_flip($attributes));

        $services = $this->servicesServices->index($criteria);

        return view('services',compact('services'));
        // return $this->responseApi(true,200,$services);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $service_id)
    {
        $service = $this->servicesServices->find($service_id);
        if(empty($service)){
            return $this->responseApi(false, 404,null,'Service not found');

        }
        return $this->responseApi(true,200,$service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
