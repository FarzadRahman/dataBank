<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table='center';
    protected $primaryKey='centerId';
    public $timestamps=false;
}
