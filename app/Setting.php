<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['name_ar', 'name_en', 'language', 'status', 'logo', 'icon', 'message', 'description', 'keywords', 'email'];
}
