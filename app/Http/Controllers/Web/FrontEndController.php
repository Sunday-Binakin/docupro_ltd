<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class FrontEndController extends Controller
{
    public function HomePagePortfolio()
    {

        $portfolio = Portfolio::latest()->get();

        return view('frontend.home_all.portfolio',compact('portfolio'));

    }
}
