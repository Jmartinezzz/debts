<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debtor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['dicountPercent', 'envelope']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function detail(Debtor $debtor)
    {
        return view('debts-detail', ['debtor' => $debtor]);
    }

    public function dicountPercent()
    {
        return view('discount-percent');
    }
    
    public function envelope()
    {
        return view('envelope');
    }
}
