<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claim';

    protected $fillable = [
        'user_id',
        'item_id',
        'found_report_id',
        'proof_description',
        'status',
        'contact_email',
        'contact_number',
        'phone_number',
        'additional_details',
        'image',
        'date_claimed',
        'admin_feedback'
    ];

    protected $casts = [
        'date_claimed' => 'datetime',
    ];

    /**
     * Get the user that made this claim.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the item this claim is for.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Get the found report this claim is for.
     */
    public function foundReport()
    {
        return $this->belongsTo(Item::class, 'found_report_id');
    }
}
