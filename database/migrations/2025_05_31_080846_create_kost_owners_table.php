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
        Schema::create('kost_owners', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the Kost owner');
            $table->string('email')->unique()->comment('Email address of the Kost owner');
            $table->string('phone')->nullable()->comment('Phone number of the Kost owner');
            $table->string('address')->nullable()->comment('Address of the Kost owner');
            $table->string('profile_picture')->nullable()->comment('Profile picture of the Kost owner');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('Password for the Kost owner account');
            $table->rememberToken();
            $table->boolean('is_active')->default(true)->comment('Status of the Kost owner account');
            $table->boolean('is_verified')->default(false)->comment('Verification status of the Kost owner account');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kost_owners');
    }
};
