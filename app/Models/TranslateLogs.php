<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslateLogs extends Model 
{

    protected $table = 'translate_logs';
    public $timestamps = true;
    protected $fillable = array('translated', 'searched');

}