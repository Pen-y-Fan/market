<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['name', 'city', 'website'];

    public function markets()
    {
        return $this->belongsToMany('App\Market')->withTimestamps();
    }
}
