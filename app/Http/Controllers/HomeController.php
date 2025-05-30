<?php

namespace App\Http\Controllers;

use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $highlightedServices = Service::take(2)->get(); 

        return view('welcome', compact('services', 'highlightedServices'));
    }
}
