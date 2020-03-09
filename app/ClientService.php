<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientService extends Model
{
    //
    public function client()
    {
        return $this->belongsTo('App\Client','client_id');
    }

    public function serviceName()
    {
        return $this->belongsTo('App\ServiceName','service_name_id');
    }
}
