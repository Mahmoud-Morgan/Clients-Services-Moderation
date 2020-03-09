<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceName extends Model
{
    //
    public function clientService()
    {
        return $this->hasMany('App\ClientService','service_name_id');
    }
}
