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
//       return response(null, Response::HTTP_NO_CONTENT);
//        return $rate;
        return new RateResource($rate);

//        $rateUsers = RateUser::where('user_id', auth()->user()->id)->get();
//        $rates = [];
//        foreach ($rateUsers as $rateUser)
//        {
//            $rates[] = $rateUser->rate_id;
//        }
//        return $rates;

    }
}
