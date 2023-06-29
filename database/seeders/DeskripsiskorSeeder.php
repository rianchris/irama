<?php

namespace Database\Seeders;

use App\Models\Deskripsiskor;
use Illuminate\Database\Seeder;

class DeskripsiskorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deskripsiskor = param();
        foreach ($deskripsiskor as $deskripsiskors) {
            Deskripsiskor::create([
                'param_id' => $deskripsiskors['id'],
                'skor0' => $deskripsiskors['skor0'],
                'skor1' => $deskripsiskors['skor1'],
                'skor2' => $deskripsiskors['skor2'],
                'skor3' => $deskripsiskors['skor3'],
                'skor4' => $deskripsiskors['skor4'],
                'skor5' => $deskripsiskors['skor5'],
            ]);
        }
    }
}
