<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class WelcomeController extends Controller
{
    public function index()
    {

        $hotels = DB::table('hotels')
        ->paginate(2);


        return view('welcome',compact('hotels'));
    }
}
