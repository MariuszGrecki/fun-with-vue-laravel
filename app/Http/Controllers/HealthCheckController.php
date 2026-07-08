<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class HealthCheckController extends Controller
{
    public function check() : JSONResponse
    {
        return response()->json([
            'status' => 'ok',
            'app' => 'voter',
        ]);
    }
}
