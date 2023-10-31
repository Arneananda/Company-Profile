<?php

namespace App\Http\Controllers;

use App\Models\custpart;
use App\Models\Link;
use App\Models\Portofolio;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('landpage.index',[
            'teams' => Team::all()->where('status','published'),
            'portos' => Portofolio::all(),
            'customers' => custpart::all()->where('type','customer'),
            'partners' => custpart::all()->where('type','partnership'),
            'services' => Service::all(),
            'insta' => Link::find(4),
            'tito' => Link::find(3),
            'yt' => Link::find(2),
            'lin' => Link::find(1)
        ]);
    }
    public function porto(){
        return view('landpage.public.porto',[
            'teams' => Team::all()->where('status','published'),
            'portos' => Portofolio::all(),
            'customers' => custpart::all()->where('type','customer'),
            'partners' => custpart::all()->where('type','partnership'),
            'services' => Service::all()
        ]);
    }
    public function portofolio(Portofolio $portofolio){
        return view('landpage.public.portofolio',[
            'porto' => $portofolio
        ]);
    }
}