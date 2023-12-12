<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Workbench\App\Models\User;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invited()
    {
        return $this->hasMany(Invited::class);
    }
}
