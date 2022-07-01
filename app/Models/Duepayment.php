<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duepayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_id',
        'payment_amount',
        'payBy',
        'pay_date',
        'pay_month',
        'pay_year',

    ];

}
