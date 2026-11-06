<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;
class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; 

    protected $fillable = [
        'CategoryName',
        'CategoryImage',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'CategoryID');
    }

    public function getNameAttribute(): ?string
    {
        return $this->CategoryName;
    }
}
