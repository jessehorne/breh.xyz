<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = 'urls';
    protected $fillable = ['long_url', 'short_url'];

    protected $short_rules = array('short_url' => 'unique:urls,short_url');
}
