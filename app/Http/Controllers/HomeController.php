<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;
use App\Models\SubCatagory;
use App\Models\Expense;

use Carbon\Carbon;
use Str;

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
        return view('home',[
            'recent_expneses' => Expense::take(5)->orderBy('id','desc')->get(),
            'total_expenses' => Expense::sum('amount'),
        ]);
    }
}
