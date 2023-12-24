<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Characteristic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'characteristic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'characteristic_name',
        'pictogram',
        'notes',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    public function ldk(): BelongsToMany
    {
        return $this->belongsToMany(Ldk::class, 'ldk_characteristic', 'characteristic_id', 'ldk_id');
    }

}
