<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    public function Admin(){
        return $this->belongsTo('App\Model\Admin','admin_id');
    }
}
