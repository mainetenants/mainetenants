<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class page_category extends Model
{
    use HasFactory;

    protected $table = 'msu_user_page';
    protected $fillable = [
		'category_name','is_active'
	];

}