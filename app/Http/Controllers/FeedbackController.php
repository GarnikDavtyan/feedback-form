<?php

namespace App\Http\Controllers;

use App\Application;
use App\Http\Requests\StoreFeedbackRequest;
use Illuminate\Http\JsonResponse;

class FeedbackController extends Controller
{
    public function store(StoreFeedbackRequest $request) : JsonResponse
    {
        $application = new Application($request->name, $request->phone, $request->feedback);
        $application->save();

        return response()->json([
            'message' => 'Feedback saved successfully'
        ]);
    }
}
