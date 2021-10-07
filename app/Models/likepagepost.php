<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likepagepost extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_page_post_like_comment';
    protected $fillable = [
		'user_id','comment_id','post_id','is_like','is_active'
	];
}
