<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create( 'social_media', function ( Blueprint $table ) {
            $table->id();
            $table->enum('platform', ['facebook', 'tiktok', 'twitter', 'instagram', 'youtube']);
            $table->string( 'link' )->nullable();
            $table->enum( 'status', ['active','deactive'] )->default( 'active');
            $table->timestamps();
            $table->softDeletes();
        } );

        DB::table('social_media')->insert([
            ['platform' => 'facebook', 'link' => 'https://www.facebook.com/', 'status' => 'active'],
            ['platform' => 'tiktok', 'link' => 'https://www.tiktok.com/', 'status' => 'active'],
            ['platform' => 'twitter', 'link' => 'https://www.twitter.com/', 'status' => 'active'],
            ['platform' => 'instagram', 'link' => 'https://www.instagram.com/', 'status' => 'active'],
            ['platform' => 'youtube', 'link' => 'https://www.youtube.com/', 'status' => 'active'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
