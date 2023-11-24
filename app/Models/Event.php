<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'event_name',
        'type',
        'date',
        'time',
        'local',
        'open_event',
        'description',
        'event_picture',
    ];
}
