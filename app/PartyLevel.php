<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartyLevel extends Model
{
    protected $table='party_level';
    protected $primaryKey='party_levelId';
    public $timestamps=false;
}
