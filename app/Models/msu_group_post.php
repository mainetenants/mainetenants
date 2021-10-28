<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_group_post extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_group_post';
    protected $fillable = [
		'user_id','group_id','title','content','images','music','videos','likes','dislikes','status'
    ];

}
