<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    public $timestamps = true;

    protected $table = 'plants';

    protected $fillable = [
        'original_image',
        'process_image'
    ];
}
