<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lat', 'lng', 'classe', 'volume', 'status', 'user', 'end', 'anon', 'file'
    ];
}
