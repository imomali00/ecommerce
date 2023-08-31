<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function response($data)
    {
        return response()->json([
            'data' => $data
        ]);
    }
    public function error(string $message = '',  $data = null): JsonResponse
    {
        return response()->json([
            'status' => 'Error',
            'message' => $message ?? 'Something went wrong',
            'data' => $data
        ]);
    }
    public function success(string $message = '',  $data = null): JsonResponse
    {
        return response()->json([
            'status' => "Success",
            'message' => $message ?? 'It was successful!!!',
            'data' => $data
        ]);
    }
}
