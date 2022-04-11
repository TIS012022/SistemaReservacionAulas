<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\View\ViewServiceProvider;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
}
