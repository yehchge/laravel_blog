<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    protected $fillable = array(
        'id',
        'eng',
        'zhtw',
        'created_at',
        'updated_at'
    );
}
