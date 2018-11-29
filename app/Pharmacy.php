<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Malhal\Geographical\Geographical;

class Pharmacy extends Model
{
    use Geographical;

    protected $fillable = [
        'name', 'street', 'city', 'state', 'zip', 'latitude', 'longitude'
    ];
}
