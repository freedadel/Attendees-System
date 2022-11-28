<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use URL;
use Response;
class AdminController extends Controller
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
        return redirect(route('users.show',auth()->user()->id));
    }

}
