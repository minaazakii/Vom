<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function setting()
    {
        return $this->hasOne(StoreSetting::class);
    }

    public function scopeStoreBelongToUser($query,$store_id)
    {
        return $query->where('id', $store_id)->where('user_id', auth('sanctum')->id())->exists();
    }
}
