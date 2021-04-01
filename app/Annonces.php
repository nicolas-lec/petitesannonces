<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annonces extends Model
{

    protected $fillable = ['title', 'slug', 'content', 'active', 'created_at', 'updated_at'] ;




}
