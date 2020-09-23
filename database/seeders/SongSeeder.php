<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s                 = new Song();
        $s->name           = 'Víc lásky';
        $s->session_id     = 1;
        $s->regenschori_id = 252;
        $s->order          = 1;
        $s->lyrics         = 'Víc lásky, víc moci';

        $s->save();
    }
}
