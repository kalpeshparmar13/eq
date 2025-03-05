<?php

use App\Models\User;
use App\Models\Station;
use App\Models\TrainClass;
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
            $table->string('diary_year')->nullable();
            $table->string('diary_no')->nullable();
            $table->string('diary_no_full')->nullable();
            $table->foreignIdFor(User::class, 'request_of')->constrained(); 
            $table->foreignIdFor(User::class, 'request_by')->constrained(); 
            $table->foreignIdFor(User::class, 'created_by')->constrained(); 
            $table->foreignIdFor(User::class, 'forwarded_to')->nullable()->constrained(); 
            $table->boolean('is_on_duty')->default(0);
            $table->string('pnr');
            $table->string('train_no');
            $table->string('train_name');
            $table->date('journey_dt');
            $table->foreignIdFor(Station::class, 'stn_from')->constrained();
            $table->foreignIdFor(Station::class, 'stn_to')->constrained();
            $table->string('no_of_births');
            $table->foreignIdFor(TrainClass::class,'train_class')->constrained();
            $table->string('passenger_name');
            $table->string('mobile_no');
            $table->string('journey_purpose');
            $table->date('forwarded_dt')->nullable();
            $table->string('status');
            $table->string('status_approval')->nullable();
            $table->string('status_rejection_remark')->nullable();
            $table->date('status_approval_dt')->nullable();
            $table->timestamps();
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
