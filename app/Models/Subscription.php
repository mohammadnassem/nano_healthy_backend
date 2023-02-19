<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
        'mobile',
        'gender',
    ];

    protected $guarded = ['id'];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
