<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Denuncia;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function load_tab()
    {
        $den = Denuncia::all();
		return json_encode($den);
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function detalhar($id, $latlng, $cl, $vl, $ts, $ilnk)
    {
        return view("detalhar",['id'=>$id,'latlng'=>$latlng,'cl'=>$cl,'vl'=>$vl,'ts'=>$ts,'ilnk'=>$ilnk]);
    }
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function mapa()
    {
        return view("mapa");
    }
}
