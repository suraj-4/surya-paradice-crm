<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Specify the primary key column name
    protected $primaryKey = 'room_id';
    
    protected $guarded = [];
}
