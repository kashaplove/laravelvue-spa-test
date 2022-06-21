<?php

namespace App\Http\Controllers;

use App\Http\Resources\RateResource;
use App\Models\Rate;
use App\Models\RateUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubscribeController extends Controller
{
    public function subscribe(Rate $rate)
    {
       RateUser::firstOrCreate([
           'user_id' => auth()->user()->id,
           'rate_id' => $rate->id,
       ]);
       return new RateResource($rate);
    }

    public function unSubscribe(Rate $rate)
    {
        $rateUser = RateUser::where([
            ['rate_id', '=', $rate->id],
            ['user_id', '=', auth()->user()->id],
        ]);
        $rateUser->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
