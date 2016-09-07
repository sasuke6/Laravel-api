<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{
    //

    protected $statusCode = 200;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;

    }


    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    public function responseNotFound($message = 'Not Found')
    {
       return $this->setStatusCode(403)->responseError($message);
    }

    public function responseError($message)
    {
        return $this->response(
            [
                'status' => 'failed',
                'error' => [
                    'status_code' => $this->getStatusCode(),
                    'message' => $message
                ]
            ]
        );
    }

    public function response($data)
    {
        return \Response::json( $data , $this->getStatusCode() );
    }

}


