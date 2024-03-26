<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\IApiResponse;

use Illuminate\Http\Request;

class ApiController extends Controller implements IApiResponse
{
    //
    function responseApi(bool $success, int $status, $data, $error = null){
        $response =  [
            'success' => $success,
            'status' => $status,
            'data' => $data,
        ];
        if(!empty($error)){
            $response['error'] = $error;
        }
        return $response;
    }

}
