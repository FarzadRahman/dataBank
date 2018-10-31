<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListType extends Model
{
    public $incrementing = false;

    protected $table='listtype';
    protected $primaryKey='listtypeId';
    public $timestamps=false;
}
