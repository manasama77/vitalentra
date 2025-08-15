<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'title',
        'image',
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
