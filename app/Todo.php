<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable=['title','description','completed'];
    protected $attributes=['completed'=>false];
    public $timestamps = false;
}
