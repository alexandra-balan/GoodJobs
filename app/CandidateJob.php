<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CandidateJob extends Model
{
    protected $fillable = [
        'job_id',
        'candidate_id',
        'seen'
    ];

    public function candidate()
    {
        return $this->hasOne('App\Candidate', 'id', 'candidate_id');
    }

    public function job()
    {
        return $this->hasOne('App\Job', 'id', 'job_id');
    }

}
