<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Concern;
use App\Models\TeamMember;
use App\Models\SiteSetting;

class ConcernController extends Controller
{
    public function index()
    {
        $concerns = Concern::orderBy('sort_order')->get();

        return view('site.concerns.index', compact('concerns'));
    }

    public function show(Concern $concern)
    {
        return view('site.concerns.show', compact('concern'));
    }
}
