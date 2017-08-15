<?php

namespace App;

use Illuminate\Database\Eloquent\Model ;

class Department extends Model
{

    //$department->item;
    public function item(){
        return $this->belongsTo(item::class);
    }
}
