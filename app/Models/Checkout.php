<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Checkout extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['user_id', 'camp_id', 'payment_status', 'midtrans_url', 'midtrans_booking_code', 'discount_id', 'discount_percentage', 'total'];
    
    public function setExpiredAttribute($value)
    {
        $this->attributes['expired'] = date('Y-m-t', strtotime($value));
    }
    
    /**
    * Get the Camp that owns the Checkout
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function Camp(): BelongsTo
    {
        return $this->belongsTo(Camp::class);
    }
    
    /**
    * Get the User that owns the Checkout
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
    /**
    * Get the Discount that owns the Checkout
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function Discount(): BelongsTo
    {
        return $this->belongsTo(Discount::class);
    }
}