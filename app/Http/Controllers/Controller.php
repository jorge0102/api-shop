<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="API Documentation", version="0.1", @OA\Contact(email="jorgearagon32@gmail.com"))
 * 
 * @OAS\SecuritySchema(
 *          securitySchema="bearerAuth",
 *          type="http",
 *          schema="bearer"
 * ) 
 * 
 * @OA\Server(url="https://localhost:3000/api/" , description="Learning env"),
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
