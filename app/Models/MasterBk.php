<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $table = 'master_bk';
}
