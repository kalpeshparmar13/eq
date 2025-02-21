<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainClass extends Model
{
    use HasFactory;

    // Define the table name if it's different from the plural form of the model
    protected $table = 'train_classes';

    // Define the fillable attributes
    protected $fillable = ['fname', 'sname'];
}
