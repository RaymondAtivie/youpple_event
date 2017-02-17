<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Adminuser extends User{
    protected $table = 'adminusers';

    protected $guarded = ['id'];

    protected $fillable = [
        'fullname', 'email', 'password', 'role', 'remember_token'
    ];

}
