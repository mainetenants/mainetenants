<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_post_inner_like_cmt extends Model
{
    public $timestamps = false;     
    use HasFactory;
    protected $table = 'msu_page_post_inner_like_comment';
    protected $fillable = [
		'user_id','post_id','comment','is_active'
    ];
}
