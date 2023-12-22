<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'material_id',
        'location',
        'uom',
        'qty',
        'pic_nrp',
        'pic_name',
        'creator_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function master_bk(): BelongsTo
    {
        return $this->belongsTo(MasterBk::class, 'material_id');
    }
}
