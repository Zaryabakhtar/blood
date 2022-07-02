<?php

namespace App\Http\Controllers;

use App\Models\Donnors;
use App\Models\TblBloodGroups;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $data = [];
        $data['totalDonnors'] = Donnors::count();
        $data['blood_groups'] = TblBloodGroups::withCount('donnors')->get(); 
        return view('home' , compact('data'));
    }
}
