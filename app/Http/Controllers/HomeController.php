<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamu;
use App\Jenistamu;
Use Auth;
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
    {
        $jml_tamu = Tamu::all()->count();

        $jml_jenistamu = Jenistamu::all()->count();

        $tamus = Jenistamu::with('tamu')->get();

        return view('home', compact('jml_tamu','jml_jenistamu', 'tamus'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
