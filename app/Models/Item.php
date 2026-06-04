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
        'found_location',
        'lost_location',
        'surrender_location',
        'date_found',
        'date_lost'
    ];

    protected $casts = [
        'date_found' => 'datetime',
        'date_lost' => 'datetime',
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

    /**
     * Get the claims for this item.
     */
    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    /**
     * Get the returns for this item.
     */
    public function returns()
    {
        return $this->hasMany(ReturnItem::class);
    }

    /**
     * Get the approved claim for this item.
     */
    public function getApprovedClaim()
    {
        return $this->claims()->where('status', 'approved')->first();
    }

    /**
     * Get the approved return for this item.
     */
    public function getApprovedReturn()
    {
        return $this->returns()->where('status', 'approved')->first();
    }

    /**
     * Get the user who claimed this item (if approved).
     */
    public function getClaimedByUser()
    {
        $claim = $this->getApprovedClaim();
        return $claim ? $claim->user : null;
    }

    /**
     * Get the user who returned this item (if approved).
     */
    public function getReturnedByUser()
    {
        $return = $this->getApprovedReturn();
        return $return ? $return->user : null;
    }

    /**
     * Get the display status of this item based on approved claims/returns.
     * Returns 'claimed', 'returned', or the current status.
     */
    public function getDisplayStatus()
    {
        if ($this->getApprovedReturn()) {
            return 'returned';
        } elseif ($this->getApprovedClaim()) {
            return 'claimed';
        }
        return $this->status;
    }

    /**
     * Check if this item has an approved claim or return.
     */
    public function isResolved()
    {
        return $this->getApprovedClaim() !== null || $this->getApprovedReturn() !== null;
    }
}
