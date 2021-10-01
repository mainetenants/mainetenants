<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_page_post extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_page_post';
    protected $fillable = [
		'title', 'content','images', 'videos','music','likes','dislikes','user_id','status'
	];
}
