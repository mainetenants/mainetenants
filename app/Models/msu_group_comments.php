<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_group_comments extends Model
{
    public $timestamps = false;     
    use HasFactory;
    protected $table = 'msu_page_group_comments';
    protected $fillable = [
		'user_id','post_id','group_id','title','comment','likes','dislikes','status'
    ];
}
