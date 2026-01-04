<?php

namespace App\Http\Helpers;

class ApiResponse
{
    public static function success($message, $data = null, $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public static function error($message, $error = null, $statusCode = 500)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'error' => $error
        ], $statusCode);
    }
}
