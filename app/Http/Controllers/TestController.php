<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rate;

class TestController extends Controller
{
    public function __invoke()
    {
        $category = Category::find(1);
        $rate = Rate::find(1);
        dd($rate->category);
    }
}
