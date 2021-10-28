<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_like_group_comment extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_like_group_comment';
    protected $fillable = [
		'user_id','comment_id','is_like','status'
	];
}
