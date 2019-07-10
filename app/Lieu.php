<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lieu extends Model
{
    protected $fillable = ['label', 'description'];

    public $table = 'lieux';
}
