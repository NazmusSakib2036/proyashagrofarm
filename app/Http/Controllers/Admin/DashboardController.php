<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Stat;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'serviceCount' => Service::count(),
            'galleryCount' => Gallery::count(),
            'teamCount' => TeamMember::count(),
            'testimonialCount' => Testimonial::count(),
            'statCount' => Stat::count(),
            'unreadMessageCount' => ContactMessage::where('is_read', false)->count(),
        ]);
    }
}
