<?php

namespace App\Services;
use App\Services\Interfaces\IApiResponse;

class ApiResponseService implements IApiResponse
{
    public function __construct()
    {
        //
    }
    public function responseApi(bool $success, int $status, $data, $error = null){
   
    }
}
