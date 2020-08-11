<?php

use Illuminate\Database\Seeder;

class VatClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vat_classes')->insert([
            [
                'id' => 1,
                'amount' => 6,
            ], [
                'id' => 2,
                'amount' => 21,
            ]
        ]);
    }
}
