<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceName extends Model
{
    //

    protected $fillable = ['service_name' ];
    
    public function clientService()
    {
        return $this->hasMany('App\ClientService','service_name_id');
    }
}
