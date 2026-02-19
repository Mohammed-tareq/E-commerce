<?php

namespace App\Traits;

trait ApiResponse
{
    public function apiresponse($message, $status, $data = [])
    {
        $result = [
            'status' => $status,
            'message' => $message,
        ];
        if (!empty($data)) $result['data'] = $data;
        return response()->json($result, $status);
    }
}