<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
    protected $table='constituency';
    protected $primaryKey='constituencyId';
    public $timestamps=false;
}
