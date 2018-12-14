<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = array(
        'id',
        'name',
        'created_at',
        'updated_at'
    );
}
