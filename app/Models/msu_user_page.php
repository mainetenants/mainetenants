<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_user_page extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_user_page';
    protected $fillable = [
		'user_id', 'page_info','page_category', 'page_descripition','is_active'
	];
}
    