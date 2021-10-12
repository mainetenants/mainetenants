<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $table = 'msu_events';
    protected $primaryKey = 'id';
    protected $fillable = ['create_event','event_name','start_date','start_time','end_date','end_time','privacy','locations','event_link','description'];
}
