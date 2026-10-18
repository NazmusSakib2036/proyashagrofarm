<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use App\Models\Gallery;
use App\Models\MediaPartner;
use App\Models\OurTalk;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Stat;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        $setting = $this->getSetting();

        return view('site.home', [
            'setting' => $setting,
            'services' => $this->tableExists('services') ? Service::where('is_active', true)->orderBy('sort_order')->get() : collect(),
            'stats' => $this->tableExists('stats') ? Stat::orderBy('sort_order')->get() : collect(),
            'galleries' => $this->tableExists('galleries') ? Gallery::orderBy('sort_order')->get() : collect(),
            'testimonials' => $this->tableExists('testimonials') ? Testimonial::where('is_active', true)->orderBy('sort_order')->get() : collect(),
            'mediaPartners' => $this->tableExists('media_partners') ? MediaPartner::where('is_active', true)->orderBy('sort_order')->get() : collect(),
            'ourTalks' => $this->tableExists('our_talks') ? OurTalk::where('is_active', true)->orderBy('sort_order')->get() : collect(),
        ]);
    }

    public function serviceShow(Service $service): View
    {
        abort_unless($service->is_active, 404);

        $setting = $this->getSetting();

        return view('site.service-show', [
            'setting' => $setting,
            'service' => $service,
            'relatedServices' => $this->tableExists('services')
                ? Service::where('is_active', true)
                    ->whereKeyNot($service->id)
                    ->orderBy('sort_order')
                    ->limit(6)
                    ->get()
                : collect(),
        ]);
    }

    public function ourTalkShow(OurTalk $ourTalk): View
    {
        abort_unless($ourTalk->is_active, 404);

        $setting = $this->getSetting();

        return view('site.our-talk-show', [
            'setting' => $setting,
            'ourTalk' => $ourTalk,
            'relatedTalks' => $this->tableExists('our_talks')
                ? OurTalk::where('is_active', true)
                    ->whereKeyNot($ourTalk->id)
                    ->orderBy('sort_order')
                    ->limit(6)
                    ->get()
                : collect(),
        ]);
    }

    public function about(): View
    {
        $setting = $this->getSetting();

        return view('site.about', [
            'setting' => $setting,
            'teamMembers' => $this->tableExists('team_members') ? TeamMember::orderBy('sort_order')->get() : collect(),
        ]);
    }
    
    public function aboutProyash(): View
    {
        return view('site.about-proyash', ['setting' => $this->getSetting()]);
    }
    
    public function missionPage(): View
    {
        return view('site.mission', ['setting' => $this->getSetting()]);
    }
    
    public function visionPage(): View
    {
        return view('site.vision', ['setting' => $this->getSetting()]);
    }
    
    public function board(): View
    {
        $directors = \App\Models\TeamMember::where('designation','like','%Director%')->orderBy('sort_order')->get();
        
        return view('site.board', ['directors' => $directors]);
    }
    
    public function awards(): View
    {
        return view('site.awards', ['setting' => $this->getSetting()]);
    }

    public function contactSubmit(Request $request): RedirectResponse
    {
        if (! $this->tableExists('contact_messages')) {
            return back()->with('success', 'Message service is currently unavailable. Please try again later.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'message' => ['required', 'string'],
        ]);

        $message = ContactMessage::create($validated);

        $setting = $this->getSetting();
        $mailTo = $setting->receiver_gmail ?: $setting->admin_notification_email ?: 'admin@proyashagro.com';

        try {
            if ($setting->sender_gmail && $setting->sender_gmail_app_key) {
                // Use Symfony Mailer with Gmail SMTP
                $dsn = sprintf(
                    'smtp://%s:%s@smtp.gmail.com:587?encryption=tls',
                    urlencode($setting->sender_gmail),
                    urlencode($setting->sender_gmail_app_key)
                );
                
                $transport = \Symfony\Component\Mailer\Transport::fromDsn($dsn);
                Mail::setSymfonyTransport($transport);
                
                Mail::to($mailTo)->send((new ContactMessageReceived($message))
                    ->from($setting->sender_gmail, 'Proyash Agro Farm')
                    ->replyTo($validated['email'], $validated['name']));
            } else {
                Mail::to($mailTo)->send((new ContactMessageReceived($message))
                    ->replyTo($validated['email'], $validated['name']));
            }
        } catch (\Throwable $exception) {
            report($exception);
            return back()->withInput()->withErrors([
                'message' => 'Message পাঠানো যায়নি। Gmail settings আবার চেক করুন।',
            ]);
        }

        return back()->with('success', 'Your message has been sent successfully.');
    }

    private function getSetting(): SiteSetting
    {
        if (! $this->tableExists('site_settings')) {
            return new SiteSetting([
                'hero_headline' => 'কৃষিই আমাদের প্রেরণা',
                'hero_subtext' => 'আধুনিক প্রযুক্তিতে টেকসই কৃষি',
                'hero_cta_text' => 'আমাদের সম্পর্কে জানুন',
                'hero_cta_url' => '#about',
            ]);
        }

        return SiteSetting::query()->firstOrCreate([]);
    }

    private function tableExists(string $table): bool
    {
        return Schema::hasTable($table);
    }
}
