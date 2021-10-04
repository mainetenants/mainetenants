<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inviteFriends extends Model
{
    use HasFactory;
    public $timestamps = false;
        protected $table = 'msu_invite_friends';
    protected $fillable = [
		'user_id','friend_id','post_id','status','invitation_status','is_active'
    ];
}
