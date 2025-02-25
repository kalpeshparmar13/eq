<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyQuotaRequest extends Model
{
    use HasFactory;

    protected $table = 'emergency_quota_requests';
    
    protected $fillable = [
        'diary_no',
        'request_of',
        'request_by',
        'pnr',
        'train_no',
        'train_name',
        'journey_dt',
        'stn_from',
        'stn_to',
        'no_of_births',
        'train_class',
        'passenger_name',
        'mobile_no',
        'journey_purpose',
        'created_by',
        'created_dt',
        'forwarded_to',
        'forwarded_dt',
        'status',
        
    ];

    protected $casts = [
        'journey_dt' => 'date',
        'created_dt' => 'date',
        'forwarded_dt' => 'date',
    ];

    // Define the relationship with the User model for each foreign key
    public function requestOf()
    {
        return $this->belongsTo(User::class, 'request_of'); // user who the request is for
    }

    public function requestBy()
    {
        return $this->belongsTo(User::class, 'request_by'); // user who made the request
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by'); // user who created the record
    }

    public function forwardedTo()
    {
        return $this->belongsTo(User::class, 'forwarded_to'); // user who the request is forwarded to
    }

    public function stationFrom()
    {
        return $this->belongsTo(Station::class,'stn_from');
    }
    
    public function stationTo()
    {
        return $this->belongsTo(Station::class,'stn_to');
    }

    public function trainClass()
    {
        return $this->belongsTo(TrainClass::class,'train_class');
    }
}
