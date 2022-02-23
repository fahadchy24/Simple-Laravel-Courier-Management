<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCost extends Model
{
    use HasFactory;

    // protected function getExpiryDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d M Y');
    // }

    protected function setRuleNameAttribute($value)
    {
        $this->attributes['rule_name'] = ucfirst($value);
    }

    protected $fillable = [
        'rule_name', 'delivery_route', 'delivery_type', 'weight', 'expirary_date', 'cost'
    ];
}
