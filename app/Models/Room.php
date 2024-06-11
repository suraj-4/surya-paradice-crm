<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    // public $table = 'rooms';
    // public $primaryKey = 'room_id';

    protected $fillable = [
        'room_name',
        'room_type',
        'room_number',
        'room_status',
    ];
}
