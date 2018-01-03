<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmailPasswordController extends ApiController
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['reset']]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $input = $request->only('email');


        $validator = Validator::make($input, [
            'email' => 'required|email|exists:users,email',

        ], [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not a valid',
            'email.exists' => 'No user account associated with this email',
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'code' => 1,
                    'message' => 'Validation failed.',
                    'errors' => $validator->errors()
                ], 422);
        }





    }
}