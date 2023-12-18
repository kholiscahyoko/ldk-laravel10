<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class MasterBkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_bk')->insert([
            'material_number' => sprintf("%02d-%02d-%05d", rand(1, 99), rand(1, 99), rand(1, 99999)),
            'desc_item' => 'THINNER FMS RBT-5',
            'maker' => 'Nippon Paint',
            'creator_id' => 1,
            'modifier_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
