<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model
    protected $table = 'stations';

    // Define the fillable attributes
    protected $fillable = [
        'id', 
        'name',
        'code',
        'category',
        'division',
        'zone',
        'district',
        'state'
    ];
}
