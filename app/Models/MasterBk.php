<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MasterBk extends Model
{
    use HasFactory;

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
        'creator_id',
        'modifier_id',
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
        return $this->hasOne(Ldk::class);
    }

    protected $table = 'master_bk';
}
