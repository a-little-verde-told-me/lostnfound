<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    use HasFactory;

    protected $table = 'return';

    protected $fillable = [
        'user_id',
        'item_id',
        'email',
        'phone_number',
        'image',
        'additional_details',
        'status'
    ];

    /**
     * Get the user that submitted this return.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the item this return is for.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
