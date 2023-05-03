<?php

namespace App\Traits;

use App\Classes\Settings;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;

/**
 * @property Settings $settings
 */
trait RespondsWithHttpStatus
{

    protected function success($message, $data = [], $meta = [], $status = 200): JsonResponse
    {
        $res = [
            'message' => $message,
        ];
        if ($data) $res['data'] = $data;
        if ($meta) $res['meta'] = $meta;
        return response()->json($res, $status);
    }

    protected function failure($message, $details = null, $status = 422): JsonResponse
    {
        $res = [
            'error' => $message,
        ];
        if ($details) $res['details'] = $details;
        return response()->json($res, $status);
    }


}
