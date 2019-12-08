<?php

namespace App\Http\Controllers;

use App\Helper\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    /**
     * @return Response
     */
    public function response()
    {
        return new Response();
    }
}
