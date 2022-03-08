<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'education',
        'city',
        'email',
        'phone_number',
        'last_job',
        'spoken_languages',
        'skills',
        'details'
    ];

    protected $table = 'candidates';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
