<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Jobs\ProcessSubmissionJob;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function store(SubmissionRequest $request): JsonResponse
    {
        try{
            ProcessSubmissionJob::dispatch($request->validated());
            return response()->json(['message' => 'Submission is being processed.'], 202);
        }catch(Exception $e){
            return response()->json(['error' => 'An error occured while processing the request'], 500);
        }
    }
}
