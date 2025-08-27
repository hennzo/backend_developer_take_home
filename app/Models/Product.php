<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];

    public function pricing(): BelongsToMany
    {
        return $this->BelongsToMany(PricingOption::class, 'product_pricings')->withPivot('amount');
    }

    public function productPricing(): HasMany
    {
        return $this->HasMany(ProductPricing::class, 'product_id', 'id');
    }
}
