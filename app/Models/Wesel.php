<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Wesel extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'datetime',
        'voltage',
        'current',
        'message',
        'category',
        'area',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($obj) {
            $obj->id = RamseyUuid::uuid4()->toString();
        });
    }
}
