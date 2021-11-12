<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_create_poll extends Model
{
    public $timestamps = false;     
    use HasFactory;
    protected $table = 'msu_create_poll';
    protected $fillable = [
		'user_id','post_id','poll0','poll1','poll2','poll3','poll_category','expiry_time'
    ];
}
