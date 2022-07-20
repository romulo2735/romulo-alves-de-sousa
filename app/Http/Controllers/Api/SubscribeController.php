<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Job $job){
        // $user = auth('sanctum')->user();
        // $user->jobs()->attach($job->id);
        
       $job->users()->attach(auth('sanctum')->user());

       
       return response()
            ->json([], 200);
    }
}
