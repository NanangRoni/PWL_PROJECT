<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customer,Sales,Product};

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
        $sales      = Sales::count();
        $customers  = Customer::count();
        return view('pages.home.index', compact('sales','customers'));
    }
}
