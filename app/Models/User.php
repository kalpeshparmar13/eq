<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'pfno',
        'name',
        'name_hindi',
        'designation',
        'designation_hindi',
        'email',
        'mobile_no',
        'rly_phone_no',
        'station',
        'station_hindi',
        'office_name',
        'address_line1',
        'address_line2',
        'city',
        'pincode',
        'state',
        'file_name',
        'diary_name',
        'role',
        'is_active',
        'password',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Define the inverse of the relationships for EmergencyQuotaRequest
    public function requestedEmergencyQuotaRequests()
    {
        return $this->hasMany(EmergencyQuotaRequest::class, 'request_of'); // user's requested quota
    }

    public function emergencyQuotaRequestsByUser()
    {
        return $this->hasMany(EmergencyQuotaRequest::class, 'request_by'); // requests made by user
    }

    public function createdEmergencyQuotaRequests()
    {
        return $this->hasMany(EmergencyQuotaRequest::class, 'created_by'); // requests created by user
    }

    public function forwardedEmergencyQuotaRequests()
    {
        return $this->hasMany(EmergencyQuotaRequest::class, 'forwarded_to'); // requests forwarded to user
    }
}
