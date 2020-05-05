<?php
namespace App\Http\Controllers\Traits;

trait ApiResponse
{
    public function response($status = false, $data = null, $message = null, $code = 200)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data
        ], $code);
    }
}