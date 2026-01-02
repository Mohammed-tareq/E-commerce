<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_desc');
            $table->string('meta_desc');
            $table->string('site_copy_right');
            $table->string('logo');
            $table->string('favicon');
            $table->string('site_email');
            $table->string('site_phone');
            $table->string('email_support');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('promotion_video_url');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
