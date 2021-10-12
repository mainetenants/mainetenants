<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_event_details extends Model
{
    use HasFactory;
    protected $table = 'msu_user_event_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'event_id',
        'user_id',
        'action',
        'going',
        'notification',
        'notification',
        'notification',
        'updated_at',
    ];

}
