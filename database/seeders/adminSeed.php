<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;

class adminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            admin::class,
        ]);
    }
}
