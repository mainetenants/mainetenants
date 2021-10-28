<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msu_group extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_group';
    protected $fillable = [
		'user_id','group_name','group_category','group_descripition','only_see','is_active'
	];
}
