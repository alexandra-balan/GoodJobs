<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'content',
        'category',
        'company_id',
    ];

    protected $table = 'articles';

    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'company_id');
    }
}
