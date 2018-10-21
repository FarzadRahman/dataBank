<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Associate extends Model
{
    protected $table='associates';
    protected $primaryKey='associateId';
    public $timestamps=false;
}
