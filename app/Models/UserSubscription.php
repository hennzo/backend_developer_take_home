<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubscription extends Model
{
    use HasFactory;

    /** @var bool */
    public $timestamps = false;

    public const PENDING = 'Pending';
    public const ACTIVE = 'Active';
    public const INACTIVE = 'Inactive';
    public const CANCEL = 'Cancel';

    /**
     * The model's default values.
     *
     * @var array<int, string>
     */
    protected $attributes = [
        'status' => Self::PENDING,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'subscription_date',
        'expiration_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'subscription_date' => 'datetime',
        'expiration_date' => 'datetime'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productPricing(): BelongsTo
    {
        return $this->belongsTo(ProductPricing::class, 'product_pricing_id');
    }

    public function isActive(): bool
    {
        return $this->status === self::PENDING || $this->status === self::ACTIVE;
    }
}
