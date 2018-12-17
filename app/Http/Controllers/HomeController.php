<?php

namespace App\Http\Controllers;

use App\Construction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $constructions = Construction::paginate(4);
        return view('pages.index', compact('constructions'));
    }
}
