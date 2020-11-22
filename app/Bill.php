<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number_bill', 'detail', 'cevita', 'celery', 'orinca_coffee', 'discount',
        'vat', 'net_total', 'total', 'status', 'products_value_discount', 'updated_at', 'shipping_cost', 'transport'
    ];
}
