<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'description',
        'amount',
        'status',
        'process_url',
        'request_id',
        'user_id',
        'invoice_id',
    ];
}
