<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'description',
        'name',
        'job_description',
        'job_city',
        'job_level',
        'company_id',
        'requirements',
        'responsibilities',
        'details',
        'category',
        'expiration_date',
    ];

    protected $table = 'jobs';

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
