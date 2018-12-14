<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = array(
        'id',
        'title',
        'content',
        'user_no',
        'created_at',
        'updated_at'
    );
}
