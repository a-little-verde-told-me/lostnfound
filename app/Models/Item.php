<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'type',
        'status',
        'location',
        'date_reported'
    ];

    protected $casts = [
        'date_reported' => 'datetime',
    ];

    /**
     * Get the category that owns the item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
