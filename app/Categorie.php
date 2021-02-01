<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'nombreCategoria',
        'slugCategoria'
    ];
}