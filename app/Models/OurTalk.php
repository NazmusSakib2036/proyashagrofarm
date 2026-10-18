<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurTalk extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'external_url',
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
