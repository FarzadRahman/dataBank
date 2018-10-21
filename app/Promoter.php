<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    protected $table='promoters';
    protected $primaryKey='promotersId';
    public $timestamps=false;
}
