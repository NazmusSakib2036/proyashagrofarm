<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('sender_gmail')->nullable()->after('admin_notification_email');
            $table->string('sender_gmail_app_key')->nullable()->after('sender_gmail');
            $table->string('receiver_gmail')->nullable()->after('sender_gmail_app_key');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['sender_gmail', 'sender_gmail_app_key', 'receiver_gmail']);
        });
    }
};