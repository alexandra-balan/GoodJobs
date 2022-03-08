<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'company_city',
        'description',
        'email',
    ];

    protected $table = 'companies';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
