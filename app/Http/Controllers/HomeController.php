<?php

namespace App\Http\Controllers;

use App\Application;
use App\Record;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $records = Record::all();
        $applications = Application::latest()->get();
        return view('home', compact('records', 'applications'));
    }
}
