<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like_user_page extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'like_user_page';
    protected $fillable = [
		'user_id', 'page_id','friend_id', 'is_like','is_active','created'
	];
}
