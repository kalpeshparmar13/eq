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
        Schema::create('emergency_quota_requests', function (Blueprint $table) {
            $table->id();
            $table->string('diary_no');
            $table->unsignedBigInteger('request_of'); 
            $table->unsignedBigInteger('request_by'); 
            $table->unsignedBigInteger('created_by'); 
            $table->string('pnr');
            $table->string('train_no');
            $table->string('train_name');
            $table->date('journey_dt');
            $table->string('stn_from');
            $table->string('stn_to');
            $table->string('no_of_births');
            $table->string('class');
            $table->string('passenger_name');
            $table->string('mobile_no');
            $table->string('journey_purpose');
            $table->date('created_dt');
            $table->timestamps();

             // Add foreign key constraints
             $table->foreign('request_of')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('request_by')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_quota_requests');
    }
};
