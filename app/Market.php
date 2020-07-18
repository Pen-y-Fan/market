<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static select(string $string, string $string1)
 */
class Market extends Model
{
    protected $fillable = ['name', 'city', 'website'];

    public function farms()
    {
        return $this->belongsToMany('App\Farm')->withTimestamps();
    }
}
