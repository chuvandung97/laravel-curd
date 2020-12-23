<?php

namespace App;

use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use FullTextSearch;

    protected $table = 'products';

    protected $fillable = [
        'name', 'detail', 'search', 'price', 'model', 'contact', 'manufacture_time', 'is_inland', 'is_active', 'created_at', 'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->setAttribute('search', self::convertViToEN($model->name));
        });
    }
}
