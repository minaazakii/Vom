<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements TranslatableContract
{
    use HasFactory ,Translatable ;

    protected $guarded = [];

    public $translatedAttributes = ['name', 'description'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
