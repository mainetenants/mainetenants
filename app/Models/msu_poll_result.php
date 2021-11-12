<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_poll_result extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_poll_result';
    protected $fillable = [
		'user_id', 'poll_id','value'
	];
}
