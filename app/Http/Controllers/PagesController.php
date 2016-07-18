<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function whatWeDo()
    {
        return view('what-we-do');
    }

    public function whoWeAre()
    {
        return view('who-we-are');
    }
}
