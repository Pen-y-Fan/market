<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = ['name', 'city', 'website'];
}
