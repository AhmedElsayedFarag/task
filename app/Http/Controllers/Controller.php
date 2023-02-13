<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
/**
 *
 * @OA\Info(
 *      version="v1",
 *      title="AiishAii",
 *      description="Ecommerce project",
 *      @OA\Contact(
 *          email="ahmedhamada2555@gmail.com.com"
 *      )
 * )
 * @OA\Get(
 *     path="/",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page")
 * )
 * @OA\Server(
 *      url= L5_SWAGGER_CONST_HOST,
 *      description="*** API Server"
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     description="API token is required to access this API",
 *     in="header",
 *     scheme="bearer",
 *     securityScheme="bearerAuth",
 * )
 *
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


}
