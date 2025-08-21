<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'title',
        'image',
        'image_480',
        'image_768',
        'image_1024',
        'active',
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
        return self::where('active', true)
            ->orderBy('order')
            ->get();
    }
}
