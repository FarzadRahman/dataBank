<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table='party';
    protected $primaryKey='partyId';
    public $timestamps=false;
}
