<?php

namespace Gallery\Http\Controllers;

use Gallery\Models\Status;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
}
