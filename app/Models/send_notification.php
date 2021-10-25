<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class send_notification extends Model
{
    public $timestamps = false; 
    use HasFactory;

    protected $table = 'msu_user_notification';
    protected $fillable = ['user_id', 'friend_id','post_id', 'page_id','group_id','message','type','is_seen'];

}
