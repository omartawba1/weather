<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PredictionRequest;
use App\Http\Resources\PredictionResource;
use App\Models\Prediction;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PredictionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param PredictionRequest $request
     * @return JsonResponse
     */
    public function index(PredictionRequest $request)
    {
        return new JsonResponse(
            new PredictionResource(Prediction::filter($request)
                ->select(['time', DB::raw('AVG(value) as temperature')])
                ->groupBy('time')
                ->get()
            )
        );
    }
}
