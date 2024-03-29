<?php

namespace biox2020;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type_user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function TipoUsuario(){
        return $this->belongsTo('biox2020\TypeUser','type_user_id');
    }

    public function socio(){
        return $this->hasOne('biox2020\Partner','users_id');
    }
}