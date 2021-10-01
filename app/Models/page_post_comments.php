<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_post_comments extends Model
{

    public $timestamps = false;     
    use HasFactory;
    protected $table = 'page_post_comments';
    protected $fillable = [
		'user_id','post_id','comment','is_active'
    ];
}
