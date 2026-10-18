<?php

use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\MediaPartnerController;
use App\Http\Controllers\Admin\OurTalkController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/about-proyash', [App\Http\Controllers\SiteController::class, 'aboutProyash'])->name('about.proyash');
Route::get('/mission', [App\Http\Controllers\SiteController::class, 'missionPage'])->name('about.mission');
Route::get('/vision', [App\Http\Controllers\SiteController::class, 'visionPage'])->name('about.vision');
Route::get('/board-of-directors', [App\Http\Controllers\SiteController::class, 'board'])->name('about.board');
Route::get('/awards', [App\Http\Controllers\SiteController::class, 'awards'])->name('about.awards');

Route::get('/concerns', [App\Http\Controllers\ConcernController::class, 'index'])->name('concerns.index');
Route::get('/concerns/{concern}', [App\Http\Controllers\ConcernController::class, 'show'])->name('concerns.show');
Route::get('/services/{service}', [SiteController::class, 'serviceShow'])->name('services.show');
Route::get('/our-talks/{ourTalk}', [SiteController::class, 'ourTalkShow'])->name('our-talks.show');
Route::post('/contact', [SiteController::class, 'contactSubmit'])->name('contact.submit');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        if (auth()->check() && auth()->user()?->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    })->name('index');

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/hero', [HeroController::class, 'edit'])->name('hero.edit');
        Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');

        Route::get('/site-settings', [SiteSettingController::class, 'edit'])->name('site-settings.edit');
        Route::put('/site-settings', [SiteSettingController::class, 'update'])->name('site-settings.update');

        Route::resource('services', ServiceController::class)->except(['show']);
        Route::resource('galleries', GalleryController::class)->except(['show']);
        Route::resource('team-members', TeamMemberController::class)->except(['show']);
        Route::resource('testimonials', TestimonialController::class)->except(['show']);
        Route::resource('stats', StatController::class)->except(['show']);
        Route::resource('media-partners', MediaPartnerController::class)->except(['show']);
        Route::resource('our-talks', OurTalkController::class)->except(['show']);
        Route::resource('concerns', App\Http\Controllers\Admin\ConcernController::class)->except(['show']);
        Route::resource('awards', AwardController::class)->except(['show']);

        Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::delete('/messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');
    });
});
