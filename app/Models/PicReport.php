<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PicReport extends Model
{
    use HasFactory;

    protected $table = "event";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'event_name',
        'event_director',
        'event_venue',
        'event_desc',
        'event_date', 
        'event_link',
        'event_status', 
    ];

    protected $primaryKey = 'event_id';
    public $timestamps = false;
}
