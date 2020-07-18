<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 * @method static create(array $farm)
 */
class Farm extends Model
{
    protected $fillable = ['name', 'city', 'website'];

    public function markets()
    {
        return $this->belongsToMany('App\Market')->withTimestamps();
    }
}
