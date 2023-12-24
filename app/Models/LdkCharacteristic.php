<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LdkCharacteristic extends Model
{
    use HasFactory;

    protected $table = 'ldk_characteristic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ldk_id',
        'characteristic_id'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function ldk(): BelongsTo
    {
        return $this->belongsTo(Ldk::class, 'ldk_id');
    }

}
