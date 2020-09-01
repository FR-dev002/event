<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title',
        'description',
        'date',
        'picture',
        'user_id',
        'location'
    ];


    // TODO List relasi
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }

}
