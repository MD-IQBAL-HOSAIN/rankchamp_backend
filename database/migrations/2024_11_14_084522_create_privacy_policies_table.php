<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('privacy_policies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('privacy_policies')->insert([
            'title' => 'Privacy Policy',
            'slug' => Str::slug('Privacy Policy'),
            'description' => 'This is our privacy policy page',
        ]);

        DB::table('privacy_policies')->insert([
            'title' => 'Terms and Conditions',
            'slug' => Str::slug('Terms and Conditions'),
            'description' => 'This is our terms and conditions page',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privacy_policies');
    }
};
