<?php

namespace App\Http\Controllers;

use App\Annonces;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

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

    //Affiche toutes les annonces
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //on récupère toutes les annonces
        $annonces = Annonces::all();

        return view('home', compact('annonces'));
    }



}
