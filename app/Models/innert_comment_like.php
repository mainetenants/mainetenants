<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class innert_comment_like extends Model
{
    public $timestamps = false;     
    use HasFactory;
    protected $table = 'msu_post_like_comment';
    protected $fillable = [
		'user_id','post_id','comment_id','is_like','is_active'
    ];
}
