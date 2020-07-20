<?php

namespace Netgroup\AtaSms;

use Illuminate\Database\Eloquent\Model;

class ResponseCodes extends Model
{
    protected $fillable = ['codes', 'description'];
}
