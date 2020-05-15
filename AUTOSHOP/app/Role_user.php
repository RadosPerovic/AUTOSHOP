<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
  protected $fillable = ['id_user'];
    public $timestamps=false;
    protected $table='role_user';
}
