<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_group_reply_comment extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_group_reply_comment';
    protected $fillable = [
		'comment_id','post_id','comment','is_active','status'
	];
}
