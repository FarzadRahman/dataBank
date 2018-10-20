<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table='candidate';
    protected $primaryKey='candidateId';
    public $timestamps=false;
}
