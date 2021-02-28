<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return home for all the user
        $userId = Auth::user()->id;
        $files = File::where('user_id', $userId)->orderBy('created_at', 'desc')->simplePaginate(5);

        return view('home')->with('files', $files);
    }
}
