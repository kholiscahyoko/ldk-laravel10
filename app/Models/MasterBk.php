<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MasterBk extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'material_number',
        'material_desc',
        'maker',
        'ldk_fr_maker',
        'status_bk',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the locations for the master bahan kimia.
     */
    public function location(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    /**
     * Get the ldk for the master bahan kimia.
     */
    public function ldk(): HasOne
    {
        return $this->hasOne(Ldk::class, 'material_id');
    }

    protected $table = 'master_bk';

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
