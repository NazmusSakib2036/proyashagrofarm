<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPartner extends Model
{
    protected $fillable = [
        'title',
        'logo_path',
        'url',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
