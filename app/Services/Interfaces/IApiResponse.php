<?php

namespace App\Services\Interfaces;

interface IApiResponse
{    
   //
    public function responseApi(bool $success, int $status, $data, $error = null);
}
