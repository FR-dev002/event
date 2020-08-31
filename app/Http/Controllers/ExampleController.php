<?php
namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * @OA\Swagger(
     *     schemes={"http","https"},
     *     host="localhost:8000",
     *     basePath="/",
     *     @OA\Info(
     *         version="1.0.0",
     *         title="Default URL APIs",
     *         description="Get all data",
     *         termsOfService="Lorem",
     *         @OA\Contact(
     *             email="fikriramadhan002@gmail.com"
     *         ),
     *         @OA\License(
     *             name="MIT",
     *             url="google.com"
     *         ),
     *     ),
     *     @OA\ExternalDocumentation(
     *         description="Find out more about my website",
     *         url="http..."
     *     )
     * )
     */
    public function test_controller(LoginRequest $request)
    {
        return response()->json(['a' => 1]);
    }

    //
}
