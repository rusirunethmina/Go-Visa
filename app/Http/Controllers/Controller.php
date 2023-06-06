<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     /**
     * common json reponse
     * @param $type
     * @param $message
     * @param $data
     * @param $code
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($type, $message, $data, $code)
    {
        return response()->json(['type' => $type, 'message' => $message, 'data' => $data], $code);
    }
}
