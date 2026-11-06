<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'ProductName',
        'Price',
        'stock',
        'ProductImage',
        'CategoryID',
    ];

    protected $casts = [
        'Price' => 'decimal:2',
        'stock' => 'integer',
    ];
    public function category()
{
    return $this->belongsTo(Category::class, 'CategoryID');
}

    public function getNameAttribute(): ?string
    {
        return $this->ProductName;
    }
}
