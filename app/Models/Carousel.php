<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'image_480',
        'image_768',
        'image_1024',
        'is_active',
        'order',
        'link',
    ];

    /**
     * Get the active carousels ordered by their order.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function activeCarousels()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get();
    }
}
