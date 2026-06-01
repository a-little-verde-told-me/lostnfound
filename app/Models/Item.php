<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';

    protected $fillable = [
        'user_id',
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
     * Get the user that posted this item.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
