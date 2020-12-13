<?php

namespace App;

use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use FullTextSearch;

    protected $fillable = [
        'name', 'detail', 'search'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute('search', self::convertViToEN($model->name));
        });
    }
}
