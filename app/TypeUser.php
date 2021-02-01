<?php

namespace biox2020;

use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $table = 'type_user';

    public $timestamps = false;

    protected $fillable = [
        'tipo_usuario'
    ];

    public function usuario(){
        return $this->hasOne('biox2020\Phone','type_user_id','id');
    }
}