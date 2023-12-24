<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ldk extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'revision_number',
        'ldk_number',
        'material_id',
        'reactivity',
        'composition',
        'hazard_identifications',
        'physical_state',
        'colour',
        'odor',
        'ph',
        'melting_point',
        'lfl',
        'ufl',
        'p3k_eye',
        'p3k_skin',
        'p3k_ingestion',
        'p3k_inhalation',
        'p3k_others',
        'handling_storage',
        'spill_leakage',
        'disposal',
        'ecology_info',
        'toxicology_info',
        'regulation',
        'shipping',
        'others_info',
        'created_at',
        'updated_at',
    ];

    protected $table = 'ldk';

    /**
     * Get the ldk for the master bahan kimia.
     */
    public function ldk(): HasOne
    {
        return $this->hasOne(MasterBk::class);
    }

    public function characteristic(): BelongsToMany
    {
        return $this->belongsToMany(characteristic::class, 'ldk_characteristic', 'ldk_id', 'characteristic_id');
    }
}
