<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'name',
        'job_title',
        'title',
        'experience',
        'vacancy_approval'
    ];
}
