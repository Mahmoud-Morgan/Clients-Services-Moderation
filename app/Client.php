<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    public function clientService()
    {
        return $this->hasMany('App\ClientService','client_id');
    }
}
