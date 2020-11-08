<?php

namespace App\Http\Controllers;

use App\about;
use App\Category;
use App\LatestNew;
use Illuminate\Http\Request;
use App\MainData;
use App\ManagerWord;
use App\MainService;
use App\map;
use App\Partner;
use App\Point;
use App\Product;
use App\Service;
use App\Slider;
use App\WhyUs;

class LandPage extends Controller
{
    public function index()
    {  
        $maindata = MainData::first();
        $managerword = ManagerWord::first();
        $mainservices = MainService::all();
        $sliders = Slider::all();
        $categories = Category::all();
        $works = Product::all();
        $services = Service::all();
        $latestnews = LatestNew::all();
        $parteners = Partner::all();
        $about = about::first();
        $point_one = Point::orderBy('created_at', 'asc')->limit(4)->get();
        $point_two = Point::orderBy('created_at', 'desc')->take(4)->get();
        $whyus = WhyUs::all();
        $map = map::first();
        return view('landpage' , compact('maindata',
        'managerword','mainservices','sliders','categories',
        'works','services','latestnews','parteners','about',
        'point_one','point_two','whyus','map'));

    }
}
