<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\StoreSubscription;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    /**
     * @param StoreSubscription $request
     * @return JsonResponse
     */
    public function store(StoreSubscription $request): JsonResponse
    {
        if (!$request->validated())
            return ApiResponse::error(ApiResponse::MSG_FAILED);
             Subscription::create($request->validated());
        return ApiResponse::success([], ApiResponse::MSG_SEND_REQUEST);
    }
}
