<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetenteurModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'assets_number', 
        'assets_number', 
        'region',
        'ville',
    ];
}
